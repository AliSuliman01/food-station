<?php

use App\Modules\Categories\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Route;
use App\Modules\Categories\Controllers\CategoryController;

Route::resource('categories',CategoryController::class);
