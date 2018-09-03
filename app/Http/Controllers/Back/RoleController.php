<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\StoreRolePost;
use Illuminate\Http\Request;
use App\Repositories\AdminUser\RoleRepository;

class RoleController extends CommonController
{

    protected $Role;

    public function __construct(RoleRepository $Role)
    {
        parent::__construct();
        $this->Role = $Role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Back.Role.index', ['list' => $this->Role->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.Role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolePost $request)
    {
        $this->Role->create($request->all());
        return redirect('/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Back.Role.edit', ['info' => $this->Role->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->Role->update($request->all(), array('id' => $id));
        return redirect('/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Role->delete($id);
        return redirect('/role');
    }
}
