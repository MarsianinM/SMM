<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Settings\Entities\Setting;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       /* View::composer('layouts.app', function (\Illuminate\Contracts\View\View $view) {
            Blade::if('role', function ($value) {
                return auth()->check() && auth()->user()->activeRoleIs($value);
            });
        });*/
        View::composer('*', function (\Illuminate\Contracts\View\View $view) {
            $view->with('websiteSetting', \Cache::remember('websiteSetting', 3600, function () {
                return Setting::first();
            }));
            $view->with('array_localization', \Cache::remember('array_localization', 3600, function () {
                return LaravelLocalization::getSupportedLocales();
            }));
            Blade::if('role', function ($value) {
                return auth()->check() && auth()->user()->activeRoleIs($value);
            });
        });
    }
}
