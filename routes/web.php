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
use App\Livewire\Product;
use App\Livewire\ProductDetail;
use App\Livewire\Success;
use Illuminate\Support\Facades\Route;

// auth
Route::get('/login', Login::class);
Route::get('/register', Register::class);
Route::get('/forgot', ForgotPassword::class);
Route::get('/reset', ResetPassword::class);

Route::get('/', HomePage::class);
Route::get('/categories', Category::class);
Route::get('/products', Product::class);
Route::get('/products/{slug}', ProductDetail::class);

Route::get('/cart', Cart::class);
Route::get('/checkout', Checkout::class);
Route::get('/my-orders', MyOrders::class);
Route::get('/my-orders/{order}', MyOrdersDetail::class);

Route::get('/success', Success::class);
Route::get('/cancel', Cancel::class);
