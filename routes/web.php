<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $latest_products = Product::where('place', 1)->get();
    $popular_products = Product::where('place', 2)->get();
    $regular_products = Product::where('place', 3)->get();
    return view('welcome', compact('latest_products','popular_products','regular_products'));
});



Route::get('/product/details/{id}', [App\Http\Controllers\User\ProductController::class, 'show']);
Route::get('/category/product/{id}', [App\Http\Controllers\User\ProductController::class, 'category']);
Route::get('/about', [App\Http\Controllers\User\UserDashboardController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\User\UserDashboardController::class, 'contact']);
Route::post('/contact/store', [App\Http\Controllers\User\ContactController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([ "as"=>'user.' , "prefix"=>'user' , "namespace"=>'User'],function(){
    Route::get('/dashboard', [App\Http\Controllers\User\UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/cart/list', [App\Http\Controllers\User\CartController::class, 'index']);
    Route::get('/cart/store/{id}', [App\Http\Controllers\User\CartController::class, 'store']);
    Route::post('/cart/update/{id}', [App\Http\Controllers\User\CartController::class, 'update']);
    Route::get('/cart/delete/{id}', [App\Http\Controllers\User\CartController::class, 'destroy']);

    Route::post('/order/store', [App\Http\Controllers\User\OrderController::class, 'store']);
    Route::get('/order/list', [App\Http\Controllers\User\OrderController::class, 'index']);
    Route::get('/order/details/{id}', [App\Http\Controllers\User\OrderController::class, 'details']);
    Route::get('/logout', [App\Http\Controllers\User\UserDashboardController::class, 'logout']);


});


Route::group([ "as"=>'admin.' , "prefix"=>'admin', "middleware"=>['auth','admin']],function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);

    Route::get('/order/index', [App\Http\Controllers\Admin\OrderController::class, 'index']);
    Route::get('/invoice/{id}', [App\Http\Controllers\Admin\OrderController::class, 'invoice'])->name('invoice');
    Route::get('/order/details/{id}', [App\Http\Controllers\Admin\OrderController::class, 'show']);
    Route::get('/order/status/{id}', [App\Http\Controllers\Admin\OrderController::class, 'status'])->name('order.status');
    Route::get('/order/delete/{id}', [App\Http\Controllers\Admin\OrderController::class, 'destroy']);
    Route::get('/cart/delete/{id}', [App\Http\Controllers\Admin\OrderController::class, 'cart_delete'])->name('cart.delete');
    Route::post('/cart/update/{id}', [App\Http\Controllers\Admin\OrderController::class, 'update']);
    Route::get('/contact/index', [App\Http\Controllers\Admin\ContactController::class, 'index']);
    Route::get('/logout', [App\Http\Controllers\Admin\AdminDashboardController::class, 'logout']);
});
