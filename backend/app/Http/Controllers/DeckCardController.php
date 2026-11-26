<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class DeckCardController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $userDeckIds = DB::table('decks')
            ->select('id')
            ->where('user_id', $request->user()->id);

        return response()->json(
            DB::table('deck_cards')
                ->whereIn('deck_id', $userDeckIds)
                ->orderBy('id')
                ->paginate(50)
        );
    }

    public function store(Request $request): JsonResponse
    {
        $userId = $request->user()->id;
        $validated = $request->validate([
            'deck_id' => [
                'required',
                'integer',
                Rule::exists('decks', 'id')->where('user_id', $userId),
            ],
            'user_inventory_id' => [
                'required',
                'integer',
                Rule::exists('user_inventories', 'id')->where('user_id', $userId),
            ],
            'slot' => [
                'required',
                'integer',
                'between:1,5',
                Rule::unique('deck_cards', 'slot')->where('deck_id', $request->input('deck_id')),
            ],
        ]);

        $now = now();
        $id = DB::table('deck_cards')->insertGetId([
            ...$validated,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return response()->json([
            'data' => DB::table('deck_cards')->where('id', $id)->first(),
        ], 201);
    }
}
