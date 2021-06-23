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

use Modules\AuthorGroup\Http\Controllers\Front\AuthorGroupController;



Route::prefix('client')
    ->name('client.')
    ->middleware(['verified', 'role:client'])
    ->group(function() {
        Route::prefix('author-group')->group(function() {
            Route::get('/', [AuthorGroupController::class,'index'])->name('author-group');
            Route::get('/destroy/{authorGroup}', [AuthorGroupController::class,'destroy'])->name('author-group.destroy');
            Route::post('/store', [AuthorGroupController::class,'store'])->name('author-group.store');
        });
    });
