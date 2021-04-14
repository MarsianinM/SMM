<?php

use Modules\Pages\Http\Controllers\Admin\PageController;

Route::resources([
    'page' => PageController::class,
],[
'except' => ['show']
]);

Route::patch('page/hidden/{page}', [PageController::class,'hidden'])->name('page.hidden');
