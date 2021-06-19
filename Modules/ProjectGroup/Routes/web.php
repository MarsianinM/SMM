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

use Modules\ProjectGroup\Http\Controllers\ProjectGroupController;


Route::prefix('client')
->name('client.')
->middleware(['web', 'verified', 'role:client'])
->group(function() {
    Route::prefix('project-group')->group(function() {
        Route::get('/', [ProjectGroupController::class,'index'])->name('project-group');
        Route::post('/add', [ProjectGroupController::class,'store'])->name('project-group-add');
        Route::post('/update', [ProjectGroupController::class,'update'])->name('project-group-update');
        Route::post('/destroy', [ProjectGroupController::class,'destroy'])->name('project-group-destroy');
    });
});
