<?php

namespace App\Repositories\Access;

use App\Model\AccessRelationalRole;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
class AuthRepository extends EloquentRepository
{

    public function __construct(AccessRelationalRole $model)
    {
        parent::__construct($model);
    }


    public function create(array $data)
    {
        $aids = explode(',', $data['aid']);
        $insert = [];
        foreach ($aids as $key => $value) {
            $insert[$key]['aid'] = $value;
            $insert[$key]['rid'] = $data['rid'];
        }
        DB::table('access_relational_role')->insert($insert);
    }
}