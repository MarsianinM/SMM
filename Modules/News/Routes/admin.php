<?php

use Modules\News\Http\Controllers\Admin\NewsController;
use Modules\News\Http\Controllers\Admin\PostsController;
use Modules\News\Http\Controllers\Admin\CategoriesController;

Route::prefix('news')->group(function() {
    Route::get('/', [NewsController::class, 'index'])->name('index');

    Route::resources([
        'post' => PostsController::class,
        'category' => CategoriesController::class,
    ]);

});

//Route::patch('hidden/{page}', [PageController::class,'hidden'])->name('news.hidden');
