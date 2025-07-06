<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
 protected $primaryKey = 'id'; 
    protected $fillable = [
        
        'category_id',
        'subcategory_id',
        'name',
        'description',
        'price',
        'cost_price',
        'stock_quantity',
        'is_active',
        'manage_stock',
        'stock_status',
        'image',
        'gallery',
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
