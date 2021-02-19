<?php

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ShowIndex;
use App\Http\Controllers\Admin\UserController;

Route::get('/', ShowIndex::class)->name('index');
Route::resources([
    'users' => UserController::class,
    'settings' => SettingController::class,
]);
