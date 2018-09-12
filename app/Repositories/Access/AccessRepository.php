<?php

namespace App\Repositories\Access;

use App\Model\Access;
use App\Repositories\EloquentRepository;
use  App\Model\Menu;

class AccessRepository extends EloquentRepository
{

    protected $Menu;

    public function __construct(Access $model, Menu $Menu)
    {
        parent::__construct($model);
        $this->Menu = $Menu;
    }

    //获取权限菜单
    public function menu()
    {
        \DB::enableQueryLog();
        $this->model->menu()->get();
        dd(\DB::getQueryLog());
    }

}