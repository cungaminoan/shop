<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProductRequest extends FormRequest
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
            //
            "name"=>"required",
            "code"=>[
                "required",
                Rule::unique("products")->ignore($this->id),
            ],
            "price"=>"required",
            "info"=>"required",
            "describer"=>"required",

        ];
    }

    public function messages()
    {
        return [
            "name.required"=>"Tên không được để trống",
            "code.required"=>"Mã không được để trống",
            "code.unique"=>"Mã sản phẩm đã tồn tại",
            "price.required"=>"Giá không được để trống",
            "info.required"=>"Thông tin không được để trống",
            "describer.required"=>"Mô tả không được để trống",
        ];
    }
}
