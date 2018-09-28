<?php

namespace App\Repositories\AdminUser;

use App\Model\UserRelationalGroup;
use App\Model\UserRelationalRole;
use App\Repositories\EloquentRepository;
use App\Model\RoleRelationalGroup;

class AuthorizationRepository extends EloquentRepository
{
    protected $Role;
    protected $Role_Group;

    public function __construct(UserRelationalGroup $model, UserRelationalRole $Role, RoleRelationalGroup $Role_Group)
    {
        parent::__construct($model);
        $this->Role = $Role;
        $this->Role_Group = $Role_Group;
    }

    //用户授权用户组
    public function authorizationGroup($data = [])
    {
        foreach ($data as $key => $value) {
            $this->model->firstOrCreate($data[$key]);
        }
    }

    //用户授权角色
    public function authorizationRole($data = [])
    {
        foreach ($data as $key => $value) {
            $this->Role->firstOrCreate($data[$key]);
        }

    }

    //用户组授权角色
    public function groupAuthorizationRole($data = [])
    {
        foreach ($data as $key => $value) {
            $this->Role_Group->firstOrCreate($data[$key]);
        }
    }
}