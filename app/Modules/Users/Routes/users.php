
<?php

use App\Modules\Users\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
    Route::post('logout', [UserController::class, 'logout'])->middleware('auth:api');
    Route::prefix('email')->group(function () {
        Route::post('verify', [UserController::class, 'verify_email'])->middleware('auth:api');
    });
});

Route::resource('users', UserController::class)->middleware('auth:api');
