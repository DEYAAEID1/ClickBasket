<?php

namespace App\Http\Controllers\Product;

use App\DataTables\ProductDataTable;

use App\Http\Controllers\Controller;
use App\Http\ProductRequest\ProductRequest as ProductRequestProductRequest;
use App\Models\Category\Category as CategoryCategory;
use App\Models\Category\Subcategory as CategorySubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\ProductService;
use App\Models\Product\Product;

class ProductController extends Controller
{


    public function index(ProductDataTable $dataTable)
    {
        $products = Product::latest()
            ->with('subcategory')

            ->get();
        $subcategories = CategorySubcategory::all();
        return $dataTable->render('backend.pages.product.product', compact('products', 'subcategories'));
    }




    public function store(Request $request, ProductService $productService)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:100',
            'price' => 'required|numeric',
            'cost_price' => 'nullable|numeric',
            'stock_quantity' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'is_active' => 'nullable|boolean',
        ]);
        $subcategory = CategorySubcategory::find($validated['subcategory_id']);


        if (!$subcategory) {
            return redirect()->back()->withErrors(['subcategory_id' => 'الفئة الفرعية غير موجودة']);
        }

        $validated['category_id'] = $subcategory->category_id;

        $subcategories = CategorySubcategory::all();


        $files = [
            'image' => $request->file('image'),
            'gallery' => $request->file('gallery'),
        ];

        $product = $productService->storeProduct($validated, $files);

        return redirect()->route('product.index')->with('success', 'Product added successfully.');
    }




    public function edit($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
     $subcategoryName = $product->subcategory ? $product->subcategory->name : null;

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
             'subcategory_name' => $subcategoryName
        ]);
    }
    
    public function delete($id, ProductService $productService)
    {
        $product = $productService->deleteProductById($id);
        
 return response()->json([
        'message' => 'Product deleted successfully',
        'product_id' => $id
    ]);    }
    
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

    public function show(Product $product)
    {
        return response()->json(['product' => $product]);
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

    public function updateProduct(ProductRequestProductRequest $request, $id, ProductService $productService)
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





    public function create()
    {

        $subcategories = CategorySubcategory::all(); // لجلب الفئات الفرعية
        return view('admin.products.create', compact('subcategories'));
    }
}
