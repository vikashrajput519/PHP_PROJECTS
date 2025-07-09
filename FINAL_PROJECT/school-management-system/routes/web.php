<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Public Routes
//Route::get('/', fn () => redirect('/login'));
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/student/dashboard', [AuthController::class, 'studentDashboard'])->name('student.dashboard');
Route::get('/staff/dashboard', [AuthController::class, 'staffDashboard'])->name('staff.dashboard');

// Dashboard after login
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');

// Admin Routes
Route::get('/admin/login', [AdminController::class, 'loginForm']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('admin')->name('admin.dashboard');
Route::get('/admin/users/create', [AdminController::class, 'createUser'])->middleware('admin')->name('admin.createUser');
Route::post('/admin/users/store', [AdminController::class, 'storeUser'])->middleware('admin')->name('admin.storeUser');

//Route::get('/user/profile', [ProfileController::class, 'getProfilePage']);
Route::get('/user/profile', [ProfileController::class, 'getProfilePage'])->name('user.profile');
Route::get('/user/profile/edit', [ProfileController::class, 'edit'])->name('user.profile.edit');
Route::post('/user/profile/update', [ProfileController::class, 'update'])->name('user.profile.update');