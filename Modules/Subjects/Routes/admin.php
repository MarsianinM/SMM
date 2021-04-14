<?php

use Modules\Subjects\Http\Controllers\Admin\SubjectController;

Route::resources([
    'subject' => SubjectController::class,
],[
    'except' => ['show']
]);

Route::get('subject/anyData', [SubjectController::class,'anyData'])->name('subject.anyData');
Route::patch('subject/hidden/{subject}', [SubjectController::class,'hidden'])->name('subject.hidden');
