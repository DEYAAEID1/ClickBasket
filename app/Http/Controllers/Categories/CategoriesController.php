<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

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
    public function storeCategory(Request $request)
    {
         // التحقق من الحقول المدخلة
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

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
    public function updateCategory(Request $request, $id)
    {
        // التحقق من الحقول المدخلة
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = Category::findOrFail($id); // جلب الفئة حسب ID
        $category->name = $request->name;
        $category->description = $request->description;

        // التحقق إذا كانت الصورة موجودة وتحميلها
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        // حفظ التعديلات
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
    public function storeSubcategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id', // التحقق من الفئة الرئيسية
            'name' => 'required|string|max:255|unique:subcategories,name', // التحقق من اسم الفئة الفرعية
            'description' => 'nullable|string', // الوصف اختياري
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // التحقق من صورة الفئة الفرعية
        ]);

        // إنشاء الكائن الجديد للفئة الفرعية
        $subcategory = new Subcategory([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // إضافة الصورة إذا كانت موجودة
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subcategories', 'public');
            $subcategory->image = $imagePath;
        }

        // إنشاء الكائن وتخزينه في قاعدة البيانات
        $subcategory->save();

        // إعادة التوجيه إلى صفحة الفئات الرئيسية مع رسالة النجاح
        return redirect()->route('admin.categories.index')->with('success', 'Subcategory added successfully.');
    }



    // تعديل تصنيف فرعي
    public function updateSubcategory(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:subcategories,name,' . $subcategory->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // إذا كان هناك صورة
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subcategories', 'public');
            $subcategory->image = $imagePath;
        }

        $subcategory->save();
        return redirect()->route('admin.categories.index')->with('success', 'Subcategory updated successfully.');
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
