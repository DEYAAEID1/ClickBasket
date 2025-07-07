<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShoppingCart extends Model
{
    // ... other properties and methods

    /**
     * Define relationship with CartItem model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }


    public function addItem(Product $product, int $quantity)
    {
         if (!$this->exists) {
        $this->save(); // حفظ السلة في قاعدة البيانات للحصول على ID
    }
        // Example implementation (adjust as needed):
        $cartItem = $this->items()->where('product_id', $product->id)->first(); // Assuming you have a 'items' relationship

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            $this->items()->create([
                'shopping_cart_id' => $this->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price, // Or calculate based on current discounts, etc.
                // Or calculate based on current discounts, etc.
            ]);
        }

        $this->updateTotal();  // Method to recalculate total cost of the cart
    }

    // ... other methods like removeItem, updateQuantity, updateTotal etc.
}
