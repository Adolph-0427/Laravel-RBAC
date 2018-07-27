<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = 'admin_user';
    protected $primaryKey = 'uid';
    protected $fillable = ['username', 'describe', 'password'];

    /**
     * 登录
     * $username 用户名
     * $password 密码
     */
    public function login($data)
    {

        $user = $this->where([['username', '=', $data['username']], ['password', '=', $data['password']]])->select('username', 'describe')->first();;

        if ($user != false) {
            session(['user' => $user]);
            return true;
        } else {
            return false;
        }

    }

}
