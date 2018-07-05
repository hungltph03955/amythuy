<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\CategoryCannotParentItSelf;

class SizeRequest extends FormRequest
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
                'max:255',
            ],
            'description' => 'max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên kích cỡ không được để trống',
            'name.max' => 'Tên kích cỡ quá dài',
            'description.max' => 'Mô tả quá dài'
        ];
    }
}
