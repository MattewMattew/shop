<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::post('/add-to-cart/{productId}', [ProductController::class, 'addToCart'])->name('add.to.cart');

Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::delete('/orders/{orderId}', [OrderController::class, 'destroy'])->name('orders.destroy');

Route::get('/', function () {
    return view('welcome');
});
