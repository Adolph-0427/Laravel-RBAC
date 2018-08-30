<?php

namespace App\Repositories\AdminUser;

use App\Model\UserGroup;
use App\Repositories\EloquentRepository;

class UserGroupRepository  extends EloquentRepository
{

    public function __construct(UserGroup $model)
    {
        parent::__construct($model);
    }

}