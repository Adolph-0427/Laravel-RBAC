<?php

namespace App\Repositories\Access;

use App\Model\User;
use App\Repositories\EloquentRepository;
use App\Model\UserRelationalRole;
use App\Model\UserRelationalGroup;
use App\Model\Menu;

class AccessAuthorityRepository extends EloquentRepository
{

    protected $UserRelationalRole;
    protected $UserRelationalGroup;
    protected $Menu;

    public function __construct(User $model, UserRelationalRole $UserRelationalRole, UserRelationalGroup $UserRelationalGroup, Menu $Menu)
    {
        parent::__construct($model);
        $this->UserRelationalRole = $UserRelationalRole;
        $this->UserRelationalGroup = $UserRelationalGroup;
        $this->Menu = $Menu;
    }

    //菜单访问权限
    public function menuAccess($route = '')
    {
        //无用户组和无角色的
        if (!$this->UserRelationalRole->where('uid', '=', session('user.uid'))->exists() || !$this->UserRelationalGroup->where('uid', '=', session('user.uid'))->exists()) {
            return back()->withErrors('未分配权限');
        }

        $mid = $this->Menu->where('route', '=', $route)->value('id');

    }
}