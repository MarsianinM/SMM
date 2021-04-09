<?php


use Modules\Rates\Http\Controllers\Admin\RateController;
use Modules\Rates\Http\Controllers\Admin\CategoryController;

Route::resources([
    'rates'         => RateController::class,
    'category'      => CategoryController::class,
]);
