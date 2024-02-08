<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Models\Category;
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

Route::get('/',[AppController::class,'index'])->name('app.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/product/{slug}',[ShopController::class, 'productDetails'])->name('shop.product.details');
Route::get('/cart-wishlist-count',[ShopController::class, 'getCartAndWishlistCount'])->name('shop.cart.wishlist.count');

route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/cart/store',[CartController::class,'addToCart'])->name('cart.store');
Route::put('/cart/update',[CartController::class,'updateCart'])->name('cart.update');
Route::delete('/cart/remove',[CartController::class,'removeItem'])->name('cart.remove');
Route::delete('/cart/clear',[CartController::class,'clearCart'])->name('cart.clear');

Route::get('/wishlist',[CartController::class,'getWishlistProducts'])->name('wishlist.list');
Route::post('/wishlist/add',[WishlistController::class,'addProductToWishlist'])->name('wishlist.store');
Route::delete('/wishlist/remove',[WishlistController::class,'removeProductWishlist'])->name('wishlist.remove');
Route::delete('/wishlist/clear',[WishlistController::class,'clearWishlist'])->name('wishlist.clear');
Route::post('/wishlist/move-to-cart',[WishlistController::class,'moveToCart'])->name('wishlist.move.to.cart');

Route::get('/about', [AboutController::class,'index'])->name('about.index');
Route::get('/contact', [ContactController::class,'index'])->name('contact.index');
Route::get('/blog', [BlogController::class,'index'])->name('blog.index');
Route::get('/search', [SearchController::class,'search'])->name('search.shop');
Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/my-account',[UserController::class,'index'])->name('user.index');
});

Route::middleware(['auth','auth.admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name(('admin.index'));
    Route::get('/admin/category',[AdminCategoryController::class,'index'])->name('admin.category');
    Route::get('/admin/product',[ProductController::class,'index'])->name('admin.product');
//category
    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class,'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class,'destroy'])->name('category.destroy');
//product
    Route::get('/admin/product/create',[ProductController::class,'create'])->name(('product.create'));
    Route::post('/admin/product/add', [ProductController::class, 'addProduct'])->name('addProduct');
});