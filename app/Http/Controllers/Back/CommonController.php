<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

class CommonController extends Controller
{
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
    }

    /**
     * 判断是否有权限
     */
    protected function access()
    {

    }

}
