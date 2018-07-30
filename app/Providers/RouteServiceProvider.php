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
    protected $namespace = 'App\Http\Controllers';//公共
    protected $frontNamespace = 'App\Http\Controllers\Front';//PC端
    protected $backNamespace = 'App\Http\Controllers\Back';//后台管理
    protected $apiNamespace = 'App\Http\Controllers\Api';//后台管理

    /**
     * Define your route model bindings, pattern filters, etc.
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

        $this->mapBackRoutes();
//        $this->mapApiRoutes();
//        $this->mapFrontRoutes();
//        $this->commonRoutes();
    }

    /**
     * Api
     */
    protected function mapApiRoutes()
    {
        Route::domain(config('route.api_url'))->prefix('api')
            ->middleware('api')
            ->namespace($this->apiNamespace)
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

    /**
     * 公共路由
     */
    protected function commonRoutes()
    {
        Route::middleware('web')
            ->domain(config('route.web_url'))
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php')
            );
    }
}
