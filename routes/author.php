<?php

use App\Http\Controllers\Author\ShowHomePage;

Route::get('/', function () {
    return redirect()->route('author.home');
});
Route::get('home', ShowHomePage::class)->name('home');
