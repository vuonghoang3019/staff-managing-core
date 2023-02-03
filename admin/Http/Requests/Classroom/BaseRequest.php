<?php

namespace Admin\Http\Requests\Classroom;

use Admin\Configs\Config;
use Admin\Http\Requests\BaseRequest as Request;
use Admin\Models\Classroom;
use Admin\Models\Course;
use Illuminate\Validation\Rule;
use Admin\Rules\Uuid;

class BaseRequest extends Request
{
    public function rules(): array
    {
        return [
            'DisplayName' => 'required|max:256',
            'Code'        => [
                'required',
                'regex:' . Config::CODE_REGEX,
                'max:64',
            ],
            'MaxStudent'  => 'required|integer|min:0|max:999',
            'MinStudent'  => 'required|integer|min:0|max:999',
            'CourseId'    => [
                'required',
                new Uuid(),
                Rule::exists(Course::$Name, Course::$_Id)
            ],
            'Status'      => [
                'nullable',
                Rule::in(array_keys(Config::STATUS)),
            ],
            'Publish'     => [
                'nullable',
                Rule::in(array_keys(Config::BIT)),
            ],
            'SortOrder'   => 'nullable|integer|min:0|max:999',
        ];
    }

    public function data()
    {
        return [
            Classroom::$DisplayName => $this->get('DisplayName'),
            Classroom::$Code        => $this->get('Code'),
            Classroom::$MaxStudent  => $this->get('MaxStudent'),
            Classroom::$MinStudent  => $this->get('MinStudent'),
            Classroom::$CourseId    => $this->get('CourseId'),
            Classroom::$SortOrder   => $this->get('SortOrder'),
            Classroom::$CreatedDate  => get_now(),
            Classroom::$ChangedDate  => get_now(),
//            Classroom::$ChangedBy    => get_account_id(),
//            Classroom::$CreatedBy    => get_account_id(),
        ];
    }
}
