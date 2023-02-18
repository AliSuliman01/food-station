<?php

use App\Modules\Users\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Modules\Users\Controllers\UserController;

Route::resource('users',UserController::class);

Route::prefix('admin')->as('admin.')->group(function(){
    Route::resource('users', AdminUserController::class);
});
