<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class access extends Model
{
    protected $table = 'access';

    protected $fillable = ['type'];

    public $timestamps = false;
}
