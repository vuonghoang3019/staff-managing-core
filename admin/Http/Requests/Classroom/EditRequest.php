<?php

namespace Admin\Http\Requests\Classroom;

use Admin\Repos\ClassroomRepo;

class EditRequest extends BaseRequest
{
    public function authorize()
    {
        return $this->validNotFound([
            'Class' => app(ClassroomRepo::class),
            'Method' => 'BaseFind',
        ]);
    }
}
