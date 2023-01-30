<?php

namespace admin\Http\Requests\About;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequestAdd extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'      => 'required|max:100|min:5|unique:about,title,' . $this->id,
            'image_path' => 'max:10000|mimes:jpeg,png,jpg',
            'Content'    => 'required|max:1000|min:5',
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
