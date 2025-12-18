<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AyamKampus;
use App\Http\Controllers\AuthController;

Route::get('/', [AyamKampus::class, 'index'])->name('home');

Route::get('/menu', [AyamKampus::class, 'menu'])->name('menu');
Route::get('/menu/ayam', [AyamKampus::class, 'ayam'])->name('menu.ayamgeprek');
Route::get('/menu/minuman', [AyamKampus::class, 'minuman'])->name('menu.minuman');
Route::get('/menu/paket', [AyamKampus::class, 'paket'])->name('menu.paket');

Route::get('/promo', [AyamKampus::class, 'promo'])->name('promo');
Route::get('/about', [AyamKampus::class, 'about'])->name('about');
Route::get('/contact', [AyamKampus::class, 'contact'])->name('contact');

// CART
Route::get('/cart', [AyamKampus::class, 'cartIndex'])->name('cart.index');
Route::post('/cart/add/{id}', [AyamKampus::class, 'cartAdd'])->name('cart.add');
Route::post('/cart/update/{id}', [AyamKampus::class, 'cartUpdate'])->name('cart.update');
Route::post('/cart/remove/{id}', [AyamKampus::class, 'cartRemove'])->name('cart.remove');

// AUTH
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');

// CHECKOUT & PAYMENT - TAMBAHKAN INI
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [AyamKampus::class, 'checkout'])->name('checkout');
    Route::post('/checkout/proses', [AyamKampus::class, 'prosesCheckout'])->name('proses.checkout');
    Route::get('/order/{orderId}', [AyamKampus::class, 'orderStatus'])->name('order.status');
    Route::get('/orders', [AyamKampus::class, 'orderHistory'])->name('orders.history');
});

Route::post('/payment-callback', [AyamKampus::class, 'paymentCallback'])->name('payment.callback');








