<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'article_category';
    protected $fillable = ['name', 'identify', 'describe', 'status', 'pid', 'level'];
    public $timestamps = false;

}
