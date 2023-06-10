<?php

use App\Modules\Categories\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class);
