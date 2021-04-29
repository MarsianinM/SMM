<?php

use App\Http\Controllers\Author\ShowHomePage;
use App\Http\Controllers\Author\WishlistController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => \LaravelLocalization::setLocale()], function() {
    Route::get('/', function () {
        return redirect()->route('author.home');
    });
    Route::get('home', ShowHomePage::class)->name('home');
    Route::resource('wishlist', WishlistController::class);
});
