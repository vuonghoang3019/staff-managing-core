<?php

namespace Admin\Http\Requests\Grade;

use Admin\Configs\Config;
use Admin\Http\Requests\BaseRequest as Request;
use Admin\Models\Grade;
use Illuminate\Validation\Rule;

class BaseRequest extends Request
{
    public function rules(): array
    {
        return [
            'DisplayName' => [
                'required',
                'max:256',
                'min:5'
            ],
            'Remark'      => 'nullable|max:512',
            'Status'      => [
                'required',
                Rule::in(array_keys(Config::STATUS)),
            ],
        ];
    }


    public function data()
    {
        return [
            Grade::$DisplayName => $this->get('DisplayName'),
            Grade::$Remark      => $this->get('Remark'),
            Grade::$Status      => $this->get('Status'),
        ];
    }
}
