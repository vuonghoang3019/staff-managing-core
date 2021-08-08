<?php

namespace Backend\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as Service;

class ServiceProvider extends Service
{
    protected $namespace = "Backend\Http\Controllers";

    protected $prefix = "admin";

    public function boot()
    {
        $this->routes();
        $this->lang();
        $this->config();
        $this->views();
        $this->middleware();
    }

    /**
     * register route of module to root module
     */
    private function routes()
    {
        if (file_exists(__DIR__ . '/Routes/Routes.php')) {
            Route::prefix($this->prefix)
                ->namespace($this->namespace)
                ->group(__DIR__ . '/Routes/Routes.php');
        }
    }

    /**
     * register config of module to root module
     */
    private function config()
    {
        if (file_exists(__DIR__ . '/Config/Config.php')) {
            $this->mergeConfigFrom(__DIR__ . '/Config/Config.php', 'Backend');
        }
    }

    private function lang()
    {
        if (is_dir(__DIR__ . './Lang')) {
            $this->loadJsonTranslationsFrom(__DIR__ . './Lang');
        }
    }

    private function views()
    {
        if (is_dir(__DIR__ . './Views')) {
            $this->loadViewsFrom(__DIR__.'/path/to/views', 'backend');
        }
    }

    private function middleware()
    {
//        $this->app['router']->aliasMiddleware('user.GetSupervisorsSubordinates', GetSupervisorsSubordinates::class);
//        $this->app['router']->aliasMiddleware('user.GetAdmins', GetAdmins::class);
    }
}
