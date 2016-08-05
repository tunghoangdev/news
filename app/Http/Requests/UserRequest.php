<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'txtuser' => 'required|unique:users,username',
            'txtpass' => 'required',
            'txtrepass'=>'required|same:txtpass',
            'txtemail'=>'required|unique:users,email',
        ];
    }
    
    public function messages()
    {
        return [
            'txtuser.required'=>'Bạn vui lòng nhập tên đăng nhập',
            'txtuser.unique'=>'Tên đăng nhập đã tồn tại',
            'txtpass.required'=>'Bạn vui lòng nhập mật khẩu',
            'txtrepass.required'=>'Bạn vui lòng nhập lại mật khẩu',
            'txtrepass.same'=>'Mật khẩu nhập lại không đúng',
            'txtemail.required'=>'Bạn vui lòng nhập Email',
            'txtemail.regex'=>'Email không hợp lệ',
        ];
    }
}
