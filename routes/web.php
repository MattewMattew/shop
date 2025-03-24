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
Route::delete('/remove-from-cart/{productId}', [ProductController::class, 'removeFromCart'])->name('remove.from.cart');
Route::get('/cart', [ProductController::class, 'showCart'])->name('cart.show');
Route::delete('/clear-cart', [ProductController::class, 'clearCart'])->name('clear.cart');

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::delete('/orders/{orderId}', [OrderController::class, 'destroy'])->name('orders.destroy');
});

require __DIR__.'/auth.php';
