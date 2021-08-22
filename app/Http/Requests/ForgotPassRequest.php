<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPassRequest extends FormRequest
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
            'password'=>'required|min:3',
            'repassword'=>'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Password tối thiểu 3 ký tự',
            'repassword.required'=>'Bạn chưa nhập lại Password',
            'repassword.same'=>'Nhập lại Password phải trùng với password',
        ];
    }
}
