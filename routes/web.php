<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ProductImportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\Admin\CategoriesController;
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
    return view('shop.frontend.landing');
})->name('landing');


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::post('/import-products', [ProductImportController::class, 
'import'])->name('products.import'); //الكنترولر المسؤول عن استيراد المنتجات من ملف excel

Route::view('/import', 'shop.backend.importExcel'); // صفحة بسيطة لرفع ملف ال Excel 





Route::middleware('auth')->group(function () {

    // صفحة الداشبورد الرئيسية للمستخدم
    Route::get('/shop/frontend/user', [UserDashboardController::class, 'index'])
        ->middleware(['verified'])
        ->name('user.dashboard');

    // صفحة تعديل الحساب في المسار المطلوب
        Route::get('/shop/frontend/profile', 
        [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/shop/frontend/profile', 
    [ProfileController::class, 'update'])->name('profile.update');


    // روت صفحة الأدمن الرئيسية
    Route::prefix('admin')->middleware(['verified', 'role:admin'])->group(function () {
        Route::view('/dashboard', 'shop.backend.admin')->name('admin.dashboard');

        Route::prefix('categories')->group(function () {
    // عرض صفحة الإدارة
    Route::get('/', [CategoriesController::class, 'index'])->name('admin.categories.index');

    // إضافة تصنيف رئيسي
    Route::post('/store', [CategoriesController::class, 'storeCategory'])->name('admin.categories.store');
    // تعديل تصنيف رئيسي
    Route::post('/update/{id}', [CategoriesController::class, 'updateCategory'])->name('admin.categories.update');
    // حذف تصنيف رئيسي
    Route::delete('/delete/{id}', [CategoriesController::class, 'destroyCategory'])->name('admin.categories.destroy');

    // إضافة تصنيف فرعي
    Route::post('/sub/store', [CategoriesController::class, 'storeSubcategory'])->name('admin.subcategories.store');
    // تعديل تصنيف فرعي
    Route::post('/sub/update/{id}', [CategoriesController::class, 'updateSubcategory'])->name('admin.subcategories.update');
    // حذف تصنيف فرعي
    Route::delete('/sub/delete/{id}', [CategoriesController::class, 'destroySubcategory'])->name('admin.subcategories.destroy');
    });

     // نهاية الروتس الخاصين بالادمن
});

});



Route::get('/test', function () {
    return view('test', ['user' => auth()->user()]);
})->name('test');
Route::get('/test2', function () {
    return view('shop.frontend.user');
})->name('test2');


require __DIR__ . '/auth.php';
