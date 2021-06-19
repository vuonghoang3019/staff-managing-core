<?php

namespace App\Http\Requests\update;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestUpdate extends FormRequest {
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
            'name'     => 'required',
            'email'    => 'unique:students,email,' . $this->id,
            'phone'    => 'numeric|size:10',
            'birthday' => 'date_format:Y-m-d|before:today',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|',
            'image_path'   => 'max:10000|mimes:jpeg,png,jpg',
        ];
    }
}
