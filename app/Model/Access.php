<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table = 'access';

    protected $fillable = ['type'];

    public $timestamps = false;


    public function menu()
    {
        return $this->belongsToMany('App\Model\Menu', 'access_relational_menu', 'aid', 'mid');
    }
}
