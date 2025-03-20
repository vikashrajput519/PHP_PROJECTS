<?php

use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// }) -> name('home');

Route::get('/', [HomeController::class, 'home']) -> name('home');

Route::get('login', [AuthManagerController::class, 'login']) -> name('login');
Route::post('login', [AuthManagerController::class, 'loginPost']) -> name('login');

Route::get('logout', [AuthManagerController::class, 'logout']) -> name('logout');

Route::get('register', [AuthManagerController::class, 'register']) -> name('register');
Route::post('register', [AuthManagerController::class, 'registerPost']) -> name('register');

Route::get('product/details/{productId}', [ProductController::class, 'getProductById'])->name('product.details');
