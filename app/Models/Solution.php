<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    protected $fillable = [
        'solution_key',
        'title',
        'badge',
        'tagline',
        'desc',
        'capacity',
        'battery',
        'savings',
        'price',
        'features',
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
