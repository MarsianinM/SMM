<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\News\Http\Controllers\Front\NewsController;

Route::prefix('news')->group(function() {
    Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/show/{slug}', [NewsController::class, 'show'])->name('news.show');
});
