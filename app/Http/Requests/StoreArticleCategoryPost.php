<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleCategoryPost extends FormRequest
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
            'name' => 'required|max:10',
            'identify' => 'required|alpha',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => '名称不能为空',
            'name.max' => '名称超出长度限制',
            'identify.required' => '分类标识不能为空',
            'identify.alpha' => '分类标识为全英文',
        ];

    }
}
