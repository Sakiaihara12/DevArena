<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CardController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Cards::query()->orderBy('id')->paginate(50));
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'rarity' => ['required', 'integer', 'between:1,127'],
            'attack' => ['required', 'integer', 'between:0,2147483647'],
            'effect_type' => ['required', Rule::in(Cards::EFFECT_TYPES)],
            'description' => ['nullable', 'string'],
        ]);

        $card = Cards::query()->create($validated);

        return response()->json([
            'data' => $card,
        ], 201);
    }
}
