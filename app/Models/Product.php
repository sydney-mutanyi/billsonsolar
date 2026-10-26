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
        'description',
        'image',
        'images',
        'specs',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'specs' => 'array',
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'float',
        'rating' => 'float',
    ];

    /**
     * Retrieve all images for the product, guaranteeing a non-empty array if primary image exists.
     *
     * @return array<int, string>
     */
    public function getAllImagesAttribute(): array
    {
        $list = [];
        if (!empty($this->images) && is_array($this->images)) {
            $list = array_values(array_filter($this->images));
        }

        if (empty($list) && !empty($this->image)) {
            $list = [$this->image];
        } elseif (!empty($this->image) && !in_array($this->image, $list, true)) {
            array_unshift($list, $this->image);
        }

        return $list;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
