<?php

namespace App\Repositories\Articles;

use App\Model\ArticleCategory;
use App\Repositories\EloquentRepository;

class ArticleCategoryRepository  extends EloquentRepository
{

    public function __construct(ArticleCategory $model)
    {
        parent::__construct($model);
    }

}