<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageBannerRequest extends FormRequest
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
            'imageBanner' => 'image|required',
        ];
    }

    public function messages()
    {
        return [
            'imageBanner.required' => 'Ảnh banner cần phải nhập',
            'imageBanner.image' => 'Không đúng định dạng ảnh',
        ];
    }
}
