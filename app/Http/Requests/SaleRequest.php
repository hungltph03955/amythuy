<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\SaleLessThanProduct;
class SaleRequest extends FormRequest
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
            'name' => 'required|min:5|max:255',
            'product_id' => 'required',
            'sale_price' => ['required','numeric', new SaleLessThanProduct($this->request->get('product_id'))],
            'description' => 'required|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên ',
            'name.min' => 'Tên tối thiểu 5 kí tự',
            'name.max' => 'Tên tối đa 255 kí tự',
            'product_id.required' => 'Bạn chưa nhập sản phẩm ',
            'sale_price.required' => 'Bạn chưa nhập giá ',
            'sale_price.numeric' => 'Bạn phải nhập số ở đây',
            'description.required' => 'Bạn chưa nhập thông điệp ',
            'start_date.required' => 'Bạn chưa nhập ngày bắt đầu ',
            'start_date.date' => 'Bạn nhập chưa đúng định dạng ',
            'end_date.required' => 'Bạn chưa nhập ngày kết thúc ',
            'end_date.date' => 'Bạn nhập chưa đúng định dạng ',

        ];
    }
}
