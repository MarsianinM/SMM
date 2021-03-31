<?php

use Modules\Project\Http\Controllers\Admin\ProjectController;


Route::resources([
    'project' => ProjectController::class,
]);

Route::patch('hidden/{project}', [ProjectController::class,'hidden'])->name('project.hidden');
