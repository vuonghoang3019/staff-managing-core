<?php

namespace Admin\Http\Requests\Grade;

use Admin\Models\Grade;
use Admin\Repos\GradeRepo;
use Admin\General\Grade as GradeConfig;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{
    public function authorize()
    {
        return $this->validNotFound([
            'Class'  => app(GradeRepo::class),
            'Method' => 'baseFind',
            'Merge'  => GradeConfig::NAME,
        ]);
    }

    public function rules(): array
    {
        $rules = [
            'DisplayName' => [
                'required',
                'max:256',
                'min:5',
                Rule::unique(Grade::$Name, Grade::$_DisplayName)->ignore($this->id, Grade::$_Id)
            ],
        ];

        return array_merge(parent::rules(), $rules);
    }
}
