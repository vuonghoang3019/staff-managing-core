<?php

namespace Backend\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\CheckLoginRequest;

class LoginController extends BaseController
{
    public function getLogin()
    {
        return Auth::check() ? redirect('admin') : view('backend.auth.login');
    }

    public function postLogin(CheckLoginRequest $request)
    {
        try {
            return \auth()->attempt($request->data())
                ? redirect('admin')
                : redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu');
        }
        catch (\Exception $e) {
            return abort(500);
        }
    }

    public function logout()
    {
        Auth::logout();

        return view('admin::auth.login');
    }
}
