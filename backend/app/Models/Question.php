<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'category', 'question_text',
        'option_a', 'option_b', 'option_c', 'option_d',
        'correct_answer',
    ];

    // Bentuk soal yang aman dikirim ke frontend (tanpa kunci jawaban)
    public function toQuizArray(): array
    {
        return [
            'id'       => $this->id,
            'category' => $this->category,
            'question' => $this->question_text,
            'options'  => [
                'A' => $this->option_a,
                'B' => $this->option_b,
                'C' => $this->option_c,
                'D' => $this->option_d,
            ],
        ];
    }
}
