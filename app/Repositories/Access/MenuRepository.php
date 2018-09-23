<?php

namespace App\Repositories\Access;

use App\Model\Menu;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use App\Model\AccessRelationalRole;

class MenuRepository extends EloquentRepository
{

    protected $Access;
    protected $AccessRelationalRole;

    public function __construct(Menu $model, AccessRepository $Access, AccessRelationalRole $AccessRelationalRole)
    {
        parent::__construct($model);
        $this->Access = $Access;
        $this->AccessRelationalRole = $AccessRelationalRole;
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
        if ($this->model->where('pid', '=', $id)->exists()) {
            return back()->withErrors('请先删除子菜单');
        }

        //查询所对应的权限ID
        $aid = DB::table('access_relational_menu')->where('mid', '=', $id)->value('aid');
        if ($this->AccessRelationalRole->where('aid', '=', $aid)->exists()) {
            return back()->withErrors('已经授权的菜单，无法删除');
        }

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