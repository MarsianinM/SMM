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

use Modules\Project\Http\Controllers\Front\AuthorProjectController;
use Modules\Project\Http\Controllers\Front\ClientProjectController;
/*use \App\Http\Controllers\Client\ShowHomePage;*/

Route::prefix('client')
    ->name('client.')
    ->middleware(['web', 'verified', 'role:client'])
    ->group(function() {
    Route::prefix('mi-projects')->group(function() {
        Route::get('/', [ClientProjectController::class,'index'])->name('projects.index');
        Route::get('/{project}/show', [ClientProjectController::class,'show'])->name('projects.show');
        Route::get('/{project}/edit', [ClientProjectController::class,'edit'])->name('projects.edit');
        Route::get('/create', [ClientProjectController::class,'create'])->name('projects.create');
        Route::post('/storage', [ClientProjectController::class,'store'])->name('projects.store');
        Route::patch('/update/{project}', [ClientProjectController::class,'update'])->name('projects.update');
        Route::get('/activate/{project}', [ClientProjectController::class,'activate'])->name('projects.activate');
        Route::get('/off/{project}', [ClientProjectController::class,'off'])->name('projects.off');
    });

});
Route::prefix('author')
    ->name('author.')
    ->middleware(['web', 'verified', 'role:author'])
    ->group(function() {
    Route::prefix('projects')->group(function() {
        Route::get('/', [AuthorProjectController::class,'index'])->name('projects.index');
        Route::get('/show/{project_id}', [AuthorProjectController::class,'show'])->name('projects.show');
        Route::post('/project_in_work', [AuthorProjectController::class,'projectInWork'])->name('projects.projectInWork');
    });

});
/*
Route::get('/', function () {
    return redirect()->route('client.home');
});
Route::get('home', \App\Http\Controllers\Client\ShowHomePage::class)->name('home');*/
