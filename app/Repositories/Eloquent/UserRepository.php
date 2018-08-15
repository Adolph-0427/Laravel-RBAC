<?php
namespace App\Repositories\Eloquent;

use App\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var \App\User
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = array('*'))
    {
        return $this->user->all($columns);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->user->paginate($perPage, $columns);
    }

    /**
     * Create a new user
     * @param array $data
     * @return \App\User
     */
    public function create(array $data)
    {
        return $this->user->create($data);
    }

     /**
       * Update a user
       * @param array $data
       * @param $id
       * @return \App\User
       */
    public function update($data = [], $id)
    {
        return $this->user->whereId($id)->update($data);
    }

    /**
     * Store a user
     * @param array $data
     * @return \App\User
     */
    public function store($data = [])
    {
        $this->user->id = $data['id'];
        //...
        $this->user->save();
    }

    /**
     * Delete a user
     * @param array $data
     * @param $id
     * @return \App\User
     */
    public function delete($data = [], $id)
    {
        $this->user->whereId($id)->delete();
    }

    /**
     * @param $id
     * @param array $columns
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function find($id, $columns = array('*'))
    {
        $User = $this->user->whereId($id)->get($columns);
        return $User;
    }

    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findBy($field, $value, $columns = array('*'))
    {
        $User = $this->user->where($field, '=', $value)->get($columns);
        return $User;
    }

}