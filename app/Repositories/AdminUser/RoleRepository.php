<?php

namespace App\Repositories\AdminUser;

use App\Model\Role;
use App\Repositories\EloquentRepository;

class RoleRepository  extends EloquentRepository
{

    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

}