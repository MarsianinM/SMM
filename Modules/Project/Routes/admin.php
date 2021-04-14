<?php

use Modules\Project\Http\Controllers\Admin\ProjectController;


Route::resources([
    'project' => ProjectController::class,
], [
    'except' => ['show']
]);

Route::get('project/anyData', [ProjectController::class,'anyData'])->name('project.anyData');
Route::patch('hidden/{project}', [ProjectController::class,'hidden'])->name('project.hidden');
