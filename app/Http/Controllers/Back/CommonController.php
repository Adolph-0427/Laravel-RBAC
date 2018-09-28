<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Repositories\Access\AccessAuthorityRepository;

class CommonController extends Controller
{
    protected $AccessAuthorityRepository;

    public function __construct()
    {
        $this->request = request();
        // 验证是否登录
        $this->middleware(function ($request, $next) {
            if (session('user.username') == null) {
                redirect('/login')->withErrors(['未登录，请前去登录！'])->send();
                exit();
            }
            return $next($request);
        });

        $this->access();
    }

    /**
     * 判断是否有权限
     */
    protected function access()
    {
        $this->AccessAuthorityRepository = new AccessAuthorityRepository('', '', '', '');

        $route = \Route::currentRouteName();

        $this->AccessAuthorityRepository->menuAccess($route);
    }

}
