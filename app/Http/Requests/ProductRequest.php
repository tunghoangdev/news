<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:products,name',
            'catid'=>'required:products,catid',
        ];
    }
    public  function messages()
    {
        return [
            'name.required'=>'Bạn vui lòng nhập tên sản phẩm',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'catid.required'=>'Bạn vui lòng chọn danh mục',
        ];
    }
}
