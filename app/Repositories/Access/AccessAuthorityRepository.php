<?php

namespace App\Repositories\Access;

use App\Repositories\EloquentRepository;
use App\Model\User;
use App\Model\UserRelationalRole;
use App\Model\UserRelationalGroup;
use App\Model\Menu;

class AccessAuthorityRepository extends EloquentRepository
{

    protected $UserRelationalRole;
    protected $UserRelationalGroup;
    protected $Menu;

    public function __construct()
    {
        parent::__construct(new User());
        $this->UserRelationalRole = new UserRelationalRole();
        $this->UserRelationalGroup = new UserRelationalGroup();
        $this->Menu = new Menu();
    }

    //菜单访问权限
    public function menuAccess($route = '')
    {
        return redirect('/')->withErrors('未分配权限');
        //无用户组和无角色的
        if (!$this->UserRelationalRole->where('uid', '=', session('user.uid'))->exists() || !$this->UserRelationalGroup->where('uid', '=', session('user.uid'))->exists()) {
            return back()->withErrors(['未分配权限']);
        }

        $mid = $this->Menu->where('route', '=', $route)->value('id');

    }
}