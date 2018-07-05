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
            'name' => [
                'required',
                'min:5',
                'max:255',
            ],
            'description' => 'max:1000',
            'quantity' => 'numeric',
            'price' => 'required|numeric',
            'imageMater' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.min' => 'Tên sản phẩm ít nhất có 5 kí tự trở lên',
            'name.max' => 'Tên sản phẩm có tối đa 255 kí tự',
            'description.max' => 'Mô tả sản phẩm có tối đa 255 kí tự ',
            'quantity.numeric' => 'Số lượng cần nhập giá trị số ',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'imageMater.image' => 'Không đúng định dạng ảnh'
        ];
    }
}
