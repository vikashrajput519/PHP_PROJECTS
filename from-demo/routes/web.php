<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/adUser', 'user');
Route::post("/adUser", [UserController::class, "adUser"]);
Route::get('/getAllUsers', [UserController::class, "getAllUsers"]);

// Student details
Route::get('/getAllStudent', [StudentController::class, 'getAllStudentDetails']);

// Get all students with the help of uuery builders
Route::get('/getAllStudentWithQueryBuilder', [StudentController::class, 'getAllStudentsByQueryBuilder']);

// Get student of particular class
Route::get('/getStudentOfGivenClass/{class}', [StudentController::class, 'getStudentOfClassByClass']);