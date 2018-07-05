<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'content' => 'max:1000|min:6|required'
        ];
    }

    public function messages()
    {
        return [
            'content.max' => 'Bạn chỉ được nhập tối đa 1000 ký tự ',
            'content.min' => 'Bạn cần nhập tối thiểu 6 ký tự ',
            'content.required' => 'Bạn cần nhập trường này'
        ];
    }
}
