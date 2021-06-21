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

use Modules\UserBlackList\Http\Controllers\Front\UserBlackListController;


Route::prefix('client')
    ->name('client.')
    ->middleware(['web', 'verified', 'role:client'])
    ->group(function() {
        Route::prefix('blacklist')->group(function() {
            Route::get('/', [UserBlackListController::class,'index'])->name('blacklist');
            Route::post('/store', [UserBlackListController::class,'store'])->name('blacklist.store');
            Route::get('/destroy/{blackList}', [UserBlackListController::class,'destroy'])->name('blacklist.remove');
            Route::post('/multiple-destroy', [UserBlackListController::class,'multipleDestroy'])->name('blacklist.multiple-remove');
        });
    });
