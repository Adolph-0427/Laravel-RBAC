<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\StoreUserGroupPost;
use Illuminate\Http\Request;
use App\Repositories\AdminUser\UserGroupRepository;
use App\Repositories\AdminUser\RoleRepository;
use App\Repositories\AdminUser\AuthorizationRepository;

class UserGroupController extends CommonController
{

    protected $UserGroup;
    protected $Role;
    protected $Authorization;

    public function __construct(UserGroupRepository $UserGroup, RoleRepository $Role, AuthorizationRepository $Authorization)
    {
        parent::__construct();
        $this->UserGroup = $UserGroup;
        $this->Role = $Role;
        $this->Authorization = $Authorization;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Back.UserGroup.index', ['list' => $this->UserGroup->paginate()]);
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


    /**
     * 授权角色 view
     */
    public function authorizationRole(Request $request)
    {
        $roles = $this->Role->all();
        $info = $this->UserGroup->find($request->gid);
        return view('Back.UserGroup.authorizationRole', ['info' => $info, 'roles' => $roles]);
    }

    /**
     * 授权角色 store
     */
    public function storeAuthRole(Request $request)
    {
        $data = [];
        foreach ($request->rids as $key => $value) {
            $data[$key]['rid'] = $value;
            $data[$key]['gid'] = $request->gid;
        }

        $this->Authorization->groupAuthorizationRole($data);
        return redirect('/group');
    }
}
