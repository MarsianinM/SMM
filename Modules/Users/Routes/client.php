<?php

use App\Http\Controllers\Client\ProjectController;
use Modules\Users\Http\Controllers\Front\ClientController;

 Route::get('/home', function () {
     return redirect()->route('client.project');
 });
 //Route::get('my-projects', ClientController::class)->name('home');
/*
Route::resource('projects', ProjectController::class);*/

//Route::get('my-projects', [ClientController::class, 'index'])->name('home');
