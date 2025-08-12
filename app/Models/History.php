<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'user_id', 'top_scores', 'user_vector', 'summary',
    ];

    protected $casts = [
        'top_scores' => 'array',
        'user_vector' => 'array',
    ];
}


