<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2018/8/17
 * Time: 15:54
 */

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = array('*'));

    /**
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = 15, $columns = array('*'));

    /**
     * Create a new $model_name
     * @param array $data
     * @return \$model_namespace
     */
    public function create(array $data);


    /**
     * Update a $model_name
     * @param array $data
     * @return \$model_namespace
     */
    public function update($data = [], $id);


    /**
     * Store a $model_name
     * @param array $data
     * @return \$model_namespace
     */
    public function store($data = []);


    /**
     * Delete a $model_name
     * @param array $data
     * @return \$model_namespace
     */
    public function delete($data = [], $id);


    /**
     * @param $id
     * @param array $columns
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function find($id, $columns = array('*'));


    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findBy($field, $value, $columns = array('*'));
}