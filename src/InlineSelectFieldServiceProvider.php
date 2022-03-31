<?php

namespace KirschbaumDevelopment\Nova;

use Illuminate\Support\Facades\Route;
use Laravel\Nova\Nova;
use Illuminate\Support\ServiceProvider;

class InlineSelectFieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function () {
            Nova::script('inline-select', __DIR__ . '/../dist/js/field.js');
            Nova::style('inline-select', __DIR__ . '/../dist/css/field.css');
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova'])
            ->prefix('nova-vendor/inline-select')
            ->namespace('KirschbaumDevelopment\Nova\Http\Controllers')
            ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
