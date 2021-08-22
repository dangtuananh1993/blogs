<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreatePostRequest extends FormRequest
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
            'title'=>'required|min:16|unique:posts',
            'description'=>'required',
            'category'=>'required',
            'content'=>'required',
            'thumnail'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Bạn chưa nhập tiêu đề',
            'title.min'=>'Tiêu đề tối thiểu 16 ký tự',
            'title.unique'=>'Tiêu đề đã tồn tại',
            'description.required'=>'Bạn chưa nhập mô tả',
            'category.required'=>'Bạn chưa chọn danh mục',
            'content.required'=>'Bạn chưa nhập nội dung bài viết',
            'thumnail.required'=>'Bạn chưa chọn ảnh',
        ];
    }
}
