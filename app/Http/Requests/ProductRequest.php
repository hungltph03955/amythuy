<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $id = $this->segment(3) ?? 0;
        return [
            'name' => [
                'required',
                'min:5',
                'max:255',
                Rule::unique('products')->ignore($id),
            ],
            'category_id' => 'required',
            'quantity' => 'numeric',
            'price' => 'required|numeric',
            'imageMater' => 'image|required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.min' => 'Tên sản phẩm ít nhất có 5 kí tự trở lên',
            'name.max' => 'Tên sản phẩm có tối đa 255 kí tự',
            'name.unique' => 'Tên sản phẩm đã đã được sử dụng',
            'category_id.required' => 'Vui lòng chọn danh mục sản phẩm',
            'quantity.numeric' => 'Số lượng cần nhập giá trị số ',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'imageMater.image' => 'Không đúng định dạng ảnh',
            'imageMater.required' => 'Ảnh đại diện cần phải nhập',
        ];
    }
}
