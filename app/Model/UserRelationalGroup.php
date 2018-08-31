<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserRelationalGroup extends Model
{
    protected $table = 'user_relational_group';

    protected $fillable = ['gid', 'uid'];

    public $timestamps = false;
}
