<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table = 'access';

    protected $fillable = ['type'];

    public $timestamps = false;

}
