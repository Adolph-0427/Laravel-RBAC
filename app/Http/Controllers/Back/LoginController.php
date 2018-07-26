<?php

namespace App\Http\Controllers\Back;

use App\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    //用户登录
    public function login(Request $request)
    {
        $user = new AdminUser();

        $info = $user->login($request->username, $request->password);
        dump($info);
    }

}
