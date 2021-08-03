<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequestAdd extends FormRequest {
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
            'name'     => 'required|max:50|min:10',
            'email'    => 'required|unique:student,email,' . $this->id,
            'password' => 'required',
            'phone'    => 'required|size:10',
            'sex'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Tên không được để trống',
            'name.max'          => 'Tên không được quá 50 ký tự',
            'name.min'          => 'Tên phải trên 10 ký tự',
            'sex.required'      => 'Giới tính không được để trống',
            'email.required'    => 'Email  không được để trống',
            'email.unique'      => 'Email đã được sử dụng, vui lòng chọn email khác',
            'password.required' => 'Pass không được để trống',
            'phone.required'    => 'Số điện thoại không được để trống',
            'phone.size'        => 'Số điện thoại chỉ có 10 số'
        ];
    }
}
