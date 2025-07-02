<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // تنظيف السعر وتحويله لرقم صحيح
        $price = floatval(preg_replace('/[^0-9.]/', '', $row['price']));

        
    return new Product([
        'name' => $row['product_name'],
        'slug' => Str::slug($row['product_name']),
        'description' => $row['description'],
        'price' => $price,
        'sku' => $row['sku'],
        'stock_quantity' => 10,
        'min_quantity' => ceil(20 / $price),
        'weight' => floatval($row['weight']),
        'sale_price' => 0,
        'cost_price' => floatval($row['cost_price']),
        'stock_status' => 'in_stock',
        'image' => $row['image_url'],
        'gallery' => json_encode(explode(',', $row['gallery'])),
        'meta_title' => $row['meta_title'],
        'meta_description' => $row['meta_description'],
        'rating_average' => floatval($row['rating_average']),
        'rating_count' => intval($row['rating_count']),

        // 🟢 الإضافة المطلوبة:
        'category_id' => intval($row['category_id']),
        'subcategory_id' => intval($row['subcategory_id']),
    ]);
    }
}
