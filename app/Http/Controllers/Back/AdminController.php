<?php

namespace App\Http\Controllers\Back;


class AdminController extends CommonController
{

    public function index()
    {
        return view('Back.Index.index');
    }

}
