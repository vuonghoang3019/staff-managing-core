<?php

namespace Admin\Http\Requests\Grade;

use Admin\Repos\GradeRepo;
use Admin\General\Grade;

class EditRequest extends BaseRequest
{
    public function authorize()
    {
        return $this->validNotFound([
            'Class'  => app(GradeRepo::class),
            'Method' => 'baseFind',
            'Merge'  => Grade::NAME,
        ]);
    }

    public function rules(): array
    {
        return [];
    }
}
