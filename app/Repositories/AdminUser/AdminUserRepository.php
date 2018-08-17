<?php

namespace App\Repositories\AdminUserRepository;

use App\Repositories\EloquentRepository;
class AdminUserRepository extends EloquentRepository
{
    /**
     * @var \App\User
     */
    public $user;

    public function __construct(AdminUser $user)
    {
        $this->user = $user;
    }

}