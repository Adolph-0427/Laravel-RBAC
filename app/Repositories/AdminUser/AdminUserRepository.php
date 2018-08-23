<?php

namespace App\Repositories\AdminUser;

use App\Model\AdminUser;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Hash;

class AdminUserRepository extends EloquentRepository
{

    public function __construct(AdminUser $model)
    {
        parent::__construct($model);
    }

    /**
     * 登录
     * $username 用户名
     * $password 密码
     */
    public function login(array $data = [])
    {
        $password = $this->model->where([['username', '=', $data['username']]])->value('password');

        if (empty($password) || !Hash::check($data['password'], $password)) {
            return false;
        } else {
            $user = $this->model->where([['username', '=', $data['username']]])->select('username', 'describe')->first();;

            if ($user != false) {
                session(['user' => $user]);
                return true;
            } else {
                return false;
            }
        }
    }
}