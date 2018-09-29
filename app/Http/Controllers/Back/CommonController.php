<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Repositories\Access\AccessAuthorityRepository;

class CommonController extends Controller
{
    protected $AccessAuthorityRepository;

    public function __construct()
    {
        // 验证是否登录
        $this->middleware(function ($request, $next) {
            if (session('user.username') == null) {
                redirect('/login')->withErrors(['未登录，请前去登录！'])->send();
                exit();
            }
            $this->access();
            return $next($request);
        });


    }

    /**
     * 判断是否有权限
     */
    protected function access()
    {
        $this->AccessAuthorityRepository = new AccessAuthorityRepository();

        $route = \Route::currentRouteName();

        return $this->AccessAuthorityRepository->menuAccess($route);
    }


}
