<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Translations\Controllers\TranslationController;

Route::apiResource('translations',TranslationController::class);
