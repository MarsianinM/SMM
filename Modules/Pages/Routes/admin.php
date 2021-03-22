<?php

use Modules\Pages\Http\Controllers\Admin\PageController;

Route::resources([
    'page' => PageController::class,
]);

Route::patch('hidden/{page}', [PageController::class,'hidden'])->name('page.hidden');
