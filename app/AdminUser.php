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
    public function login($username, $password)
    {

        $user = $this->where([['username', '=', $username], ['password', '=', $password]])->first();
        if($user != false){
            dd(1);
        }else{
            dd(2);
        }
    }
}
