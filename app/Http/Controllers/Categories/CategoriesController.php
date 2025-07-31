<?php

namespace App\Http\Controllers\Categories;

use App\DataTables\CategoryDataTable;
use App\DataTables\SubcategoryDataTable;
use App\Http\Requests\Frontend\CategoryRequest;
use App\Http\Controllers\Controller;

use App\Models\Category\Category;
use App\Models\Category\Subcategory;
use App\Http\Requests\Frontend\SubcategoryRequest;








class CategoriesController extends Controller
{
    public function index(CategoryDataTable $dataTable)
    {
        $categories = Category::latest()->get();


        return $dataTable->render('backend.pages.category.category');
    }


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

        return redirect()->route('categories.index')->with('success', 'Category added successfully.');
    }

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
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
    /*------------------------------Subcategories----------------------------------*/
    /*-----------------------------------------------------------------------------*/

    public function indexSubcategories(SubcategoryDataTable $dataTable, $id)
    {

        $categories = Category::all();
        $subcategory = Subcategory::where('category_id', $id)->get();

        $dataTable->category_id = (int)$id;
        return $dataTable->render('backend.pages.subcategories.subcategory', compact('subcategory', 'categories'));
    }
    public function updateSubcategory(SubcategoryRequest $request, $id)
    {
        $validated = $request->validated();

        $subcategory = Subcategory::findOrFail($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subcategories', 'public');
            $subcategory->image = $imagePath;
        }

        $subcategory->save();

        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function storeSubcategory(SubcategoryRequest $request)
    {

        $validated = $request->validated();
        $subcategory = new Subcategory([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('subcategories', 'public');
            $subcategory->image = $imagePath;
        }

        $subcategory->save();
        $category_id = $request->category_id;
        return redirect()->route('subcategories.index',  ['category' => $category_id]);
    }

    public function destroySubcategory($id)
    {
        Subcategory::findOrFail($id)->delete();
        return response()->json(['message' => 'تم الحذف']);
    }







    public function createsubcategories()
    {
        $categories = Category::all();

        return view('shop.backend.subcategories_create', compact('categories'));
    }








    public function editSubcategory($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all(); // لاختيار الفئة الرئيسية
        return view('shop.backend.subcategories_create', compact('subcategory', 'categories'));
    }





    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
    public function getSubcategories($categoryid)
    {

        $subcategories = Subcategory::where('category_id', $categoryid)->get();

        return response()->json(['subcategories' => $subcategories]);
    }

    public function editcategory($id)
    {
        $category = Category::findOrFail($id);
        return view('shop.backend.categories_create', compact('category'));
    }
    public function createcategories()
    {
        return view('shop.backend.categories_create');
    }
}
