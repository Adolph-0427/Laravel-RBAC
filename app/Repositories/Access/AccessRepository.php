<?php

namespace App\Repositories\Access;

use App\Model\Access;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class AccessRepository extends EloquentRepository
{

    protected $Auth;

    public function __construct(Access $model, AuthRepository $Auth)
    {
        parent::__construct($model);
        $this->Auth = $Auth;
    }


    //获取权限菜单
    public function menu($rid)
    {
        $menu = DB::table('access_relational_menu')
            ->join('access', 'aid', '=', 'access.id')
            ->join('menu', 'mid', '=', 'menu.id')
            ->where('access.type', '=', 1)
            ->get(['access_relational_menu.*', 'menu.name', 'menu.route', 'menu.pid']);
        $auth = $this->Auth->findBy('rid', $rid, ['aid']);
        $aids = [];
        foreach ($auth as $v) {
            $aids[] = $v['aid'];
        }
        foreach ($menu as $key => &$value) {
            if (in_array($value->aid, $aids)) {
                $value->checked = true;
            } else {
                $value->checked = false;
            }
        }
        return $menu;
    }

}