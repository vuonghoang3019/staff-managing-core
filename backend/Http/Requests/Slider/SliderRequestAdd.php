<?php

namespace Backend\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequestAdd extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'image_path' => 'required|max:10000|mimes:jpeg,png,jpg',
            'description'    => 'required',
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
