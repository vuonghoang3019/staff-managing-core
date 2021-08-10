<?php

namespace Backend\Http\Requests\Recruitment;

use Illuminate\Foundation\Http\FormRequest;

class RecruitmentRequestUpdate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100|unique:recruitment,title,'.$this->id,
            'Content' => 'required|min:20',
            'image_path'  => 'max:10000|mimes:jpeg,png,jpg', //a required, max 10000kb, jpeg,png,jpg
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
