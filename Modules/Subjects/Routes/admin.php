<?php

use Modules\Subjects\Http\Controllers\Admin\SubjectController;

Route::resources([
    'subject' => SubjectController::class,
]);
