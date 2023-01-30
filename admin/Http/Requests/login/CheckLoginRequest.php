<?php

namespace admin\Http\Requests\login;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckLoginRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => [
                'required',
                'email',
                Rule::exists(User::$name),
            ],
            'password' => 'required'
        ];
    }

    public function data()
    {
        return $this->only('email', 'password');
    }
}
