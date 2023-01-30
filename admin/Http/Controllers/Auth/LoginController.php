<?php

namespace Admin\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Admin\Http\Requests\Login\CheckLoginRequest;

class LoginController extends Controller
{
    public function getLogin()
    {
        return Auth::check() ? redirect('admin') : view('admin::auth.login');
    }

    public function postLogin(CheckLoginRequest $request)
    {
        try {
            return \auth()->attempt($request->data())
                ? redirect()->route('dashboard')
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
