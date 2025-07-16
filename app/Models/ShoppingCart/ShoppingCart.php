<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;
use App\Models\CartItem;

class ShoppingCart extends Model
{
    protected $table = 'shopping_carts';

    protected $fillable = [
        'user_id',
        'total_amount',
        'status'
    ];

    //relation with cart items
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    // to add item to the cart
    public function addItem(Product $product, int $quantity)
    {
        if (!$this->exists) {
            $this->save(); // to give the cart an id if it doesn't exist 
        }

        // chik if the product is already in the cart
        $cartItem = $this->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;  // update the quantity if the product is already in the cart
            $cartItem->save();
        } else {
            $this->items()->create([
                'shopping_cart_id' => $this->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price, // update the price if its have a copone 
            ]);
        }

        $this->updateTotal();  // go to the function updateTotal to update the total amount of the cart
    }

    // if the product is already in the cart, update the quantity
    public function updateTotal()
    {
        $total = $this->items->sum(function ($item) {
            return $item->quantity * $item->price;  // Calculate the total price for each item in the cart
        });

        $this->update(['total_amount' => $total]);  // update the total amount of the cart

    }
}
