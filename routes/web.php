<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/test', function () {
    return view('test');
})->name('test');

Route::middleware('auth')->group(function () {


    Route::get('/shop', function () {
        // TEMP DATA – TO BE REMOVED LATER

        $products = [
            (object)['name' => 'Test Product 1', 'price' => 100],
            (object)['name' => 'Test Product 2', 'price' => 150],
        ];
        //dd($products);
        return view('shop.index', compact('products'));
    })->name('shop.index');

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
// TEMP DATA – TO BE REMOVED LATER
Route::get('/product/{id}', function ($id) {
    $product = (object)[
        'id' => $id,
        'name' => 'Test Product ' . $id,
        'description' => 'This is a detailed description of Test Product ' . $id . '.',
        'price' => 99.99,
        'image' => 'https://via.placeholder.com/600x400',
    ];
    return view('product.show', compact('product'));
})->name('product.show');
Route::get('/cart', function () {
    $cartItems = [
        (object)[
            'id' => 1,
            'name' => 'Test Product 1',
            'price' => 50,
            'quantity' => 2,
            'image' => 'https://via.placeholder.com/100',
        ],
        (object)[
            'id' => 2,
            'name' => 'Test Product 2',
            'price' => 30,
            'quantity' => 1,
            'image' => 'https://via.placeholder.com/100',
        ],
    ];

    return view('cart.index', compact('cartItems'));
})->name('cart.index');



require __DIR__ . '/auth.php';
