<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\StoreAdminUserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AdminUser\AdminUserRepository;
use App\Repositories\AdminUser\UserGroupRepository;
use  App\Repositories\AdminUser\AuthorizationRepository;

class AdminUserController extends CommonController
{
    protected $AdminUser;
    protected $UserGroup;
    protected $Authorization;

    public function __construct(AdminUserRepository $AdminUser, UserGroupRepository $UserGroup, AuthorizationRepository $Authorization)
    {
        parent::__construct();
        $this->AdminUser = $AdminUser;
        $this->UserGroup = $UserGroup;
        $this->Authorization = $Authorization;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Back.User.index', ['list' => $this->AdminUser->all()]);
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


    public function authorization(Request $request)
    {
        $userInfo = $this->AdminUser->find($request->uid, ['uid', 'username']);//获取用户信息
        $group = $this->UserGroup->all();
        return view('Back.User.authorization', ['userInfo' => $userInfo, 'group' => $group]);
    }

    /**
     * 授权
     */
    public function storeAuth(Request $request)
    {
        $data = [];
        foreach ($request->gids as $key => $value) {
            $data[$key]['gid'] = $value;
            $data[$key]['uid'] = $request->uid;
        }

        $this->Authorization->authorization($data, $request->uid);
        return redirect('/user');
    }
}
