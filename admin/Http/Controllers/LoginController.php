<?php

namespace Admin\Http\Controllers;

use Admin\Http\Requests\login\LoginRequest;
use Admin\Models\User;
use Admin\Services\LoginService;

class LoginController extends BaseController
{
    private LoginService $service;

    public function __construct(LoginService $service)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->service = $service;
    }

    public function login(LoginRequest $request)
    {
        return $this->service->login($request);
    }
}
