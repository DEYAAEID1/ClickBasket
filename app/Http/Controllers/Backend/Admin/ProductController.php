<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{


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
    // البحث عن المنتج بواسطة ID
    $product = Product::find($id);
    
    if ($product) {
        // تحديث البيانات للمنتج
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->cost_price = $request->cost_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->is_active = $request->has('is_active') ? 1 : 0; // إذا كان هناك "is_active" فاجعلها 1، وإلا اجعلها 0.
        
        // إضافة معالجة الصورة الرئيسية (إذا كانت موجودة)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        // إضافة معالجة الصور المرفقة (إذا كانت موجودة)
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('products/gallery', 'public');
            }
            $product->gallery = json_encode($gallery); // حفظها بتنسيق JSON في قاعدة البيانات
        }

        // حفظ التعديلات في قاعدة البيانات
        $product->save();

        return response()->json(['message' => 'Product updated successfully!', 'product' => $product]);
    } else {
        return response()->json(['message' => 'Product not found.']);
    }
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

