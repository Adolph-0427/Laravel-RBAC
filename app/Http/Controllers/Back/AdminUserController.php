<?php

namespace App\Http\Controllers\Back;

use App\AdminUser;
use App\Http\Requests\StoreAdminUserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Back.User.index', ['list' => AdminUser::all()]);
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
        $request->password = Hash::make($request->password);
        AdminUser::create($request->all());

        return redirect('/user');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminUser $adminUser
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminUser $adminUser, $id)
    {
        return view('Back.User.edit', ['info' => $adminUser::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\AdminUser $adminUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, AdminUser $adminUser)
    {
        $user = $adminUser::findOrFail($id);
        $user->update($request->all());
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminUser $adminUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminUser $adminUser, $id)
    {
        $user = $adminUser::findOrFail($id);
        $user->delete();
        return redirect('/user');
    }
}
