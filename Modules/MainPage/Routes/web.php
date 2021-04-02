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
Route::get('/', [\Modules\MainPage\Http\Controllers\MainPageController::class,'index'])->name('mainpage.index');

Route::prefix('mainpage')->group(function() {
    Route::get('/', 'MainPageController@index');
});
