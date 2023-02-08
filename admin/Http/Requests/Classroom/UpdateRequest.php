<?php

namespace Admin\Http\Requests\Classroom;

use Admin\Configs\Config;
use Admin\Models\Classroom;
use Admin\Models\Course;
use Admin\Repos\ClassroomRepo;
use Illuminate\Validation\Rule;
use Admin\Rules\Uuid;

class UpdateRequest extends BaseRequest
{
    public function authorize()
    {
        return $this->validNotFound([
            'Class'  => app(ClassroomRepo::class),
            'Method' => 'BaseFind',
        ]);
    }

    public function rules(): array
    {
        $rules = [
            'Code' => [
                'required',
                'regex:' . Config::CODE_REGEX,
                'max:64',
                Rule::unique(Classroom::$Name, Classroom::$Code)
            ],
        ];

        return array_merge(parent::rules(), $rules);
    }
}
