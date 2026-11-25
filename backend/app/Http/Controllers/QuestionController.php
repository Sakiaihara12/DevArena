<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // GET /api/questions/random?category=JavaScript
    public function random(Request $request)
    {
        $request->validate([
            'category' => 'nullable|in:HTML,CSS,JavaScript,React,Laravel,SQL',
        ]);

        $question = Question::query()
            ->when($request->category, fn ($q, $cat) => $q->where('category', $cat))
            ->inRandomOrder()
            ->first();

        if (! $question) {
            return response()->json(['message' => 'Soal tidak ditemukan'], 404);
        }

        return response()->json(['data' => $question->toQuizArray()]);
    }
}
