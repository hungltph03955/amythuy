<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
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
            'name' => 'required|min:4|max:100',
            'email' => 'required|email|max:100',
            'detail' => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn cần nhập tên',
            'name.min' => 'Bạn cần nhập ít nhất 4 ký tự ',
            'name:max' => 'Bạn chỉ được nhập tối đa 100 ký tự ',
            'email.required' => 'Bạn cần nhập email',
            'email.email' => 'Bạn nhập không đúng định dạng email ',
            'email.max' => 'Bạn chỉ được nhập tối đa 100 ký tự ',
            'detail.required' => 'Bạn cần nhập nội dung',
            'detail.max' => 'Bạn chỉ được nhập tối đa 1000 ký tự'
        ];
    }
}
