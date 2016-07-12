<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoryRequest extends Request
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
            'catname'=>'required|unique:categories,cat_name',
        ];
    }
    public  function messages()
    {
        return [
            'catname.required'=>'Bạn vui lòng nhập tên thể loại',
            'catname.unique'=>'Tên thể loại đã tồn tại',
        ];
    }
}
