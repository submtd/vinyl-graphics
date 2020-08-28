<?php

namespace Submtd\VinylGraphics\Providers;

use Illuminate\Support\ServiceProvider;
use Submtd\VinylGraphics\Commands\UserCreate;
use Submtd\VinylGraphics\Commands\UserList;
use Submtd\VinylGraphics\Commands\UserUpdate;
use Submtd\VinylGraphics\Services\UserService;
use Submtd\VinylGraphics\Services\VinylGraphics;

class VinylGraphicsServiceProvider extends ServiceProvider
{
    /**
     * register method.
     */
    public function register()
    {
        // facades
        $this->app->bind('user-service', function () {
            return new UserService();
        });
        $this->app->bind('vinyl-graphics', function () {
            return new VinylGraphics();
        });
        // commands
        $this->commands([
            UserCreate::class,
            UserList::class,
            UserUpdate::class,
        ]);
    }

    /**
     * boot method.
     */
    public function boot()
    {
        // config
        $this->mergeConfigFrom(__DIR__.'/../../config/vinyl-graphics.php', 'vinyl-graphics');
        $this->publishes([__DIR__.'/../../config' => config_path()], 'config');
        // migrations
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->publishes([__DIR__.'/../../database' => database_path()], 'migrations');
        // routes
        $this->loadRoutesFrom(__DIR__.'/../../routes/routes.php');
        // views
        $this->loadViewsFrom(__DIR__.'/../../views', 'vinyl-graphics');
        $this->publishes([__DIR__.'/../../views' => resource_path('views/vendor/vinyl-graphics')], 'views');
        // public
        $this->publishes([__DIR__.'/../../public/' => public_path('vinyl-graphics')], 'public');
        // middleware
        $this->app['router']->aliasMiddleware('admin', \Submtd\VinylGraphics\Middleware\Admin::class);
    }
}
