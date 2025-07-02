<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // تصنيف رئيسي له عدة تصنيفات فرعية
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
