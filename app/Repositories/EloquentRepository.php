<?php

/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2018/8/17
 * Time: 15:53
 */

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    /**
     * Create a new repository instance.
     *
     * @param \Illuminate\Database\Eloquent\Model $model The model to execute queries on
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    /**
     * Make a new instance of the entity to query on
     *
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function all(array $columns = [])
    {
        return $this->model->with($columns);
    }


    /**
     * Retrieve all entities
     */
}