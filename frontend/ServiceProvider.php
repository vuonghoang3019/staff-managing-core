<?php

namespace Frontend;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as Service;


class ServiceProvider extends Service
{

    protected $namespace = "Frontend\Http\Controllers";

    protected $prefix = "frontend";

    public function boot()
    {
        $this->routes();
        $this->lang();
        $this->config();
        $this->views();
        $this->middleware();
    }

    public function routes()
    {
        if (file_exists(__DIR__ . '/Routes/Routes.php')) {
//            Route::prefix($this->prefix)
//                ->namespace($this->namespace)
//                ->group(__DIR__ . '/Routes/Routes.php');
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(__DIR__.'/Routes/Routes.php');
        }
    }

    public function lang()
    {
        if (is_dir(__DIR__ . './Lang')) {
            $this->loadJsonTranslationsFrom(__DIR__ . './Lang');
        }
    }

    public function config()
    {

    }

    public function views()
    {
        if (is_dir(__DIR__ . './Views')) {
            $this->loadViewsFrom(__DIR__.'/Views', 'frontend');
        }
    }

    public function middleware()
    {

    }
}
