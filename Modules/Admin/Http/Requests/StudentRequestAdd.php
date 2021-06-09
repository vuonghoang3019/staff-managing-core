<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequestAdd extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code'         => 'required|unique:students,code,' . $this->id,
            'name'         => 'required|max:50|min:10',
            'birthday'     => 'required|after_or_equal:today',
            'nation'       => 'required',
            'classroom_id' => 'required',
            'sex'          => 'required'
        ];
    }

    public function messages()
    {
        return [
            'code.required'           => 'Mã học sinh không được để trống',
            'code.unique'             => 'Mã học sinh không được để trùng',
            'name.required'           => 'Tên không được để trống',
            'name.max'                => 'Tên không được quá 50 ký tự',
            'name.min'                => 'Tên phải trên 10 ký tự',
            'birthday.required'       => 'Ngày sinh không được để trống',
            'birthday.after_or_equal' => 'Ngày sinh phải lớn hơn ngày hiện tại',
            'nation.required'         => 'Dân tộc không được để trống',
            'classroom_id.required'   => 'Lớp không được để trống',
            'sex.required'            => 'giới tính không được để trống'
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
