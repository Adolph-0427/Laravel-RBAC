<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = ['name', 'url', 'pid', 'route'];

    public $timestamps = false;

    public function access()
    {
        return $this->belongsToMany('App\Model\Access', 'access_relational_menu', 'mid', 'aid');
    }
}
