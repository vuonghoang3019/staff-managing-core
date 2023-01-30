<?php

namespace admin\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequestAdd extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'       => [
                'required',
                'min:5',
                'unique:course,name,' . $this->id,

            ],
            'image_path' => [
                'required',
                'max:10000',
                'mimes:jpeg,png,jpg'
            ]
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
