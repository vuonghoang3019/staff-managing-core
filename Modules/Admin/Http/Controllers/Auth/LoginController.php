<?php

namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\CheckLoginRequest;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin::auth.login');
    }

    public function postLogin(CheckLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            dd($request->all());
        } else {

            dd($request->all());
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
//    public function authenticate(Request $request)
//    {
//        $credentials = $request->only('email', 'password');
//
//        if (Auth::attempt($credentials)) {
//
//            return redirect()->intended('dashboard');
//        }
//    }

}
