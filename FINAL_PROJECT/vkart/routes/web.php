<?php

use App\Http\Controllers\AuthManagerController;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}) -> name('home');

Route::get('login', [AuthManagerController::class, 'login']) -> name('login');
Route::post('login', [AuthManagerController::class, 'loginPost']) -> name('login');

Route::get('logout', [AuthManagerController::class, 'logout']) -> name('logout');

Route::get('register', [AuthManagerController::class, 'register']) -> name('register');
Route::post('register', [AuthManagerController::class, 'registerPost']) -> name('register');
