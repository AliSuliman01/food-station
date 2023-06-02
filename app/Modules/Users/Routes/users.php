<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Users\Controllers\UserController;

Route::prefix('auth')->group( function(){
    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
});

Route::resource('users',UserController::class)->middleware('auth:api');
