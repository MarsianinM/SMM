<?php

use App\Http\Controllers\Client\ShowHomePage;

Route::get('/', function () {
    return redirect()->route('client.home');
});
Route::get('home', ShowHomePage::class)->name('home');
