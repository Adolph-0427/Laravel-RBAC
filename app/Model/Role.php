<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'user_role';

    protected $fillable = ['name'];

    public $timestamps = false;
}
