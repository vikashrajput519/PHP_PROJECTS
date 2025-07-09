<?php

use App\Http\Controllers\Test1Controller;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/user', [Test1Controller::class, 'testFunction'])->name('test.user');
