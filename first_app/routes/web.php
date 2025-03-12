<?php

use App\Http\Controllers\UserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/welcome', 'welcome');
// Route::view("/about/{name}", "about");

Route::get('/about/{name}', function($name) {
    return view('about', ['name'=>$name]);
});

Route::get('/sendValueUrlToRoutesToView/{value}', function($viewValueHolderVar) {
    return view('valueUrlToViews', ['viewValueHolderVar' =>$viewValueHolderVar]);
});

Route::get('getUser', [UserController::class, 'getUser']);
Route::get('about', [UserController::class, 'about']);
Route::get('getName/{name}', [UserController::class, 'getName']);
Route::get('getView', [UserController::class, 'getViewPage']);
Route::get('getViewPageWithParameter/{parameter}', [UserController::class, 'getViewWithParameter']);


