<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // عرض جميع التصنيفات الرئيسية والفرعية
    public function index()
    {
        $categories = Category::with('subcategories')->get();
        return view('shop.backend.CRAD_category', compact('categories'));
    }

    // إضافة تصنيف رئيسي جديد
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ]);
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->back()->with('success', 'Category added successfully.');
    }

    // تعديل تصنيف رئيسي
    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
            'slug' => 'required|string|max:255|unique:categories,slug,'.$category->id,
        ]);
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    // حذف تصنيف رئيسي
    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    // إضافة تصنيف فرعي جديد
    public function storeSubcategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:subcategories,name',
            'slug' => 'required|string|max:255|unique:subcategories,slug',
        ]);
        Subcategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->back()->with('success', 'Subcategory added successfully.');
    }

    // تعديل تصنيف فرعي
    public function updateSubcategory(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:subcategories,name,'.$subcategory->id,
            'slug' => 'required|string|max:255|unique:subcategories,slug,'.$subcategory->id,
        ]);
        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->back()->with('success', 'Subcategory updated successfully.');
    }

    // حذف تصنيف فرعي
    public function destroySubcategory($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        return redirect()->back()->with('success', 'Subcategory deleted successfully.');
    }
}
