<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\FavoriteController;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->name('adminhome');

// Routes for viewing products as a user
Route::get('/userproducts', [ProductController::class, 'userIndex'])->name('user.products.index');

// Routes for managing products as an admin


// Display the products
Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Route to create a new product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route to edit a product
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Route to delete a product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


// Cart Routes
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

// Routes for managing favorites
Route::post('/favorites/toggle/{product}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');


Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/order-history', [OrderHistoryController::class, 'index'])->name('order.history');
