<?php

namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Requests\CheckLoginRequest;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check())
        {
            //login success
            return redirect('admin');
        }
        else
        {
            return view('admin::auth.login');
        }
    }

    public function postLogin(CheckLoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (\auth()->attempt($login))
        {
            return redirect('admin');
        }
        else
        {
            return redirect()->back()->with('error','Sai pass');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
