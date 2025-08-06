<?php

namespace App\Services;

use App\Models\Category\Subcategory ;
use App\Models\Product\Product ;

use Illuminate\Support\Facades\Log;

class ProductService
{
    // Method to fetch products by a given subcategory ID

    public function getProductsBySubcategory($subcategory_id)
    {
        // Check if the provided subcategory_id is a numeric value

        if (!is_numeric($subcategory_id)) {
            return response()->json(['message' => 'Invalid subcategory ID.'], 400);
        }
        // Return all products for the specified subcategory, ensuring they are active,
        // and include the related category information using eager loading.
        return Product::with('subcategory')
            ->where('subcategory_id', $subcategory_id)
            ->where('is_active', 1)
            ->get();
    }
    // receve a $product_id from searchProduct function in product controller
    public function searchProductById($product_id)
    {
        // find a product by id to send it to the frontend by  searchProduct function in product controller

        return Product::find($product_id);
    }

    public function getProductAndSubcategory($product_id)
    {
        $product = Product::find($product_id);
        $subcategories = Subcategory::all();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return compact('product', 'subcategories');
    }

    public function updateProduct($id, $validatedData, $files)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update($validatedData);
        // if a request have a images

        if (isset($files['image']) && $files['image']->isValid()) {
            $product->image = $files['image']->store('products', 'public');
        }

        if (isset($files['gallery'])) {
            // use foreach to handle many image

            foreach ($files['gallery'] as $file) {
                if ($file->isValid()) {
                    //store images in public/products/gallery

                    $product->gallery()->create(['image' => $file->store('products/gallery', 'public')]);
                }
            }
        }

        $product->save();

        return $product;
    }

    public function deleteProductById($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
        } catch (\Exception $e) {
            Log::error('Error deleting product: ' . $e->getMessage());
            return response()->json(['message' => 'Error deleting product.'], 500);
        }

        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function storeProduct($validatedData, $files)
    {
        $product = new Product($validatedData);

        if (isset($files['image']) && $files['image']->isValid()) {
            $product->image = $files['image']->store('products', 'public');
        }

        if (isset($files['gallery'])) {
            foreach ($files['gallery'] as $file) {
                if ($file->isValid()) {
                    $product->gallery()->create(['image' => $file->store('products/gallery', 'public')]);
                }
            }
            
        }

        $product->save();

        return $product;
    }
}
