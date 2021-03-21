<?php

use Modules\MainPage\Http\Controllers\Admin\MainAdminController;

Route::get('/', [MainAdminController::class, 'index'])->name('index');

