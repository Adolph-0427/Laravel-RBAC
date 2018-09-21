<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccessRelationalRole extends Model
{
    protected $table = 'access_relational_role';

    protected $fillable = ['rid', 'aid'];

    public $timestamps = false;
}
