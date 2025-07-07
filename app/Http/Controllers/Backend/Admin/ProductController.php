<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function getProductsBySubcategory($subcategory_id)
    {
        try {
            // Validate that the subcategory_id is a number
            if (!is_numeric($subcategory_id)) {
                return response()->json(['message' => 'Invalid subcategory ID.'], 400);
            }

            // Fetch active products belonging to the selected subcategory
            // Eager load the category to avoid N+1 issues in the view
            $products = Product::with('category')
                               ->where('subcategory_id', $subcategory_id)
                               ->where('is_active', 1) // Good practice to only show active products
                               ->get();

            return response()->json(['products' => $products]);

        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Error fetching products by subcategory: ' . $e->getMessage());

            // Return a generic but informative error response
            return response()->json(['message' => 'A server error occurred while fetching products.'], 500);
        }
    }



public function searchProduct(Request $request)
{
    $product_id = $request->input('product_id');
    $product = Product::find($product_id); // البحث عن المنتج باستخدام الـ ID

    if ($product) {
        return response()->json(['product' => $product]); // إرجاع البيانات إلى الـ AJAX
    } else {
        return response()->json(['product' => null]); // إذا لم يتم العثور على المنتج
    }
}

public function dashboard()
{
    $categories = Category::all();
    return view('shop.backend.admin', compact('categories'));
}



   // حذف و تعديل منتج
    public function editDeleteProduct(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);
        $subcategories = Subcategory::all();

        if ($product) {
            $subcategories = Subcategory::all(); // لجلب الفئات الفرعية
            return view('admin.products.edit_delete', compact('product', 'subcategories'));
        } else {
            return back()->with('error', 'Product not found!');
        }
    }
   public function updateProduct(Request $request, $id)
{
    // البحث عن المنتج
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    // التحقق من صحة البيانات
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'cost_price' => 'nullable|numeric',
        'stock_quantity' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // nullable because it might not be updated
        'gallery' => 'nullable|array',
        'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:subcategories,id',
        // 'is_active' is handled by has()
    ]);

    // تحديث المنتج
    $product->name = $validated['name'];
    $product->description = $validated['description'];
    $product->price = $validated['price'];
    $product->cost_price = $validated['cost_price'];
    $product->stock_quantity = $validated['stock_quantity'];
    $product->category_id = $validated['category_id'];
    $product->subcategory_id = $validated['subcategory_id'];
    $product->is_active = $request->has('is_active') ? 1 : 0;

     if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

    if ($request->hasFile('gallery')) {
        $galleryPaths = [];
        foreach ($request->file('gallery') as $file) {
            $galleryPaths[] = $file->store('products/gallery', 'public');
        }
        $product->gallery = $galleryPaths; // The model will cast this to JSON
    }

    // حفظ التعديلات في قاعدة البيانات
    $product->save();

    return response()->json(['message' => 'Product updated successfully!', 'product' => $product]);
}




    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return view('admin.dashboard',compact('products'));
    }

    public function create()
    {
        
        $subcategories = Subcategory::all(); // لجلب الفئات الفرعية
        return view('admin.products.create', compact('subcategories'));
    }

    public function store(Request $request)
{
    // التحقق من صحة البيانات بدون category_id
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'cost_price' => 'nullable|numeric',
        'stock_quantity' => 'required|integer',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gallery' => 'nullable|array|max:5',
        'is_active' => 'nullable|boolean',
    ]);

    // إذا كانت البيانات صحيحة، قم بحفظ المنتج
    $product = new Product([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'cost_price' => $request->cost_price,
        'stock_quantity' => $request->stock_quantity,
        'is_active' => $request->has('is_active') ? true : false,
    ]);

    // حفظ الصورة الرئيسية
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
    }

    // حفظ الصور في الـ gallery
    if ($request->hasFile('gallery')) {
        foreach ($request->file('gallery') as $file) {
            $galleryPath = $file->store('products/gallery', 'public');
            $product->gallery()->create(['image' => $galleryPath]);
        }
    }

    // حفظ المنتج في قاعدة البيانات
    $product->save();

    return response()->json(['success' => 'Product added successfully!']);
}

}
