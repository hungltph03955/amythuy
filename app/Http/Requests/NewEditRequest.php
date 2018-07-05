<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\CategoryCannotParentItSelf;

class NewEditRequest extends FormRequest
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
            'imageNews' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tiêu đề không được để trống',
            'name.min' => 'Tiêu đề quá ngắn',
            'name.max' => 'Tiêu đề quá dài',
            'imageNews.image' => 'Không đúng định dạng ảnh',
        ];
    }
}
