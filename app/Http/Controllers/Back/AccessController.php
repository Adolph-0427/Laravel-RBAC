<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Repositories\Access\AccessRepository;

class AccessController extends CommonController
{

    protected $Access;

    public function __construct(AccessRepository $Access)
    {
        parent::__construct();
        $this->Access = $Access;
    }

    public function index()
    {
        return view('Back.Access.menu_access', ['list' => $this->Access->menu()]);
    }
}
