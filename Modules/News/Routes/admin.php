<?php

use Modules\News\Http\Controllers\Admin\NewsController;


Route::resources([
    'news' => NewsController::class,
]);

Route::patch('hidden/{news}', [NewsController::class,'hidden'])->name('news.hidden');
