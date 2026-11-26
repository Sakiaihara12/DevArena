<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    public const EFFECT_TYPES = ['damage', 'heal', 'shield'];

    protected $fillable = [
        'name',
        'rarity',
        'attack',
        'effect_type',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'rarity' => 'integer',
            'attack' => 'integer',
        ];
    }
}
