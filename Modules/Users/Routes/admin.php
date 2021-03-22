<?php

use Modules\Users\Http\Controllers\Admin\UserAdminController;

Route::resources([
    'users' => UserAdminController::class,
]);
Route::patch('hidden/{user}', [UserAdminController::class,'hidden'])->name('users.hidden');
