<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class GameDataApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('gold')->default(1000);
            $table->unsignedInteger('gems')->default(0);
            $table->unsignedInteger('pity_counter')->default(0);
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedTinyInteger('rarity');
            $table->integer('attack');
            $table->string('effect_type');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('decks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name', 100);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

        Schema::create('user_inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('card_id');
            $table->integer('level')->default(1);
            $table->integer('duplicates')->default(0);
            $table->timestamps();
            $table->unique(['user_id', 'card_id']);
        });

        Schema::create('deck_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deck_id');
            $table->unsignedBigInteger('user_inventory_id');
            $table->unsignedTinyInteger('slot');
            $table->timestamps();
            $table->unique(['deck_id', 'slot']);
        });
    }

    public function test_postman_can_register_login_and_get_a_sanitized_user_list(): void
    {
        $this->postJson('/api/users', [
            'name' => 'Postman Tester',
            'email' => 'postman@example.test',
            'password' => 'secure-pass-123',
        ])->assertCreated()
            ->assertJsonMissingPath('data.password');

        $user = User::query()->where('email', 'postman@example.test')->firstOrFail();
        $this->assertTrue(Hash::check('secure-pass-123', $user->password));

        $login = $this->postJson('/api/login', [
            'email' => 'postman@example.test',
            'password' => 'secure-pass-123',
            'device_name' => 'Postman',
        ])->assertOk();

        $this->withToken($login->json('data.token'))
            ->getJson('/api/users')
            ->assertOk()
            ->assertJsonPath('data.0.name', 'Postman Tester')
            ->assertJsonMissingPath('data.0.email')
            ->assertJsonMissingPath('data.0.password');
    }

    public function test_authenticated_user_can_post_and_get_owned_game_data(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $card = $this->postJson('/api/cards', [
            'name' => 'Postman Card',
            'rarity' => 1,
            'attack' => 10,
            'effect_type' => 'damage',
        ])->assertCreated()->json('data');

        $deck = $this->postJson('/api/decks', [
            'name' => 'Postman Deck',
            'user_id' => 99999,
        ])->assertCreated()
            ->assertJsonPath('data.user_id', $user->id)
            ->json('data');

        $inventory = $this->postJson('/api/user-inventories', [
            'card_id' => $card['id'],
        ])->assertCreated()->json('data');

        $this->postJson('/api/deck-cards', [
            'deck_id' => $deck['id'],
            'user_inventory_id' => $inventory['id'],
            'slot' => 1,
        ])->assertCreated();

        $this->getJson('/api/cards')->assertOk();
        $this->getJson('/api/decks')->assertOk()->assertJsonPath('data.0.id', $deck['id']);
        $this->getJson('/api/user-inventories')->assertOk()->assertJsonPath('data.0.id', $inventory['id']);
        $this->getJson('/api/deck-cards')->assertOk()->assertJsonPath('data.0.slot', 1);
    }

    public function test_game_data_endpoints_require_a_sanctum_token(): void
    {
        $this->getJson('/api/cards')->assertUnauthorized();
        $this->postJson('/api/decks', ['name' => 'No token'])->assertUnauthorized();
    }
}
