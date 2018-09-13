<?php

namespace App\Repositories\Access;

use App\Model\Access;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class AccessRepository extends EloquentRepository
{

    public function __construct(Access $model)
    {
        parent::__construct($model);
    }

    //获取权限菜单
    public function menu()
    {
        $menu = DB::table('access_relational_menu')
            ->join('access', 'aid', '=', 'access.id')
            ->join('menu', 'mid', '=', 'menu.id')
            ->where('access.type', '=', 1)
            ->get(['access_relational_menu.*', 'menu.name', 'menu.route', 'menu.pid']);
        return $menu;
    }

}