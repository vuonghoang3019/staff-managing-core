<?php

namespace Admin\Http\Requests\Student;

use Admin\Configs\Config;
use Admin\General\Student as StudentConfig;
use Admin\Models\Student;
use Admin\Repos\StudentRepo;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function authorize()
    {
        return $this->validNotFound([
            'Class'  => app(StudentRepo::class),
            'Method' => 'BaseFind',
            'Merge'  => StudentConfig::NAME
        ]);
    }

    public function rules(): array
    {
        $rules = [
            'Code' => [
                'required',
                'regex:' . Config::CODE_REGEX,
                'max:64',
                Rule::unique(Student::$Name, Student::$Code)->ignore($this->id, Student::$_Id),
            ],
            'Email'   => [
                'required',
                'email',
                'max:256',
                Rule::unique(Student::$Name, Student::$_Email)->whereNot(Student::$_Deleted, Config::TRUE)->ignore($this->id, Student::$_Id),
            ],
        ];

        return array_merge(parent::rules(), $rules);
    }
}
