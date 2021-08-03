<?php

namespace Backend\Http\Requests\Login;

use App\Models\User;
use Backend\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'email'    => [
                'required',
                'email',
                Rule::exists(User::$name),
            ],
            'password' => 'required',
        ];
    }

    public function data()
    {
        return $this->only('email', 'password');
    }
}
