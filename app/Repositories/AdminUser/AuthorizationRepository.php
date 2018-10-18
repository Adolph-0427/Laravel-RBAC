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
        $this->model->where('uid', $data[0]['uid'])->delete();
        return $this->model->insert($data);
    }

    //用户授权角色
    public function authorizationRole($data = [])
    {
        $this->Role->where('uid', $data[0]['uid'])->delete();
        return $this->Role->insert($data);
    }

    //用户组授权角色
    public function groupAuthorizationRole($data = [])
    {
        $this->Role_Group->where('gid', $data[0]['gid'])->delete();
        return $this->Role_Group->insert($data);
    }
}