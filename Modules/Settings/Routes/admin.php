<?php


use Modules\Settings\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SettingController as SettingOld;
Route::resources([
    'settings'          => SettingController::class,
    'setting'           => SettingOld::class,
]);
