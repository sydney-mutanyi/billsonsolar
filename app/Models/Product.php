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
     * Accessor for primary image with safe fallback
     */
    public function getImageAttribute($value): string
    {
        if (empty($value) || $value === 'storage/' || $value === 'storage') {
            return 'images/product_solar_panel.png';
        }
        return $value;
    }

    /**
     * Retrieve all images for the product, guaranteeing a non-empty array with valid paths.
     *
     * @return array<int, string>
     */
    public function getAllImagesAttribute(): array
    {
        $list = [];
        if (!empty($this->images) && is_array($this->images)) {
            $list = array_values(array_filter($this->images, function ($img) {
                return !empty($img) && $img !== 'storage/' && $img !== 'storage';
            }));
        }

        $primary = $this->image;
        if (empty($list) && !empty($primary)) {
            $list = [$primary];
        } elseif (!empty($primary) && !in_array($primary, $list, true)) {
            array_unshift($list, $primary);
        }

        return !empty($list) ? $list : ['images/product_solar_panel.png'];
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
