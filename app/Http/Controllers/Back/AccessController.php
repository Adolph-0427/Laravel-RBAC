<?php

namespace App\Http\Controllers\Back;

use App\Repositories\Access\AccessRepository;
use Illuminate\Http\Request;

class AccessController extends CommonController
{

    protected $Access;

    public function __construct(AccessRepository $Access)
    {
        parent::__construct();
        $this->Access = $Access;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Back.Access.menu_access', ['list' => $this->Access->menu()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request->all());
//        $this->Access->create($request->all());

        return redirect('/access');
    }

}
