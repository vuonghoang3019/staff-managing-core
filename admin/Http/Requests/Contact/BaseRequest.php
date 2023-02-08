<?php

namespace Admin\Http\Requests\Contact;

use Admin\Configs\Config;
use Admin\Http\Requests\BaseRequest as Request;
use Admin\Models\Contact;
use Admin\Repos\ContactRepo;
use Illuminate\Validation\Rule;

class BaseRequest extends Request
{
    public function authorize()
    {
        return $this->validNotFound([
            'Class' => app(ContactRepo::class),
            'Method' => 'BaseFind'
        ]);
    }

    public function rules(): array
    {
        return [
            'Status' => [
                'nullable',
                'Status'       => [
                    'nullable',
                    Rule::in(array_keys(Config::STATUS)),
                ],
            ]
        ];
    }

    public function data(): array
    {
        return [
            Contact::$Status => $this->get('Status')
        ];
    }
}
