<?php

namespace Admin\Responses\Contracts;

use Illuminate\Http\JsonResponse;

interface ResponseContract
{
    /**
     * response get request success
     * @param array $data
     * @param string $message
     * @return JsonResponse
     */
    public function success(array $data, string $message = ""): JsonResponse;

    /**
     * response not found error
     * @param string $message
     * @return JsonResponse
     */
    public function notFound(string $message = ''): JsonResponse;

    /**
     * response unauthorized error
     * @param string $message
     * @return JsonResponse
     */
    public function unauthorized(string $message = ""): JsonResponse;

    /**
     * return no role error
     * @param string $message
     * @return JsonResponse
     */
    public function noRoles(string $message = ''): JsonResponse;

    /**
     * response server error
     * @param string $message
     * @return JsonResponse
     */
    public function serverError(string $message = ''): JsonResponse;

    /**
     * error token
     * @param string $message
     * @return JsonResponse
     */
    public function tokenError(string $message = ''): JsonResponse;

    /**
     * error when validate fail
     * @param array $errors
     * @return JsonResponse
     */
    public function validateRequestErrors(array $errors): JsonResponse;

    /**
     * error when validate fail with one message
     * @param array $errors
     * @param string $message
     * @return JsonResponse
     */
    public function validateRequestErrorsMessage(array $errors, string $message = ''): JsonResponse;

    /**
     * error bad request
     * @param string $message
     * @return JsonResponse
     */
    public function badRequest(string $message = ''): JsonResponse;

    /**
     * error
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function error(string $message, int $code): JsonResponse;

    /**
     * force logout
     * @param string $message
     * @return JsonResponse
     */
    public function forceLogout(string $message): JsonResponse;
}
