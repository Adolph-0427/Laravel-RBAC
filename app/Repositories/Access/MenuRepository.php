<?php

namespace App\Repositories\Access;

use App\Model\Menu;
use App\Repositories\EloquentRepository;

class MenuRepository  extends EloquentRepository
{

    public function __construct(Menu $model)
    {
        parent::__construct($model);
    }

}