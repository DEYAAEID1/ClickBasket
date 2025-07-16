<?php

namespace App\Http\Controllers;

use App\Models\Product; // Assuming you have a Product model
use App\Models\ShoppingCart; // Your ShoppingCart model
use App\Http\Requests\AddToCartRequest;

class ShoppingCartController extends Controller
{
    // ... other methods like index(), show(), etc.

    /**
     * Add a product to the shopping cart.
     */
    public function addItem(AddToCartRequest $request)
    {
        // Validate the request data
        $validated = $request->validated();


        // Get the product
        $product = Product::findOrFail($validated['product_id']);

        // Get the user's cart or create a new one
        $cart = $this->getOrCreateCart();

        // Add the item to the cart
        $cart->addItem($product, $request->quantity);

        // Return a response (e.g., redirect back with a success message)
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function index()
    {

        // استرجاع السلة من الـ session أو قاعدة البيانات
        $cartItems = session()->get('cart.items', []); // مثال: استرجاع من session

        // تمرير البيانات إلى صفحة السلة
        return view('shop.backend.cart', compact('cartItems'));
    }


    /**
     * Get the user's cart or create a new one if it doesn't exist.
     *
     *  This is a helper method, adjust it based on your cart storage mechanism (session, DB, etc).
     */
    private function getOrCreateCart()
    {

        $cart = session()->get('cart');
        $cartId = session()->get('cart_id');

        if (!$cart) {
            if ($cartId) {
                $cart = ShoppingCart::find($cartId);
            }


            if (!$cartId || !$cart) {
                $cart = new ShoppingCart();
                session()->put('cart', $cart);
                $cart->save(); // Save the cart to the database to get an ID




            }
        }
        return $cart;
    }
}
