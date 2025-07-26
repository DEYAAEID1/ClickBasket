<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Category\Category;
use App\Models\Category\Subcategory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function images(): HasMany // تغيير اسم العلاقة إلى الجمع
    {
        return $this->hasMany(ProductImage::class);
    }
    
}
