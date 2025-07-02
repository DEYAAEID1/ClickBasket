<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'description',
        'short_description',
        'sku',
        'price',
        'sale_price',
        'cost_price',
        'stock_quantity',
        'min_quantity',
        'weight',
        'dimensions',
        'is_active',
        'is_featured',
        'manage_stock',
        'stock_status',
        'image',
        'gallery',
        'meta_title',
        'meta_description',
        'rating_average',
        'rating_count',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'manage_stock' => 'boolean',
        'gallery' => 'array',
        'rating_average' => 'float',
    ];

    // علاقة مع الفئة الرئيسية
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // علاقة مع الفئة الفرعية
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
