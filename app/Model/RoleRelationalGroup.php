<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleRelationalGroup extends Model
{
    protected $table = 'role_relational_group';

    protected $fillable = ['rid', 'gid'];

    public $timestamps = false;
}
