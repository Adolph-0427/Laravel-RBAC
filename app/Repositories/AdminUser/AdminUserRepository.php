<?php

namespace App\Repositories\AdminUser;

use App\Model\AdminUser;
use App\Repositories\EloquentRepository;

class AdminUserRepository extends EloquentRepository
{


    public function __construct(AdminUser $model)
    {
        parent::__construct($model);
    }

}