<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\OrderItemController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Category;
use App\Models\Color;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/register', [UserController::class, 'showRegistrationForm']);
Route::post('admin/register', [UserController::class, 'register'])->name('register');

Route::get('admin/login', [UserController::class, 'showLoginForm']);
Route::post('admin/login', [UserController::class, 'login'])->name('login');


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('categories', [CategoryController::class, 'index'])->name(Category::INDEX);
    Route::get('colors', [ColorController::class, 'index'])->name(Color::INDEX);
    Route::get('orders', [OrderItemController::class, 'index'])->name(OrderItem::INDEX);
    Route::get('headers', [HeaderController::class, 'index'])->name('headers.index');
    Route::get('footers', [FooterController::class, 'index'])->name('footers.index');

    Route::prefix('products')->controller(ProductController::class)->name('products.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        // Route::get('/{coupon}', 'show')->name('show');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::get('/{coupon}', 'destroy')->name('destroy');
    });

    Route::get('/logout', [UserController::class, 'perform'])->name('logout.perform');
});
