<?php

use App\Modules\Translations\Controllers\TranslationController;
use Illuminate\Support\Facades\Route;

Route::apiResource('translations', TranslationController::class);
