<?php

namespace admin\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequestUpdate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required|max:50|min:10',
            'code'        => 'required',
            'password'    => 'required',
            'email'       => 'required|unique:user,email,' . $this->id,
            'image_path'  => 'max:10000|mimes:jpeg,png,jpg', //a required, max 10000kb, jpeg,png,jpg
            'description' => 'max:255'
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
