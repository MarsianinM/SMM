<?php


use Modules\Rates\Http\Controllers\Admin\RateController;

Route::resources([
    'rates' => RateController::class,
]);
