<?php

namespace App\Repositories\Access;

use App\Model\Menu;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class MenuRepository extends EloquentRepository
{

    protected $Access;

    public function __construct(Menu $model, AccessRepository $Access)
    {
        parent::__construct($model);
        $this->Access = $Access;
    }

    public function create(array $data)
    {
        DB::transaction(function () use ($data) {
            $mid = parent::create($data);
            $aid = $this->Access->create(array('type' => 1));
            DB::table('access_relational_menu')->insert(array('aid' => $aid->id, 'mid' => $mid->id));
        });
    }

    public function delete($id)
    {
        DB::transaction(function () use ($id) {
            $relational = DB::table('access_relational_menu')->where('mid', $id)->first(['aid', 'mid']);
            parent::delete($relational->mid);
            $this->Access->delete($relational->aid);
            DB::table('access_relational_menu')->where('mid', $id)->delete();
        });

    }

    public function findBy($field, $value, $columns = array('*'))
    {
        $list = parent::findBy($field, $value, $columns);
        foreach ($list as &$v) {
            $v['parent'] = $this->model->find($v['pid']);
        }
        return $list;
    }
}