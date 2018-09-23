<?php

namespace App\Repositories\Access;

use App\Model\AccessRelationalRole;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class AuthRepository extends EloquentRepository
{
    protected $AccessRelationalRole;

    public function __construct(AccessRelationalRole $model, AccessRelationalRole $AccessRelationalRole)
    {
        parent::__construct($model);
        $this->AccessRelationalRole = $AccessRelationalRole;
    }


    /**
     * firstOrCreate 只添加不存在的
     */
    public function create(array $data)
    {
        $aids = explode(',', $data['aid']);//选中的
        $insert = [];
        foreach ($aids as $key => $value) {
            $insert[$key]['aid'] = $value;
            $insert[$key]['rid'] = $data['rid'];
            $this->AccessRelationalRole->firstOrCreate($insert[$key]);
        }
        //删除取消的
        $this->AccessRelationalRole->where('rid', '=', $data['rid'])->whereIn('aid', explode(',', $data['cancel_ids']))->delete();

    }
}