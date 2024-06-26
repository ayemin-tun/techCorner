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
use App\Livewire\MyAccount;
use App\Livewire\MyOrders;
use App\Livewire\MyOrdersDetail;
use App\Livewire\Product;
use App\Livewire\ProductDetail;
use App\Livewire\Review;
use App\Livewire\ReviewCreate;
use App\Livewire\ReviewEdit;
use App\Livewire\Success;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/categories', Category::class);
Route::get('/products', Product::class);
Route::get('/products/{slug}', ProductDetail::class);
Route::get('/cart', Cart::class);
Route::get('/review', Review::class);

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
    Route::get('/my-orders/{order_id}', MyOrdersDetail::class)->name('my-orders.show');
    Route::get('/my-account', MyAccount::class);
    Route::get('/success', Success::class)->name('success');
    Route::get('/cancel', Cancel::class)->name('cancel');

    Route::get('/review/create', ReviewCreate::class);
    Route::get('/review/edit/{review_id}', ReviewEdit::class);
    Route::get('/logout', function () {
        auth()->logout();

        return redirect()->to('/');
    });
});

Route::get('/test', function () {
    // Fetch users with the 'Customer' role from the User model
    $customerUsers = User::whereHas('roles', function ($query) {
        $query->where('name', 'Customer');
    })->get();

    // Fetch all customers using the Customer model
    $allCustomers = Customer::all();

    // Fetch a specific user by ID and their roles
    $user = User::find(4); // Fetch user with ID 4
    $userRoles = $user ? $user->getRoleNames() : 'User not found.';

    // Verify the roles assigned to all users
    $allUsersWithRoles = User::with('roles')->get();

    dd([
        'customer_users' => $customerUsers,
        'all_customers' => $allCustomers,
        'specific_user' => $user,
        'specific_user_roles' => $userRoles,
        'all_users_with_roles' => $allUsersWithRoles,
    ]);
});
