<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $frontNamespace = 'App\Http\Controllers\Front';//PC端
    protected $backNamespace = 'App\Http\Controllers\Back';//后台管理
    protected $currentDomain;

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->currentDomain = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : "";
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        
        $this->mapBackRoutes();
        $this->mapApiRoutes();
        $this->mapFrontRoutes();
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
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
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
        Route::domain(config('route.api_url'))->prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * 管理后台
     */
    protected function mapBackRoutes()
    {
        Route::domain(config('route.back_url'))
            ->middleware('web')
            ->namespace($this->backNamespace)
            ->group(base_path('routes/back.php'));
    }

    /**
     * PC端
     */
    protected function mapFrontRoutes()
    {
        Route::middleware('web')
            ->domain(config('route.front_url'))
            ->namespace($this->frontNamespace)
            ->group(base_path('routes/front.php')
            );
    }

}
