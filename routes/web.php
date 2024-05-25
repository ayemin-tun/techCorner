<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Cancel;
use App\Livewire\Cart;
use App\Livewire\Category;
use App\Livewire\Checkout;
use App\Livewire\HomePage;
use App\Livewire\MyOrders;
use App\Livewire\MyOrdersDetail;
use App\Livewire\Partials\Navbar;
use App\Livewire\Product;
use App\Livewire\ProductDetail;
use App\Livewire\Success;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;



Route::get('/', HomePage::class);
Route::get('/categories', Category::class);
Route::get('/products', Product::class);
Route::get('/products/{slug}', ProductDetail::class);
Route::get('/cart', Cart::class);

Route::middleware('guest')->group(function () {
    // auth
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class);
    Route::get('/forgot', ForgotPassword::class)->name('password.request');
    Route::get('/reset/{token}', ResetPassword::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('/checkout', Checkout::class);
    Route::get('/my-orders', MyOrders::class);
    Route::get('/my-orders/{order}', MyOrdersDetail::class)->name('my-orders.show');

    Route::get('/success', Success::class)->name('success');
    Route::get('/cancel', Cancel::class)->name('cancel');

    Route::get('/logout', function () {
        auth()->logout();
        return redirect()->to('/');
    });
});
