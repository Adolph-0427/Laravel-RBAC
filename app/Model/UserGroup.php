<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $table = 'user_group';

    protected $fillable = ['name', 'pid'];

    public $timestamps = false;
}
