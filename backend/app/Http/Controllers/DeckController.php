<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeckController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(
            DB::table('decks')
                ->where('user_id', $request->user()->id)
                ->orderBy('id')
                ->paginate(50)
        );
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $now = now();
        $id = DB::table('decks')->insertGetId([
            'user_id' => $request->user()->id,
            'name' => $validated['name'],
            'is_active' => $validated['is_active'] ?? false,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return response()->json([
            'data' => DB::table('decks')->where('id', $id)->first(),
        ], 201);
    }
}
