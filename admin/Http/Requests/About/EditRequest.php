<?php

namespace Admin\Http\Requests\About;

use Admin\General\About;
use Admin\Repos\AboutRepo;

class EditRequest extends BaseRequest
{

    public function authorize(): bool
    {
        return $this->validNotFound([
            'Class'  => app(AboutRepo::class),
            'Method' => 'baseFind',
            'Merge'  => About::NAME,
        ]);
    }

    public function rules(): array
    {
        return [];
    }
}
