<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3',
            'repassword'=>'required|same:password',
            'address'=>'required',
            'gender'=>'required|numeric|in:1,2',
            'bio'=>'required',
            'type'=>'required|numeric|in:1',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Bạn chưa nhập tên',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Định dạng email không đúng',
            'email.unique'=>'Địa chỉ email đã được sử dụng',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu tối thiểu 3 ký tự',
            'repassword.required'=>'Bạn chưa nhập lại mật khẩu',
            'repassword.same'=>'Mật khẩu chưa trùng khớp',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'gender.required'=>'Giới tính không hợp lệ',
            'gender.numeric'=>'Giới tính không hợp lệ',
            'gender.in'=>'Giới tính không hợp lệ',
            'bio.required'=>'Bạn chưa nhập giới thiệu bản thân',
            'type.required'=>'Type không hợp lệ',
            'type.numeric'=>'Type không hợp lệ',
            'type.in'=>'Type không hợp lệ',
        ];
    }
}
