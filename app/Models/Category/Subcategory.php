<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category\Category as ParentCategory;

class Subcategory extends Model
{
    use HasFactory;

    // كل تصنيف فرعي يتبع تصنيف رئيسي واحد
    public function category()
    {
        return $this->belongsTo(ParentCategory::class);
    }
    protected $fillable = [
       'category_id',
       'name',
       'description',
       'image', // تأكد من إضافة حقل الصورة
       'slug',
    ];
}
