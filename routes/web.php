<?php

use App\Models\Logo;
use App\Models\Color;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\OrderItem;
use App\Models\ClientTestimonials;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CheckoutController;
use App\Http\Controllers\Admin\OrderItemController;
use App\Http\Controllers\Admin\MailConfigController;
use App\Http\Controllers\Admin\SiteConfigController;
use App\Http\Controllers\Admin\HomeProductController;
use App\Http\Controllers\Admin\ClientTestimonialsController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Client
Route::get('/', [ViewController::class, 'home'])->name('home');
Route::get('/shopping-cart', [ViewController::class, 'shoppingCart'])->name('shopping-cart');
Route::post('/shopping-cart/remove', [ViewController::class, 'removeCartItem'])->name('shopping-cart.remove');
Route::post('/checkout', [ViewController::class, 'checkout'])->name('checkout');
Route::get('/my-checkouts', [ViewController::class, 'myCheckouts'])->name('my-checkouts');
Route::get('categories', [ViewController::class, 'allCategories'])->name('home.category-all');
Route::get('category-product/{slug?}', [ViewController::class, 'categories'])->name('home.category');
Route::get('category-post/{slug}', [ViewController::class, 'categoriespost'])->name('home.category-post');
Route::get('category-post/{slug}/{post}', [ViewController::class, 'post'])->name('home.post');
Route::get('/product/{slug?}', [ViewController::class, 'products'])->name('home.products');
Route::get('/product/{slug}/order-item', [ViewController::class, 'productCustomizeBuy'])->name('home.order');
Route::post('send-mail', [ViewController::class, 'sendmail'])->name('send-email');
Route::get('/pages/{slug}', [ViewController::class, 'pages'])->name('home.pages');

Route::post('register', [ViewController::class, 'register'])->name('account.register');
Route::post('login', [ViewController::class, 'login'])->name('account.login');
Route::post('logout', [ViewController::class, 'logout'])->name('account.logout');

Route::get('/show/image', [ImageController::class, 'getImage'])->name('storages.image');
Route::post('/upload', [ImageController::class, 'uploadImage'])->name('upload.image');

// Admin
Route::get('admin/register', [UserController::class, 'showRegistrationForm']);
Route::post('admin/register', [UserController::class, 'register'])->name('register');

Route::get('admin/login', [UserController::class, 'showLoginForm']);
Route::post('admin/login', [UserController::class, 'login'])->name('login');


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('categories', [CategoryController::class, 'index'])->name(Category::INDEX);
    Route::get('colors', [ColorController::class, 'index'])->name(Color::INDEX);
    Route::get('orders', [OrderItemController::class, 'index'])->name(OrderItem::INDEX);
    Route::get('checkouts', [CheckoutController::class, 'index'])->name(Checkout::INDEX);
    Route::get('headers', [HeaderController::class, 'index'])->name('headers.index');
    Route::get('footers', [FooterController::class, 'index'])->name('footers.index');
    Route::get('mail-config', [MailConfigController::class, 'index'])->name('mail-config.index');
    Route::get('site-config', [SiteConfigController::class, 'index'])->name('site-config.index');
    Route::get('home/logos', [LogoController::class, 'index'])->name(Logo::INDEX);
    Route::get('home/sliders', [SliderController::class, 'index'])->name(Slider::INDEX);
    Route::get('home/clients', [ClientTestimonialsController::class, 'index'])->name(ClientTestimonials::INDEX);
    Route::get('home/producthome', [HomeProductController::class, 'index'])->name('producthome.index');

    Route::prefix('products')->controller(ProductController::class)->name('products.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::get('/{coupon}/item', 'item')->name('item');
        Route::get('/{coupon}', 'destroy')->name('destroy');
    });

    Route::prefix('posts')->controller(PostController::class)->name('posts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('/{coupon}', 'update')->name('update');
        Route::get('/{coupon}/item', 'item')->name('item');
        Route::get('/{coupon}', 'destroy')->name('destroy');
    });

    Route::prefix('pages')->controller(PageController::class)->name('pages.')->group(function () {
        Route::get('/', 'index')->name('index');
        // Route::get('/create', 'create')->name('create');
        // Route::post('/', 'store')->name('store');
        Route::get('/{coupon}/edit', 'edit')->name('edit');
        Route::put('{id}/save-page', 'update')->name('update');
        // Route::put('/{coupon}', 'update')->name('update');
        Route::get('/{coupon}/item', 'item')->name('item');
        Route::get('/{coupon}', 'destroy')->name('destroy');
    });

    Route::get('/logout', [UserController::class, 'perform'])->name('logout.perform');
});
