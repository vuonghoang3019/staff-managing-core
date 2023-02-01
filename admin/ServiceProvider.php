<?php

namespace Admin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as Service;

class ServiceProvider extends Service
{

    protected string $namespace = "Admin\Http\Controllers";

    protected string $prefix = "admin";

    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function boot()
    {
        include_once(__DIR__.'/helper.php');

        $this->routes();
        $this->lang();
        $this->config();
        $this->views();
        $this->middleware();
        $this->migrations();
    }

    public function routes()
    {
        if (file_exists(__DIR__ . '/Routes/Routes.php')) {
            Route::namespace($this->namespace)
                ->group(__DIR__ . '/Routes/Routes.php');
        }
    }

    /**
     * register config of module to root module
     */
    private function config()
    {
        if (file_exists(__DIR__ . '/Config/Config.php')) $this->mergeConfigFrom(__DIR__ . '/Config/Config.php', 'Backend');
    }

    private function lang()
    {
        if (is_dir(__DIR__ . './Lang')) $this->loadJsonTranslationsFrom(__DIR__ . './Lang');
    }

    private function views()
    {
        if (is_dir(__DIR__ . '/Views')) $this->loadViewsFrom(__DIR__ . '/Views', 'admin');
    }

    private function middleware()
    {
//        $this->app['router']->aliasMiddleware('user.GetSupervisorsSubordinates', GetSupervisorsSubordinates::class);
//        $this->app['router']->aliasMiddleware('user.GetAdmins', GetAdmins::class);
    }

    protected function migrations()
    {
        $this->loadMigrationsFrom(__DIR__ . './Databases/Migrations');
    }
}
