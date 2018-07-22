<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\CategoryCannotParentItSelf;

class CategoryEditRequest extends FormRequest
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
                'min:2',
                'max:255',
            ],
            'description' => 'required|max:1000',
            'imageCategory' => 'image',
            'parent_id' => new CategoryCannotParentItSelf($id)
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên Danh mục không được để trống',
            'name.min' => 'Tên Danh mục quá ngắn',
            'name.max' => 'Tên Danh mục quá dài',
            'description.required' => 'Mô tả không được để trống',
            'description.max' => 'Mô tả không được quá dài',
            'imageCategory.image' => 'Không đúng định dạng ảnh'
        ];
    }
}
