<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserInventoryController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(
            DB::table('user_inventories')
                ->where('user_id', $request->user()->id)
                ->orderBy('id')
                ->paginate(50)
        );
    }

    public function store(Request $request): JsonResponse
    {
        $userId = $request->user()->id;
        $validated = $request->validate([
            'card_id' => [
                'required',
                'integer',
                'exists:cards,id',
                Rule::unique('user_inventories', 'card_id')->where('user_id', $userId),
            ],
            'level' => ['sometimes', 'integer', 'between:1,2147483647'],
            'duplicates' => ['sometimes', 'integer', 'between:0,2147483647'],
        ]);

        $now = now();
        $id = DB::table('user_inventories')->insertGetId([
            'user_id' => $userId,
            'card_id' => $validated['card_id'],
            'level' => $validated['level'] ?? 1,
            'duplicates' => $validated['duplicates'] ?? 0,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return response()->json([
            'data' => DB::table('user_inventories')->where('id', $id)->first(),
        ], 201);
    }
}
