<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\StoreUserGroupPost;
use Illuminate\Http\Request;
use App\Repositories\AdminUser\UserGroupRepository;

class UserGroupController extends CommonController
{

    protected $UserGroup;

    public function __construct(UserGroupRepository $UserGroup)
    {
        parent::__construct();
        $this->UserGroup = $UserGroup;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Back.UserGroup.index', ['list' => $this->UserGroup->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.UserGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserGroupPost $request)
    {
        $this->UserGroup->create($request->all());
        return redirect('/group');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Back.UserGroup.edit', ['info' => $this->UserGroup->find($id)]);
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
        $this->UserGroup->update($request->all(), array('id' => $id));
        return redirect('/group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->UserGroup->delete($id);
        return redirect('/group');
    }
}
