<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{

    protected $fillable = ['title', 'describe', 'cover_img', 'is_hot', 'publication_time','status','category_id','sort','user_id','content'];
}
