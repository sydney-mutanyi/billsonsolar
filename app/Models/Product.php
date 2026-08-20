<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'title',
        'slug',
        'price',
        'rating',
        'reviews',
        'badge',
        'image',
        'specs',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'specs' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'float',
        'rating' => 'float',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
