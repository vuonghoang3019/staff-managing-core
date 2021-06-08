<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequestAdd extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course_id' => 'required|unique:prices,course_id,'. $this->id
        ];
    }

    public function messages()
    {
        return [
            'course_id.required' => 'Khóa học không được để trống',
            'course_id.unique'   => 'Khóa học đã có giá rồi',
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
