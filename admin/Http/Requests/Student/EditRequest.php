<?php

namespace Admin\Http\Requests\Student;

use Admin\General\Student;
use Admin\Repos\StudentRepo;

class EditRequest extends BaseRequest
{
    public function authorize()
    {
        return $this->validNotFound([
            'Class' => app(StudentRepo::class),
            'Method' => 'BaseFind',
            'Merge' => Student::NAME
        ]);
    }

    public function rules(): array
    {
        return [];
    }
}
