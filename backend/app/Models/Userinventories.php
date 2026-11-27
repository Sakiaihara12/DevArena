<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInventory extends Model
{
    protected $fillable = [
        'user_id',
        'card_id',
        'level',
        'duplicates',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function card()
    {
        return $this->belongsTo(Cards::class, 'card_id');
    }

    protected function casts(): array
    {
        return [
            'user_id'    => 'integer',
            'card_id'    => 'integer',
            'level'      => 'integer',
            'duplicates' => 'integer',
        ];
    }
}