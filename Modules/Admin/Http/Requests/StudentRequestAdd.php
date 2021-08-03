<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequestAdd extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code'         => 'required|unique:students,code,' . $this->id,
            'name'         => 'required|max:50|min:5',
            'birthday'     => 'required',
            'nation'       => 'required',
            'classroom_id' => 'required',
            'sex'          => 'required',
            'phone'        => 'required|size:10',
            'email'        => 'required|unique:student,email,' . $this->id,
            'password'     => 'required',
            'image_path'   => 'required|max:10000|mimes:jpeg,png,jpg', //a required, max 10000kb, jpeg,png,jpg
        ];
    }

    public function messages()
    {
        return [
            'code.required'         => 'Mã học sinh không được để trống',
            'code.unique'           => 'Mã học sinh không được để trùng',
            'name.required'         => 'Tên không được để trống',
            'name.max'              => 'Tên không được quá 50 ký tự',
            'name.min'              => 'Tên phải trên 5 ký tự',
            'birthday.required'     => 'Ngày sinh không được để trống',
            'nation.required'       => 'Dân tộc không được để trống',
            'classroom_id.required' => 'Lớp không được để trống',
            'phone.required'        => 'Số điện thoại không được để trống',
            'phone.size'            => 'Số điện thoại chỉ được 10 số',
            'sex.required'          => 'giới tính không được để trống',
            'email.required'        => 'Email học sinh không được để trống',
            'email.unique'          => 'Email học sinh không được để trùng',
            'password.required'     => 'Pass không được để trống',
            'image_path.required'   => 'Ảnh không được để trống',
            'image_path.max'        => 'Kích thước ảnh vượt quá mức',
            'image_path.mimes'      => 'Chỉ chấp nhận ảnh: jpeg,png,jpg'
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
