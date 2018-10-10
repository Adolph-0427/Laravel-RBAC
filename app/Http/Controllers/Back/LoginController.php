<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\StoreUserLogin;
use App\Http\Controllers\Controller;
use App\Repositories\AdminUser\AdminUserRepository;


class LoginController extends Controller
{

    protected $AdminUser;

    public function __construct(AdminUserRepository $AdminUser)
    {
        $this->AdminUser = $AdminUser;
    }

    //用户登录
    public function login(StoreUserLogin $request)
    {

        $result = $this->AdminUser->login($request->all());
        if ($result !== false) {
            return redirect('/user');
        } else {
            return back()->withErrors(['用户名或者密码错误']);
        }
        return redirect('login');
    }

    //退出登录
    public function logout()
    {
        if (session(['user' => null]) == null) {
            return redirect('/login');
        }
    }
}
