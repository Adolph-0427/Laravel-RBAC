<?php

namespace App\Http\Controllers\Back;

use App\Repositories\Access\AccessRepository;
use Illuminate\Http\Request;
use App\Repositories\Access\AuthRepository;

class AccessController extends CommonController
{

    protected $Access;
    protected $Auth;

    public function __construct(AccessRepository $Access, AuthRepository $Auth)
    {
        parent::__construct();
        $this->Access = $Access;
        $this->Auth = $Auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (empty($request->get('rid'))) {
            return redirect('/role');

        }
        return view('Back.Access.menu_access', ['list' => $this->Access->menu($request->get('rid'))]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->Auth->create($request->all());

        return redirect('/access');
    }

}
