<?php

use App\Modules\Users\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
    Route::post('forget_password', [UserController::class, 'forget_password']);
    Route::post('verify_code', [UserController::class, 'verify_code']);
    Route::post('reset_password', [UserController::class, 'reset_password']);
    Route::post('logout', [UserController::class, 'logout'])->middleware('auth:api');
});

Route::prefix('users')->middleware('auth:api')->group(function () {
    Route::get('{user}/orders', [UserController::class, 'userOrders']);
});

Route::resource('users', UserController::class)->middleware('auth:api');
