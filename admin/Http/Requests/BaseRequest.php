<?php

namespace Admin\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Admin\Responses\Response;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected array $ignoreAuth = [];

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $response = app(Response::class);
        throw new HttpResponseException($response->validateRequestErrors($errors));
    }

    protected function failedAuthorization()
    {
        $response = app(Response::class);
        throw new HttpResponseException($response->notFound());
    }
}
