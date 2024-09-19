<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ADminController; 
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\CartController; 
use App\Http\Controllers\CheckoutController; 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend
Route::get('/', [HomeController::class,'index']);
Route::get('/trangchu', [HomeController::class, 'index'])->name('trangchu');
Route::post('/tim-kiem', [HomeController::class, 'search'])->name('tim-kiem');

//danh muc san pham
Route::get('/show-category-product/{category_id}', [CategoryProduct::class, 'show_category_product'])->name('show-category-product');
//danh muc brand
Route::get('/show-brand-product/{category_id}', [BrandProduct::class, 'show_brand_product'])->name('show-brand-product');
//san pham chi tiet
Route::get('/product-details/{product_id}', [ProductController::class, 'product_details'])->name('product-details');
//gio hang
Route::get('/show-cart', [CartController::class, 'show_cart'])->name('show-cart');
Route::get('/delete-cart/{rowId}', [CartController::class, 'delete_cart'])->name('delete-cart');
Route::get('/gio-hang',[CartController::class, 'gio_hang'])->name('gio-hang');

Route::post('/add-cart-ajax',[CartController::class, 'add_cart_ajax'])->name('add-cart-ajax');
Route::post('/save-cart', [CartController::class, 'save_cart'])->name('save-cart');
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity'])->name('update-cart-quantity');

//mail
Route::get('/send-mail', [HomeController::class, 'send_mail'])->name('send-mail');


//checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout'])->name('login-checkout');
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout'])->name('logout-checkout');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');

Route::post('/add-customer', [CheckoutController::class, 'add_customer'])->name('add-customer');
Route::post('/login-customer', [CheckoutController::class, 'login_customer'])->name('login-customer');
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer'])->name('save-checkout-customer');
Route::post('/order-place', [CheckoutController::class, 'order_place'])->name('order-place');


//backend
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('dashboard');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/manage-order/', [AdminController::class,'manage_order'])->name('manage-order');
Route::get('/view-order/{orderId}', [AdminController::class,'view_order'])->name('view-order');

Route::post('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

//category
Route::get('/add-category-product', [CategoryProduct::class,'add_category_product'])->name('add-category-product');
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class,'edit_category_product'])->name('edit-category-product');
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class,'delete_category_product'])->name('delete-category-product');
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product'])->name('all-category-product');
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product'])->name('active-category-product');
Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product'])->name('unactive-category-product');

Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product'])->name('save-category-product');
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product'])->name('update-category-product');

//brand
Route::get('/add-brand-product', [BrandProduct::class,'add_brand_product'])->name('add-brand-product');
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class,'edit_brand_product'])->name('edit-brand-product');
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class,'delete_brand_product'])->name('delete-brand-product');
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product'])->name('all-brand-product');
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product'])->name('active-brand-product');
Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product'])->name('unactive-brand-product');

Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product'])->name('save-brand-product');
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product'])->name('update-brand-product');

//product
Route::get('/add-product', [ProductController::class,'add_product'])->name('add-product');
Route::get('/edit-product/{product_id}', [ProductController::class,'edit_product'])->name('edit-product');
Route::get('/delete-product/{product_id}', [ProductController::class,'delete_product'])->name('delete-product');
Route::get('/all-product', [ProductController::class, 'all_product'])->name('all-product');
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product'])->name('active-product');
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product'])->name('unactive-product');

Route::post('/save-product', [ProductController::class, 'save_product'])->name('save-product');
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product'])->name('update-product');

