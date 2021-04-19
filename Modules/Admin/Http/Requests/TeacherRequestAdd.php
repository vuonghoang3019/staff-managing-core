<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequestAdd extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required',
            'password' => 'required',
            'email' => 'required|unique:teachers,email,'.$this->id,
            'image_path' => 'required|max:10000|mimes:jpeg,png,jpg' //a required, max 10000kb, jpeg,png,jpg
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
