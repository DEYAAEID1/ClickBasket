<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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
        $product = Product::findOrFail($id);
        $product->update($request->only(['name', 'description', 'price', 'stock_quantity', 'subcategory_id', 'is_active']));

        // handle image upload
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        // handle gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $product->gallery()->create(['image' => $image->store('gallery', 'public')]);
            }
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }

    public function create()
    {
        
        $subcategories = Subcategory::all(); // لجلب الفئات الفرعية
        return view('admin.products.create', compact('subcategories'));
    }

    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'cost_price' => 'nullable|numeric',
            'stock_quantity' => 'required|integer',
            'subcategory_id' => 'required|exists:subcategories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // إنشاء منتج جديد
        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'cost_price' => $request->cost_price,
            'stock_quantity' => $request->stock_quantity,
            'subcategory_id' => $request->subcategory_id,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        // حفظ الصورة الرئيسية
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        // حفظ المنتج في قاعدة البيانات
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }
}
