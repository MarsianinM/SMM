<?php

namespace Modules\AuthorGroup\Providers;

use App\Http\Middleware\CheckIfAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\AuthorGroup\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group(['prefix' => \LaravelLocalization::setLocale()], function() {
            Route::prefix('admin')
                ->middleware(['web', 'verified', CheckIfAdmin::class])
                ->namespace($this->namespace)
                ->name('admin.')
                ->group(module_path('AuthorGroup', '/Routes/admin.php'));

            Route::middleware(['web','auth'])
                ->namespace($this->moduleNamespace)
                ->group(module_path('AuthorGroup', '/Routes/web.php'));
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->moduleNamespace)
            ->group(module_path('AuthorGroup', '/Routes/api.php'));
    }
}
