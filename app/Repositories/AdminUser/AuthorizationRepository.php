<?php

namespace App\Repositories\AdminUser;

use App\Model\UserRelationalGroup;
use App\Repositories\EloquentRepository;

class AuthorizationRepository extends EloquentRepository
{

    public function __construct(UserRelationalGroup $model)
    {
        parent::__construct($model);
    }

    //权限设置
    public function authorization($data = [], $uid)
    {
        $this->model->where('uid', $uid)->delete();
        return $this->model->insert($data);
    }

}