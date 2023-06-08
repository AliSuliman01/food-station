<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Settings\Controllers\SettingController;

Route::apiResource('settings',SettingController::class);
