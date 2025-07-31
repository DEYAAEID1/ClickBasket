<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShoppingCartController;
use App\Models\Product\Product;
use App\Http\Controllers\CategoriesController;
use app\Http\Controllers\Auth\AuthenticatedSessionController;
use App\DataTables\ProductDataTable;
use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Product\ProductController as ProductProductController;
use App\Http\Controllers\Categories\CategoriesController as CategoriesCategoriesController;

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






Route::get('/', function () {
    $products = Product::with('category')->orderBy('id')->get();
    return view('shop.frontend.landing', compact('products'));
})->name('landing');


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {

    // صفحة الداشبورد الرئيسية للمستخدم
    Route::get('/shop/frontend/user', [UserDashboardController::class, 'index'])->middleware(['verified'])
        ->name('user.dashboard');

    // صفحة تعديل الحساب في المسار المطلوب
    Route::get('/shop/frontend/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/shop/frontend/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Route to get products by subcategory via AJAX

    Route::get('/products/by-subcategory/{subcategory_id}', [ProductProductController::class, 'getProductsBySubcategory'])->name('products.by_subcategory');
    Route::get('/cart/add', [ShoppingCartController::class, 'index'])->name('shop.backend.cart');
    Route::post('/cart/add', [ShoppingCartController::class, 'addItem'])->name('cart.add');




    Route::middleware('auth', 'role:admin')->group(function () {
        Route::get('/admin/dashboard', [UserDashboardController::class, 'AdminDashboard'])->name('admin.dashboard');

        Route::get('admin/product/content', [ProductProductController::class, 'index'])->name('product.index');
        Route::POST('admin/product/create', [ProductProductController::class, 'store'])->name('product.create');
        Route::post('admin/product/content', [ProductProductController::class, 'store']);
        Route::get('product/{product}/edit', [ProductProductController::class, 'edit'])->name('product.edit');
        Route::delete('product/{product}', [ProductProductController::class, 'delete'])->name('product.destroy');
        
        Route::get('admin/categories/content', [CategoriesCategoriesController::class, 'index'])->name('categories.index');
        Route::delete('categories/{category}', [CategoriesCategoriesController::class, 'destroy'])->name('categories.destroy');
        Route::put('admin/categories/content', [CategoriesCategoriesController::class, 'storeCategory']);
        
        Route::put('subcategory/update', [CategoriesCategoriesController::class, 'updateSubcategory'])->name('subcategories.update');
        Route::post('admin/subcategories/content', [CategoriesCategoriesController::class, 'storeSubcategory'])->name('subcategories.create');
        Route::get('admin/subcategories/content/{category}', [CategoriesCategoriesController::class, 'indexSubcategories'])->name('subcategories.index');

        // Route::get('/products/search', [ProductController::class, 'searchProduct'])->name('admin.products.search');
        // Route::get('/dashboard/products/create', [ProductController::class, 'create'])->name('admin.products.create');
        // Route::post('/dashboard/products/store', [ProductController::class, 'store'])->name('admin.products.store');
        // Route::post('/products/edit/delete', [ProductController::class, 'editDeleteProduct'])->name('admin.products.edit_delete');
        // Route::put('/products/{id}', [ProductController::class, 'updateProduct'])->name('admin.products.update');
        // Route::delete('/products/{id}', [ProductController::class, 'deleteProduct'])->name('admin.products.delete');
    });

    // Route::prefix('categories')->group(function () {


    //     // جلب الفئات الفرعية باستخدام AJAX
    //     Route::get('/{categoryid}/subcategories', [CategoriesController::class, 'getSubcategories']);

    //     // عرض جميع الفئات
    //     Route::get('/', [CategoriesController::class, 'index'])->name('admin.categories.index');

    //     // إضافة فئة رئيسية
    //     Route::get('/create', [CategoriesController::class, 'createcategories'])->name('admin.categories.create');
    //     Route::post('/categories/store', [CategoriesController::class, 'storeCategory'])->name('admin.categories.store');
    //     // تعديل فئة رئيسية
    //     Route::get('/categories/edit/{id}', [CategoriesController::class, 'editcategory'])->name('admin.categories.edit');
    //     Route::put('/update/{id}', [CategoriesController::class, 'updateCategory'])->name('admin.categories.update');

    //     // حذف فئة رئيسية
    //     Route::delete('/delete/{id}', [CategoriesController::class, 'destroyCategory'])->name('admin.categories.destroy');

    //     // إضافة فئة فرعية

    //     Route::get('/categories/create', [CategoriesController::class, 'createsubcategories'])->name('admin.subcategories.create');
    //     Route::post('/sub/store', [CategoriesController::class, 'storeSubcategory'])->name('admin.subcategories.store');

    //     // تعديل فئة فرعية
    //     Route::get('/subcategories/edit/{id}', [CategoriesController::class, 'editSubcategory'])->name('admin.subcategories.edit');
    //     Route::get('/{categoryid}/subcategories/{id}/edit', [CategoriesController::class, 'editSubcategory'])->name('admin.subcategories.edit');

    //     Route::put('/sub/update/{id}', [CategoriesController::class, 'updateSubcategory'])->name('admin.subcategories.update');

    //     // تعديل عرض فئة فرعية

    //     // حذف فئة فرعية
    //     Route::delete('/sub/delete/{id}', [CategoriesController::class, 'destroySubcategory'])->name('admin.subcategories.destroy');
    // });
});




Route::get('/admin', function () {

    return view('backend.pages.main');
})->name('Admin');

Route::get('/test', function () {


    return view('test');
})->name('test');
Route::get('/test2', function () {

    return view('test2');
})->name('test2');


require __DIR__ . '/auth.php';
