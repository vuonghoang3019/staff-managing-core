<?php

namespace Admin\Http\Requests\Student;

use Admin\Configs\Config;
use Admin\Http\Requests\BaseRequest as Request;
use Admin\Models\Student;
use Admin\Rules\Uuid;
use Illuminate\Validation\Rule;

class BaseRequest extends Request
{
    public function rules(): array
    {
        return [
            'Code'            => [
                'required',
                'regex:' . Config::CODE_REGEX,
                'max:32',
                Rule::unique(Student::$Name)->whereNot(Student::$_Deleted, Config::TRUE),
            ],
            'DisplayName' => 'required|max:50|min:5',
            'Email'   => [
                'required',
                'email',
                'max:256',
                Rule::unique(Student::$Name, Student::$_Email)->whereNot(Student::$_Deleted, Config::TRUE),
            ],
            'Birthday'    => 'required',
            'Gender'         => [
                'required',
                Rule::in(array_keys(Config::GENDER)),
            ],
            'ClassroomId' => [
                'required',
                new Uuid(),
            ],
            'Status'       => [
                'nullable',
                Rule::in(array_keys(Config::STATUS)),
                Rule::exists(Student::$Name, Student::$_Id)->whereNot(Student::$_Deleted, Config::TRUE),
            ],
            'ImagePath'   => 'nullable|max:10000|mimes:jpeg,png,jpg',

        ];
    }

    public function data(): array
    {
        return [
            Student::$Code        => $this->get('Code'),
            Student::$DisplayName => $this->get('DisplayName'),
            Student::$Email       => $this->get('Email'),
            Student::$Password    => $this->get('Password'),
            Student::$Birthday    => $this->get('Birthday'),
            Student::$Gender      => $this->get('Gender'),
            Student::$ClassroomId => $this->get('ClassroomId'),
            Student::$Status      => $this->get('Status'),
            Student::$ImagePath   => $this->get('ImagePath'),
            Student::$CodeReset   => $this->get('CodeReset'),
            Student::$CodeTime    => $this->get('CodeTime'),
            Student::$CodeActive  => $this->get('CodeActive'),
            Student::$TimeActive  => $this->get('TimeActive'),
            Student::$Value1      => $this->get('Value1'),
            Student::$Value2      => $this->get('Value2'),
            Student::$Value3      => $this->get('Value3'),
            Student::$Value4      => $this->get('Value4'),
            Student::$Value5      => $this->get('Value5'),
            Student::$CreatedDate => get_now(),
            Student::$ChangedDate => get_now(),
            //            Student::$ChangedBy    => get_account_id(),
            //            Student::$CreatedBy    => get_account_id(),
        ];
    }
}
