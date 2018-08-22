<?php

namespace App\Repositories\Articles;

use App\Model\Articles;
use App\Repositories\EloquentRepository;

class ArticlesRepository  extends EloquentRepository
{

    public function __construct(Articles $model)
    {
        parent::__construct($model);
    }

}