<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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
        $password = $this->where([['username', '=', $data['username']]])->value('password');

        if (empty($password) || !Hash::check($data['password'], $password)) {
            return false;
        } else {
            $user = $this->where([['username', '=', $data['username']]])->select('username', 'describe')->first();;

            if ($user != false) {
                session(['user' => $user]);
                return true;
            } else {
                return false;
            }
        }


    }

}
