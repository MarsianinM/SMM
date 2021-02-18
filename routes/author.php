<?php

use App\Http\Controllers\Author\ShowHomePage;
use App\Http\Controllers\Author\WishlistController;

Route::get('/', function () {
    return redirect()->route('author.home');
});
Route::get('home', ShowHomePage::class)->name('home');
Route::resource('wishlist', WishlistController::class);
