<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
//        $this->middleware('login');
    }

    public function index()
    {

        dd(config('route.front_url'));
        //        dd(111);
    }
}
