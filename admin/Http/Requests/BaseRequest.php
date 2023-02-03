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

    protected function validNotFound($funcArgs = [])
    {
        try {
            $class = $funcArgs['Class'];
            $method = $funcArgs['Method'];
            $merge = $funcArgs['Merge'];
            $id = $funcArgs['Id'] ?? $this->id;
            $args = $funcArgs['Args'] ?? [];

            $arguments = [];
            $arguments[] = is_null($id) ? $this->id : $id;

            foreach ($args as $arg) {
                $arguments[] = $arg;
            }

            $response = call_user_func_array([$class, $method], $arguments);

            if (!$response) return false;

            if (!isset($this->ignoreAuth)) {
                request()->merge([$merge => $response]);

                return $response;
            }

            foreach ($this->ignoreAuth as $ign) {
                if (isset($response[$ign])) unset($response[$ign]);
            }

            request()->merge([$merge => $response]);

            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }
}
