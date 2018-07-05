<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $id = $this->segment(4) ?? 0;

        return [
            'name' => [
                'required',
                'min:5',
                'max:15',
                Rule::unique('users')->ignore($id),
            ],
            'email' => [
                'required',
                'email',
                'min:5',
                'max:50',
                Rule::unique('users')->ignore($id),
            ],
            'password' => 'required|min:5|max:11',
            'configpassword' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ và tên bắt buộc phải nhập',
            'name.min' => 'họ và tên quá thiếu kí tự',
            'name.max' => 'Họ và tên quá kí tự',
            'name.unique' => 'Họ và tên đã có người sử dụng',
            'email.required' => 'Địa chỉ email buộc phải nhập',
            'email.email' => 'Không đúng định dạng email',
            'email.min' => 'Địa chỉ email quá thiếu kí tự',
            'email.max' => 'Địa chỉ email quá nhiều kí tự',
            'email.unique' => 'Địa chỉ email đã có người sử dụng',
            'password.required' => 'Mật khẩu buộc phải nhập',
            'password.min' => 'Mật khẩu quá thiếu kí tự',
            'password.max' => 'Mật khẩu quá nhiều kí tự',
            'configpassword.same' => 'Xác nhận mật khẩu chưa đúng',
        ];
    }
}
