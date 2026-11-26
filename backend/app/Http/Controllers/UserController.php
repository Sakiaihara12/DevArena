<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::query()
            ->select(['id', 'name', 'gold', 'gems', 'pity_counter'])
            ->orderBy('id')
            ->paginate(50);

        return response()->json($users);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        $user = User::query()->create($validated);

        return response()->json([
            'data' => $user->only(['id', 'name', 'email']),
        ], 201);
    }
}
