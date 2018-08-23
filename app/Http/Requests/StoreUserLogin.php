<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserLogin extends FormRequest
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
            'username' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '请填写用户名',
            'password.required' => '请填写密码',
            'captcha.required' => '请填写验证码',
            'captcha.captcha' => '验证码错误',
        ];
    }
}
