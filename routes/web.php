<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration/form', [AuthController::class, 'loadRegisterForm']);
Route::post('/register/user', [AuthController::class, 'registerUser'])->name('registerUser');
Route::get('/login/form', [AuthController::class, 'loadLoginPage']);
Route::post('/login/user', [AuthController::class, 'LoginUser'])->name('LoginUser');
Route::get('/404', [AuthController::class, 'load404']);
Route::get('/logout', [AuthController::class, 'LogoutUser']);

Route::middleware(['auth:sanctum', UserMiddleware::class])->group(function() {
    Route::get('/user/homepage', [UserController::class, 'loadHomePage']);
    Route::get('/user/reservation', [UserController::class, 'loadReservationPage']);
});

Route::middleware(['auth:sanctum'], AdminMiddleware::class)->group(function() {
    Route::get('admin/dashboard', [AdminController::class, 'loadDashboard'])->middleware('admin');
    Route::get('admin/room', [AdminController::class, 'loadRoom'])->middleware('admin');
});
