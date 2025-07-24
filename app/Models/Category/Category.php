<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category\Subcategory;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'name',
      'slug',
      'description',
      'image',
      'is_active',
    ];


    // تصنيف رئيسي له عدة تصنيفات فرعية
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
