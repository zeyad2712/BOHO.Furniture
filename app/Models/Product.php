<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'category',
        'category_id',
        'price',
        'original_price',
        'discount_percentage',
        'rating',
        'reviews_count',
        'image',
        'colors',
        'stock',
        'width',
        'height',
        'depth',
        'dimension_unit',
        'is_featured',
        'is_new_arrival',
        'is_best_seller',
        'slug',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'rating' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_new_arrival' => 'boolean',
        'is_best_seller' => 'boolean',
        'colors' => 'array',
    ];

    /**
     * Get localized name
     */
    public function getDisplayNameAttribute()
    {
        return app()->getLocale() === 'ar' ? ($this->name_ar ?? $this->name_en) : ($this->name_en ?? $this->name_ar);
    }

    /**
     * Alias for localized name
     */
    public function getNameAttribute()
    {
        return $this->display_name;
    }

    /**
     * Get localized description
     */
    public function getDisplayDescriptionAttribute()
    {
        return app()->getLocale() === 'ar' ? ($this->description_ar ?? $this->description_en) : ($this->description_en ?? $this->description_ar);
    }

    /**
     * Alias for localized description
     */
    public function getDescriptionAttribute()
    {
        return $this->display_description;
    }

    // Relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship with images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Relationship with reviews
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }
}
