<?php

use App\Modules\Settings\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::apiResource('settings', SettingController::class);
