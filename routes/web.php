<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration/form', [AuthController::class, 'loadRegisterForm']);
Route::post('/register/user', [AuthController::class, 'registerUser'])->name('registerUser');
Route::get('/login/form', [AuthController::class, 'loadLoginPage']);
Route::post('/login/user', [AuthController::class, 'LoginUser'])->name('LoginUser');
Route::get('/404', [AuthController::class, 'load404']);
Route::get('/logout', [AuthController::class, 'LogoutUser']);
