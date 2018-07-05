<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\CategoryCannotParentItSelf;

class ColorRequest extends FormRequest
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
                'min:2',
                'max:255',
            ],
            'description' => 'max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên màu sắc không được để trống',
            'name.min' => 'Tên màu sắc quá ngắn',
            'name.max' => 'Tên màu sắc quá dài',
            'description.max' => 'Mô tả quá dài'
        ];
    }
}
