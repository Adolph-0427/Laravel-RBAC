<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticlesPost extends FormRequest
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
            'title' => 'required|max:30',
            'describe' => 'required|max:50',
            'cover_img' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'title.max' => '标题不能超出30个字符',
            'describe.required' => '描述不能为空',
            'describe.max' => '描述不能超出50个字符',
            'cover_img.required' => '封面图不能为空',
            'category_id.required' => '文章分类不能为空',
            'content.required' => '文章不能为空',
        ];
    }
}
