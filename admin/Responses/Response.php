<?php

namespace Admin\Responses;

use Illuminate\Http\JsonResponse;
use Admin\Responses\Contracts\ResponseContract;

class Response implements ResponseContract
{
    use Helper;

    /**
     * response get request success
     * @param array $data
     * @param string $message
     * @return JsonResponse
     */
    public function success(array $data, string $message = ""): JsonResponse
    {
        return $this->response([
            Config::CAPTION_CODE => Config::CODE_SUCCESS,
            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
            Config::CAPTION_MESSAGE => empty($message) ? __('Response.Successful') : $message,
            Config::CAPTION_DATA => $this->arrayToObject($data)
        ]);
    }

    /**
     * error when validate fail
     * @param array $errors
     * @return JsonResponse
     */
    public function validateRequestErrors(array $errors): JsonResponse
    {
        return $this->response([
            Config::CAPTION_CODE => Config::CODE_VALIDATE_CODE,
            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
            Config::CAPTION_ERRORS => $errors
        ]);
    }

    public function notFound(string $message = ''): JsonResponse
    {
        return $this->response([
            Config::CAPTION_CODE => Config::CODE_NOT_FOUND,
            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
            Config::CAPTION_ERRORS => empty($message) ? __("Response.Not Found") : $message
        ]);
    }

    public function unauthorized(string $message = ""): JsonResponse
    {
        return $this->response([
            Config::CAPTION_CODE => Config::CODE_UNAUTHORIZED,
            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
            Config::CAPTION_ERRORS => empty($message) ? __("Response.Unauthorized") : $message
        ]);
    }

    public function noRoles(string $message = ''): JsonResponse
    {
        return $this->response([
            Config::CAPTION_CODE => Config::CODE_FORBIDDEN,
            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
            Config::CAPTION_ERRORS => empty($message) ? __("Response.No Roles") : $message
        ]);
    }

    public function serverError(string $message = ''): JsonResponse
    {
        return $this->response([
            Config::CAPTION_CODE => Config::CODE_SERVER_ERROR,
            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
            Config::CAPTION_ERRORS => empty($message) ? __("Response.Operation Failed") : $message
        ]);
    }

    public function tokenError(string $message = ''): JsonResponse
    {
        // TODO: Implement tokenError() method.
    }

    public function validateRequestErrorsMessage(array $errors, string $message = ''): JsonResponse
    {
        // TODO: Implement validateRequestErrorsMessage() method.
    }

    public function badRequest(string $message = ''): JsonResponse
    {
        // TODO: Implement badRequest() method.
    }

    public function error(string $message, int $code): JsonResponse
    {
        // TODO: Implement error() method.
    }

    public function forceLogout(string $message): JsonResponse
    {
        // TODO: Implement forceLogout() method.
    }

    //    /**
    //     * response not found error
    //     * @param string $message
    //     * @return JsonResponse
    //     */
    //    public function notFound(string $message = '',): JsonResponse
    //    {
    //        return $this->response([
    //            Config::CAPTION_CODE        => Config::CODE_NOT_FOUND,
    //            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
    //            Config::CAPTION_ERRORS      => empty($message) ? __("Response.Not Found") : $message
    //        ]);
    //  }
    //
    //    /**
    //     * response unauthorized error
    //     * @param string $message
    //     * @return JsonResponse
    //     */
    //    public function unauthorized(string $message = ""): JsonResponse
    //    {
    //        return $this->response([
    //            Config::CAPTION_CODE        => Config::CODE_UNAUTHORIZED,
    //            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
    //            Config::CAPTION_ERRORS      => empty($message) ? __("Response.Unauthorized") : $message
    //        ]);
    //    }
    //
    //    /**
    //     * return no role error
    //     * @param string $message
    //     * @return JsonResponse
    //     */
    //    public function noRoles(string $message = ''): JsonResponse
    //    {
    //        return $this->response([
    //            Config::CAPTION_CODE        => Config::CODE_FORBIDDEN,
    //            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
    //            Config::CAPTION_ERRORS      => empty($message) ? __("Response.No Roles") : $message
    //        ]);
    //    }
    //
    //    /**
    //     * response server error
    //     * @param string $message
    //     * @return JsonResponse
    //     */
    //    public function serverError(string $message = ''): JsonResponse
    //    {
    //        return $this->response([
    //            Config::CAPTION_CODE        => Config::CODE_SERVER_ERROR,
    //            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
    //            Config::CAPTION_ERRORS      => empty($message) ? __("Response.Operation Failed") : $message
    //        ]);
    //    }
    //
    //    /**
    //     * error token
    //     * @param string $message
    //     * @return JsonResponse
    //     */
    //    public function tokenError(string $message = ''): JsonResponse
    //    {
    //        return $this->response([
    //            Config::CAPTION_CODE        => Config::CODE_FORCE_LOGOUT,
    //            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
    //            Config::CAPTION_ERRORS      => empty($message) ? __("Response.Token Required") : $message
    //        ]);
    //    }
    //
    //
    //    /**
    //     * @param array $errors
    //     * @param string $message
    //     * @return JsonResponse
    //     */
    //    public function validateRequestErrorsMessage(array $errors, string $message = ''): JsonResponse
    //    {
    //        return $this->response([
    //            Config::CAPTION_CODE        => Config::CODE_VALIDATE_CODE_MESSAGE,
    //            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
    //            Config::CAPTION_ERRORS      => $errors,
    //            Config::CAPTION_MESSAGE     => empty($message) ? __("Response.Data is invalid") : $message
    //        ]);
    //    }
    //
    //    /**
    //     * error bad request
    //     * @param string $message
    //     * @return JsonResponse
    //     */
    //    public function badRequest(string $message = ''): JsonResponse
    //    {
    //        return $this->response([
    //            Config::CAPTION_CODE        => Config::CODE_BAD_REQUEST,
    //            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
    //            Config::CAPTION_ERRORS      => empty($message) ? __("Response.Bad Request") : $message
    //        ]);
    //    }
    //
    //    /**
    //     * error
    //     * @param string $message
    //     * @param int $code
    //     * @return JsonResponse
    //     */
    //    public function error(string $message, int $code): JsonResponse
    //    {
    //        return $this->response([
    //            Config::CAPTION_CODE        => $code,
    //            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
    //            Config::CAPTION_ERRORS      => $message
    //        ]);
    //    }
    //
    //    /**
    //     * @param string $message
    //     * @return JsonResponse
    //     */
    //    public function forceLogout(string $message = ''): JsonResponse
    //    {
    //        return $this->response([
    //            Config::CAPTION_CODE        => Config::CODE_FORCE_LOGOUT,
    //            Config::CAPTION_SERVER_TIME => $this->getServerTime(),
    //            Config::CAPTION_ERRORS      => empty($message) ? __("Response.Force Logout") : $message
    //        ]);
    //    }

}
