<?php

namespace App\Repositories\Access;

use App\Model\Access;
use App\Repositories\EloquentRepository;

class AccessRepository  extends EloquentRepository
{

    public function __construct(Access $model)
    {
        parent::__construct($model);
    }

}