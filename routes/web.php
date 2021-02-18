<?php

use App\Http\Controllers\BlackListController;
use App\Http\Controllers\Consumers\UserController;
use App\Http\Controllers\Customers\WishlistController;
use App\Http\Controllers\Finances\PaymentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SupportMessageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', IndexController::class);

Route::resource('news', NewsController::class);
Route::resource('faqs', FaqController::class);
Route::resource('rules', RuleController::class);
Route::resource('prices', PriceController::class);

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::post('support/message/{support}', [SupportMessageController::class, 'message'])->name('support.message');
    Route::resource('support', SupportController::class);

    Route::post('message/message/{message}', [MessageController::class, 'message'])->name('message.message');
    Route::resource('messages', MessageController::class);

    Route::resource('projects', ProjectController::class);
    Route::resource('users', UserController::class);

    Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {
       Route::resource('projects', \App\Http\Controllers\Customers\ProjectController::class);
    });
    Route::resource('blacklist', BlackListController::class);
    Route::resource('wishlist', WishlistController::class);
    Route::resource('payment', PaymentController::class);
});

Route::group(['prefix' => 'panel', 'as' => 'admin.'], function () {
    Route::resource('support', \App\Http\Controllers\Admin\SupportController::class);
    Route::post('support/message/{support}', [SupportMessageController::class, 'message'])->name('support.message');

    Route::post('message/message/{message}', [\App\Http\Controllers\Admin\MessageController::class, 'message'])->name('message.message');
    Route::resource('messages', \App\Http\Controllers\Admin\MessageController::class);
});
