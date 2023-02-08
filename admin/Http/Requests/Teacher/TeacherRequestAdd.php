<?php

namespace admin\Http\Requests\Teacher;

use Admin\Http\Requests\BaseRequest as Request;

class TeacherRequestAdd extends Request
{
    public function rules(): array
    {
        return [
            'name'         => 'required|max:50|min:10',
            'code'        => 'required',
            'password'    => 'required',
            'email'       => 'required|unique:user,email,' . $this->id,
            'image_path'  => 'required|max:10000|mimes:jpeg,png,jpg', //a required, max 10000kb, jpeg,png,jpg
            'description' => 'max:255'
        ];
    }
}
