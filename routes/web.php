<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Danh mục
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');

// Sản phẩm
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// Giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Danh mục sản phẩm theo `categorySlug`
Route::get('/category/{categorySlug}', [ProductController::class, 'showCategory'])->name('category.show');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/product/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('product/{slug}', [ProductController::class, 'show'])->name('products.show');

// Group các route của admin

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Route quản lý sản phẩm
    Route::resource('products', AdminProductController::class);

    // Route quản lý danh mục
    Route::resource('categories', AdminCategoryController::class);
});
Route::put('admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');

// Route để hiển thị form chỉnh sửa sản phẩm
Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');

// Route để cập nhật sản phẩm
Route::put('/admin/products/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');

// Route để xóa sản phẩm
Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

Route::resource('products', AdminProductController::class);
Route::resource('categories', AdminCategoryController::class);

Route::get('/admin/categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
Route::post('/cart/order', [CartController::class, 'placeOrder'])->name('cart.order');
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
