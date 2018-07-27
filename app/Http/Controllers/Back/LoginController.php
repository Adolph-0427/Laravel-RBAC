<?php

namespace App\Http\Controllers\Back;

use App\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;

class LoginController extends Controller
{

    //用户登录
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ], [
            'username.required' => '请填写用户名',
            'password.required' => '请填写密码',
            'captcha.required' => '请填写验证码',
            'captcha.captcha' => '验证码错误',
        ]);
        if (!$validator->fails()) {
            $user = new AdminUser();
            $result = $user->login($request->all());
            if ($result !== false) {
                return redirect('/user');
            } else {
                $validator->errors()->add('username_password', '账号或密码错误！');
            }
        }
        return redirect('/login')->withErrors($validator)->withInput();
    }

}
