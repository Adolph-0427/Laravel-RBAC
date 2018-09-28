<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\StoreAdminUserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AdminUser\AdminUserRepository;
use App\Repositories\AdminUser\UserGroupRepository;
use  App\Repositories\AdminUser\AuthorizationRepository;
use App\Repositories\AdminUser\RoleRepository;

class AdminUserController extends CommonController
{
    protected $AdminUser;
    protected $UserGroup;
    protected $Authorization;
    protected $Role;

    public function __construct(AdminUserRepository $AdminUser, UserGroupRepository $UserGroup, AuthorizationRepository $Authorization, RoleRepository $Role)
    {
        parent::__construct();
        $this->AdminUser = $AdminUser;
        $this->UserGroup = $UserGroup;
        $this->Authorization = $Authorization;
        $this->Role = $Role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Back.User.index', ['list' => $this->AdminUser->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminUserPost $request)
    {
        $request->offsetSet('password', Hash::make($request->password));//加密密码

        $this->AdminUser->create($request->all());
        return redirect('/user');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Back.User.edit', ['info' => $this->AdminUser->find($id, array('uid', 'username', 'describe'))]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->AdminUser->update($request->all(), array('uid' => $id));
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->AdminUser->delete($id);
        return redirect('/user');
    }


    /**
     * 授权用户组 view
     */

    public function authorizationGroup(Request $request)
    {
        $userInfo = $this->AdminUser->find($request->uid, ['uid', 'username']);//获取用户信息
        $group = $this->UserGroup->all();
        return view('Back.User.authorizationGroup', ['userInfo' => $userInfo, 'group' => $group]);
    }

    /**
     * 授权用户组 store
     */

    public function storeAuthGroup(Request $request)
    {
        $data = [];
        foreach ($request->gids as $key => $value) {
            $data[$key]['gid'] = $value;
            $data[$key]['uid'] = $request->uid;
        }

        $this->Authorization->authorizationGroup($data);
        return redirect('/user');
    }

    /**
     * 授权角色 view
     */
    public function authorizationRole(Request $request)
    {
        $userInfo = $this->AdminUser->find($request->uid, ['uid', 'username']);//获取用户信息
        $roles = $this->Role->all();
        return view('Back.User.authorizationRole', ['userInfo' => $userInfo, 'roles' => $roles]);
    }

    /**
     * 授权角色 store
     */
    public function storeAuthRole(Request $request)
    {
        $data = [];
        foreach ($request->rids as $key => $value) {
            $data[$key]['rid'] = $value;
            $data[$key]['uid'] = $request->uid;
        }

        $this->Authorization->authorizationRole($data);
        return redirect('/user');

    }
}
