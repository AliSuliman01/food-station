<?php

use App\Modules\Users\Admins\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::resource('admins', AdminController::class)->middleware('auth:api');
