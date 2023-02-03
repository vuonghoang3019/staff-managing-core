<?php

namespace Admin\Http\Requests\About;

use Admin\General\About as AboutConfig;
use Admin\Models\About;
use Admin\Repos\AboutRepo;
use Illuminate\Validation\Rule;

class UpdateRequest extends BaseRequest
{

    public function authorize(): bool
    {
        return $this->validNotFound([
            'Class'  => app(AboutRepo::class),
            'Method' => 'baseFind',
            'Merge'  => AboutConfig::NAME,
        ]);
    }

    public function rules(): array
    {
        $rules = [
            'Title' => [
                'required',
                'max:256',
                Rule::unique(About::$Name, About::$_Title)->ignore($this->id, About::$_Id)
            ],
        ];

        return array_merge(parent::rules(), $rules);
    }
}
