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

use Modules\MainPage\Http\Controllers\MainPageController;

Route::get('/', [MainPageController::class,'index'])->middleware('guest')->name('mainpage.index');
