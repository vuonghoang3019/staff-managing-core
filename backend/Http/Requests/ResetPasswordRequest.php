<?php

namespace Backend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password'         => 'required|min:6',
            'password_confirm' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required'         => 'Trường này không được để trống',
            'password.min'              => 'Mật khẩu không được ít hơn 6 ký tự',
            'password_confirm.required' => 'Trường này không được để trống',
            'password_confirm.same'     => 'Mật khẩu xác nhận không giống nhau',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
