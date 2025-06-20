<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/registration/form', [AuthController::class, 'loadRegisterForm']);
Route::post('/register/user', [AuthController::class, 'registerUser'])->name('registerUser');
Route::get('/login/form', [AuthController::class, 'loadLoginPage']);
Route::post('/login/user', [AuthController::class, 'LoginUser'])->name('LoginUser');
Route::get('/404', [AuthController::class, 'load404']);
Route::get('/logout', [AuthController::class, 'LogoutUser']);

Route::middleware(['auth:sanctum', UserMiddleware::class])->group(function() {
    Route::get('/user/dashboard', [UserController::class, 'loadDashboard']);
    Route::get('/user/reservation', [UserController::class, 'loadReservationPage']);
    Route::get('/user/rooms', [UserController::class, 'loadRooms']);
    Route::get('/user/profile', [UserController::class, 'loadProfile']);
    Route::get('/user/notifications', [UserController::class, 'loadNotifications']);
    Route::get('/user/help', [UserController::class, 'LoadHelp']);
    Route::get('/user/reservation/form', [UserController::class, 'loadReservationForm']);
    Route::get('/user/reservation/detail', [UserController::class, 'loadDetailReservation']);
    Route::get('/user/payment/{reservation_id}', [UserController::class, 'loadPaymentForm']);
});

Route::middleware(['auth:sanctum'], AdminMiddleware::class)->group(function() {
    Route::get('admin/dashboard', [AdminController::class, 'loadDashboard'])->middleware('admin');
    Route::get('admin/room', [AdminController::class, 'loadRoom'])->middleware('admin');
    Route::get('admin/reservation', [AdminController::class, 'loadReservation'])->middleware('admin');
    Route::get('admin/payment', [AdminController::class, 'loadPayment'])->middleware('admin');
    route::get('admin/employee', [AdminController::class, 'loadEmployee'])->middleware('admin');
    Route::get('admin/panic-button', [AdminController::class, 'loadPanic'])->middleware('admin');
});
