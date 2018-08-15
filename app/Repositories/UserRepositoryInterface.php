<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 */

namespace App\Repositories;

interface  UserRepositoryInterface
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
     * Create a new User
     * @param array $data
     * @return \App\User
     */
    public function create(array $data);

    /**
     * Update a User
     * @param array $data
     * @return \App\User
     */
    public function update($data = [], $id);

    /**
     * Store a User
     * @param array $data
     * @return \App\User
     */
    public function store($data = []);

    /**
     * Delete a User
     * @param array $data
     * @return \App\User
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

