<?php

namespace Modules\Admin\Http\Requests\update;

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
            'title' => 'required|max:100|unique:recruitments,title,'.$this->id,
            'Content' => 'required|max:1000,min:20',
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
