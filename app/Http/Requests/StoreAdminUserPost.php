<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminUserPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:admin_user|max:10|alpha',
            'password' => 'required|confirmed',
            'describe' => 'max:50',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '用户名不能为空',
            'username.unique' => '用户名已存在',
            'username.max' => '用户名超出长度限制',
            'username.alpha' => '用户名必须完全由字母构成',
            'password.required' => '密码不能为空',
            'describe.max' => '描述超出长度限制',
            'password.confirmed' => '重复密码不正确',
        ];
    }
}
