<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserRelationalRole extends Model
{
    protected $table = 'user_relational_role';

    protected $fillable = ['rid', 'uid'];

    public $timestamps = false;
}
