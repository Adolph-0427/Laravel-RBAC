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
     * @param array $with
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all(array $with = [], array $columns = ['*'])
    {
        return $this->model->with($with)->get($columns);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * Create
     * @param array $data
     * @return $model
     */

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update
     * @param array $data
     * @param array $where
     * @return $model
     */

    public function update(array $data = [], array $where = [])
    {
        unset($data['_token'], $data['_method']);
        return $this->model->where($where)->update($data);
    }


    /**
     * Delete
     * @param int $id
     * @return $model
     */
    public function delete($id)
    {

        return $this->model->find($id)->delete();
    }

    /**
     * @param $id
     * @param array $columns
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }


    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findBy($field, $value, $columns = array('*'))
    {
        return $this->model->where($field, '=', $value)->get($columns);
    }
}