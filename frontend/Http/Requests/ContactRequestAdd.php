<?php

namespace Frontend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequestAdd extends FormRequest
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
            'name_parent'  => 'required|max:30',
            'phone'        => 'required|between:9,11',
            'name_student' => 'required|max:30',
            'email'        => 'required|email|regex:/(.+)@(.+)\.(.+)/i|unique:contacts,email,' . $this->id,
            'contact'      => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            'name_parent.required'  => 'Họ tên không được để trống',
            'name_parent.max'       => 'Độ dài tối đa 30 ký tự',
            'phone.required'        => 'Số điện thoại không được để trống',
            'phone.regex'           => 'Số điện thoại không đúng định dạng',
            'phone.between'         => 'Số điện thoại 10 số hoặc 11 số',
            'name_student.required' => 'Họ tên không được để trống',
            'name_student.max'      => 'Độ dài tối đa 30 ký tự',
            'email.required'        => 'Email không được để trống',
            'email.email'           => 'Không đúng định email',
            'email.regex'           => 'Email không hợp lệ',
            'email.unique'          => 'Bạn đã gửi email rồi xin vui lòng chờ đợi',
            'contact.max'           => 'Nội dung không được quá 255 ký tự',
        ];
    }
}
