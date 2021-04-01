<?php

namespace App\Providers;

use App\Models\Advertisement;
use App\Models\AfterPrint;
use App\Models\Article;
use App\Models\BusinessPrint;
use App\Models\Deliver;
use App\Models\Design;
use App\Models\EasyWork;
use App\Models\FrontPage;
use App\Models\Material;
use App\Models\OtherPolygraph;
use App\Models\OtherPrint;
use App\Models\Package;
use App\Models\Partner;
use App\Models\Polygraph;
use App\Models\Printing;
use App\Models\Representative;
use App\Models\Setting;
use App\Models\Souvenir;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('layouts.app', function (\Illuminate\Contracts\View\View $view) {
            Blade::if('role', function ($value) {
                return auth()->check() && auth()->user()->activeRoleIs($value);
            });
        });

        View::composer('*', function (\Illuminate\Contracts\View\View $view) {
            $view->with(
                'websiteTitle', \Cache::remember('websiteTitle', 3600, function () {
                                    return Setting::firstWhere('key', 'title')->value;
                                })
            );
            Blade::if('role', function ($value) {
                return auth()->check() && auth()->user()->activeRoleIs($value);
            });
        });
    }
}
