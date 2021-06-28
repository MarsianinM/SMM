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
use Modules\AuthorGroup\Http\Controllers\Front\UserAuthorGroupController;


Route::prefix('client')
    ->name('client.')
    ->middleware(['verified', 'role:client'])
    ->group(function() {
        Route::prefix('author-group')->group(function() {
            Route::get('/', [AuthorGroupController::class,'index'])->name('author-group');
            Route::get('/destroy/{authorGroup}', [AuthorGroupController::class,'destroy'])->name('author-group.destroy');
            Route::post('/store', [AuthorGroupController::class,'store'])->name('author-group.store');
            Route::post('/update', [AuthorGroupController::class,'update'])->name('author-group.update');

            Route::prefix('users')->group(function() {
                Route::get('/{id}', [UserAuthorGroupController::class,'index'])->name('author-group.users');
                Route::post('/getUserSearch', [UserAuthorGroupController::class,'getUserSearch'])->name('author-group.user_search');
                Route::post('/store', [UserAuthorGroupController::class,'store'])->name('author-group.user_store');
                Route::post('/destroy', [UserAuthorGroupController::class,'destroy'])->name('author-group.user_destroy');
            });
        });
    });
