<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Category\Category as CategoryCategory;
use App\Models\Category\Subcategory as CategorySubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function getProductsBySubcategory($subcategory_id)
    {
        // Create an instance of the ProductService
        $productService = new ProductService();
        try {
            // Call the service method to fetch products by subcategory
            $products = $productService->getProductsBySubcategory($subcategory_id);
            // Return the fetched products as a JSON response
            return response()->json(['products' => $products]);
        }
        // when use "\Exception" with "\" Handle any exceptions that may occur during the fetching process
        catch (\Exception $e) {
            // Log any exceptions that occur during the fetching process
            Log::error('Error fetching products by subcategory: ' . $e->getMessage());

            // Return a generic error message if an exception occurs
            return response()->json(['error' => 'An error occurred while fetching products.'], 500);
        }
    }


    //receives a request from the user (Request) containing the product ID
    //sends the product ID to the ProductService class to search for the product in the database.

    public function searchProduct(Request $request, ProductService $productService)
    {
        $product_id = $request->input('product_id');
        $product = $productService->searchProductById($product_id);
        //The search result is returned as a JSON response.
        return response()->json(['product' => $product]);
    }

    public function dashboard()
    {
        $categories = CategoryCategory::all();
        return view('shop.backend.admin', compact('categories'));
    }



    //receives a request from the user (Request) containing the product ID
    //sends the product ID to the ProductService class to search for the product in the database.

    public function editDeleteProduct(Request $request, ProductService $productService)
    {
        $productId = $request->input('product_id');
        $data = $productService->getProductAndSubcategory($productId);

        if ($data['product']) {
            return view('admin.products.edit_delete', $data);
        } else {
            return back()->with('error', 'Product not found!');
        }
    }

    public function updateProduct(ProductRequest $request, $id, ProductService $productService)
    {
        $validated = $request->validated();  // التحقق من المدخلات

        // التعامل مع الملفات بعد التحقق
        $files = [
            'image' => $request->file('image'),
            'gallery' => $request->file('gallery'),
        ];

        // تحديث المنتج باستخدام الخدمة
        $product = $productService->updateProduct($id, $validated, $files);

        return response()->json(['message' => 'Product updated successfully!', 'product' => $product]);
    }




    public function deleteProduct($id, ProductService $productService)
    {
        $product = $productService->deleteProductById($id);
        return response()->json(['message' => 'Product deleted successfully', 'product' => $product]);
    }

    public function create()
    {

        $subcategories = CategorySubcategory::all(); // لجلب الفئات الفرعية
        return view('admin.products.create', compact('subcategories'));
    }


    public function store(ProductRequest $request, ProductService $productService)
    {
        $validated = $request->validated();  // التحقق من المدخلات

        // التعامل مع الملفات بعد التحقق
        $files = [
            'image' => $request->file('image'),
            'gallery' => $request->file('gallery'),
        ];

        // إضافة المنتج باستخدام الخدمة
        $product = $productService->storeProduct($validated, $files);

        return response()->json(['success' => 'Product added successfully!', 'product' => $product]);
    }
}
