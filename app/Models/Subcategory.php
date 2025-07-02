<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    // كل تصنيف فرعي يتبع تصنيف رئيسي واحد
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
