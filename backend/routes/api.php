<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DeckCardController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInventoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/questions/random', [QuestionController::class, 'random']);
Route::get('/questions', [QuestionController::class, 'getallquestions']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']);

    Route::get('/cards', [CardController::class, 'index']);
    Route::post('/cards', [CardController::class, 'store']);

    Route::get('/decks', [DeckController::class, 'index']);
    Route::post('/decks', [DeckController::class, 'store']);

    Route::get('/deck-cards', [DeckCardController::class, 'index']);
    Route::post('/deck-cards', [DeckCardController::class, 'store']);

    Route::get('/user-inventories', [UserInventoryController::class, 'index']);
    Route::post('/user-inventories', [UserInventoryController::class, 'store']);
});
