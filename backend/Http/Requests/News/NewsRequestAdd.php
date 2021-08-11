<?php

namespace Backend\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequestAdd extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'      => 'required|max:255|unique:news,title,'.$this->id,
            'Content'    => 'required|min:20',
            'image_path' => 'required|max:10000|mimes:jpeg,png,jpg', //a required, max 10000kb, jpeg,png,jpg

        ];
    }

    public function messages()
    {
        return [
            'title.required'      => 'Tiêu đề không được để trống',
            'title.max'           => 'Độ dài tối đa 255 ký tự',
            'unique.unique'       => 'Tiêu đề không được trùng',
            'unique.min'          => 'Độ dài không được ít hơn 20 ký tự',
            'Content.required'    => 'Nội dung không được để trống',
            'image_path.required' => 'Ảnh không được để trống',
            'image_path.max'      => 'Dung lượng đã vượt quá tối đa',
            'image_path.mimes'    => 'Chỉ chấp nhận ảnh: jpeg,png,jpg',
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
