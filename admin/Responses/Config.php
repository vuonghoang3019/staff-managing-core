<?php

namespace Admin\Responses;

class Config
{
    const CAPTION_CODE = 'Code';
    const CAPTION_SERVER_TIME = 'ServerTime';
    const CAPTION_MESSAGE = 'Message';
    const CAPTION_DATA = 'Data';
    const CAPTION_ERRORS = 'Errors';

    const CODE_SUCCESS = 200;
    const CODE_BAD_REQUEST = 400;
    const CODE_UNAUTHORIZED = 401;
    const CODE_FORBIDDEN = 403;
    const CODE_NOT_FOUND = 404;
    const CODE_FORCE_LOGOUT = 406;
    const CODE_VALIDATE_CODE = 422;
    const CODE_VALIDATE_CODE_MESSAGE = 423;
    const CODE_SERVER_ERROR = 500;

    const SETTING = [
        'CONTENT_TYPE' => [
            'Content-type' => 'application/json; charset=utf-8'
        ]
    ];
}
