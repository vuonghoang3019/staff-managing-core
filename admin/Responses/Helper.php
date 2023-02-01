<?php

namespace Admin\Responses;

use Illuminate\Http\JsonResponse;
use stdClass;

trait Helper
{
    /**
     * get output for response data
     * @param array $data
     * @return stdClass
     */
    private function arrayToObject(array $data = []): stdClass
    {
        $response = new stdClass();
        foreach ($data as $key => $value) {
            $response->{$key} = $value;
        }
        return $response;
    }

    /**
     * return current server time with default format
     * @return string
     */
    private function getServerTime(): string
    {
        return now()->format('Y-m-d H:i:s');
    }

    /**
     * @param array $response
     * @return JsonResponse
     */
    private function response(array $response = []): JsonResponse
    {
        return response()->json($response, Config::CODE_SUCCESS, Config::SETTING, JSON_UNESCAPED_UNICODE);
    }
}
