<?php

namespace Admin\Http\Requests\Course;

use Admin\Http\Requests\BaseRequest as Request;
use Admin\Models\Course;
use Illuminate\Validation\Rule;
use Admin\Configs\Config;

class BaseRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'DisplayName' => [
                'required',
                'min:5',
                'unique:tbCourse,name,' . $this->id,
            ],
            'ImagePath'   => [
                'nullable',
                'max:10000',
                'mimes:jpeg,png,jpg'
            ],
            'Remark'      => 'nullable|max:512',
            'Status'      => [
                'required',
                Rule::in(array_keys(Config::STATUS)),
            ],
            'SortOrder'   => 'nullable|integer|min:0|max:999',
        ];
    }

    public function data()
    {
        return [
            Course::$DisplayName => $this->get('DisplayName'),
            Course::$ImagePath   => $this->get('ImagePath'),
            Course::$Remark      => $this->get('Remark'),
            Course::$Status      => $this->get('Status'),
            Course::$SortOrder   => $this->get('SortOrder'),
            Course::$CreatedDate => get_now(),
            Course::$ChangedDate => get_now(),
            //            Course::$ChangedBy    => Auth::user()->Id,
            //            Course::$CreatedBy    => Auth::user()->Id,
        ];
    }
}
