<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryRequest;

class CategoriesController extends Controller
{
    public function getSubcategories($categoryid)
    {

        $subcategories = Subcategory::where('category_id', $categoryid)->get();

        return response()->json(['subcategories' => $subcategories]);
    }


    public function createcategories()
    {
        return view('shop.backend.categories_create');
    }


    // عرض جميع التصنيفات الرئيسية والفرعية
    public function index()
    {
        $categories = Category::with('subcategories')->get();
        return view('shop.backend.CRAD_category', compact('categories'));
    }

    public function editcategory($id)
    {
        $category = Category::findOrFail($id);
        return view('shop.backend.categories_create', compact('category'));
    }


    // إضافة تصنيف رئيسي جديد

    public function storeCategory(CategoryRequest $request)
    {
        // التحقق من المدخلات باستخدام FormRequest
        $validated = $request->validated();

        // إنشاء الفئة الجديدة
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        // التحقق إذا كانت الصورة موجودة وتحميلها
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        // حفظ الفئة
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully.');
    }

    // تعديل تصنيف رئيسي

    public function updateCategory(CategoryRequest $request, $id)
    {
        // التحقق من المدخلات باستخدام FormRequest
        $validated = $request->validated();

        // جلب الفئة حسب ID
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;

        // التحقق إذا كانت الصورة موجودة وتحميلها
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        // حفظ الفئة المعدلة
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    // حذف تصنيف رئيسي
    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
    public function createsubcategories()
    {
        $categories = Category::all();

        return view('shop.backend.subcategories_create', compact('categories'));
    }
    // إضافة تصنيف فرعي جديد

    public function storeSubcategory(SubcategoryRequest $request)
    {
        // التحقق من المدخلات باستخدام FormRequest
        $validated = $request->validated();

        // إنشاء الفئة الفرعية الجديدة
        $subcategory = new Subcategory([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // التحقق إذا كانت الصورة موجودة وتحميلها
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subcategories', 'public');
            $subcategory->image = $imagePath;
        }

        // حفظ الفئة الفرعية
        $subcategory->save();

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory added successfully.');
    }



    // تعديل تصنيف فرعي

    public function updateSubcategory(SubcategoryRequest $request, $id)
    {
        // التحقق من المدخلات باستخدام FormRequest
        $validated = $request->validated();

        // جلب الفئة الفرعية حسب ID
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;

        // التحقق إذا كانت الصورة موجودة وتحميلها
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subcategories', 'public');
            $subcategory->image = $imagePath;
        }

        // حفظ الفئة الفرعية المعدلة
        $subcategory->save();

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function editSubcategory($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all(); // لاختيار الفئة الرئيسية
        return view('shop.backend.subcategories_create', compact('subcategory', 'categories'));
    }



    // حذف تصنيف فرعي

    public function destroySubcategory($id)
    {
        Subcategory::findOrFail($id)->delete();
        return response()->json(['message' => 'تم الحذف']);
    }
}
