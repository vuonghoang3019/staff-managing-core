<?php

namespace Admin\Http\Requests\Login;

use Admin\Configs\Auth;
use Admin\Http\Requests\BaseRequest;
use Admin\Models\Login;
use Carbon\Carbon;
use Admin\Configs\Config;

class LoginRequest extends BaseRequest
{
    public function rules() : array
    {
        return [
            'Username' => 'required',
            'Password' => 'required'
        ];
    }

    public function data(string $id, string $token): array
    {
        return [
            Login::$UserId    => $id,
            Login::$Token     => $token,
            Login::$ValidTo   => Carbon::now()->addMinutes(Auth::TOKEN_ALIVE)->format(Config::DATETIME_FULL),
            Login::$IP        => $this->ip(),
            Login::$Agent     => $this->userAgent(),
        ];
    }
}
