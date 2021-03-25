<?php

use App\Http\Controllers\BlackListController;
use App\Http\Controllers\Consumers\UserController;
use App\Http\Controllers\Customers\WishlistController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\SetRole;
use App\Http\Controllers\ShowBalance;
use App\Http\Controllers\ShowFinance;
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
/*
Route::resource('news', NewsController::class);*/
Route::resource('faqs', FaqController::class);
Route::resource('rules', RuleController::class);
Route::resource('prices', PriceController::class);

Auth::routes(['verify' => true]);
Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
Route::group(['middleware' => 'verified'], function () {
    Route::get('home', function () {
        return redirect()->route(request()->user()->getHomePageRoute());
    })->name('home');

    Route::get('balance', ShowBalance::class)->name('balance.index');
    Route::get('finance', ShowFinance::class)->name('finance.index');
    Route::post('set-role', SetRole::class)->name('set-role');

    Route::post('support/message/{support}', [SupportMessageController::class, 'message'])->name('support.message');
    Route::resource('support', SupportController::class);

    Route::post('message/message/{message}', [MessageController::class, 'message'])->name('message.message');
    Route::resource('messages', MessageController::class);
    Route::resource('users', UserController::class);

    Route::resource('blacklist', BlackListController::class);
});
});
