<?php

use Modules\News\Http\Controllers\Admin\NewsController;


Route::resources([
    'news' => NewsController::class,
]);
