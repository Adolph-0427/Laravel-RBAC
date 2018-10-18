<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;

class AdminController extends CommonController
{


    public function index()
    {
        return view('Back.Index.index');
    }

}
