<?php

namespace Frontend\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function getLogin()
    {
        if (Auth::guard('student')->check())
        {
            Auth::guard('student')->logout();
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error','Sai tài khoản hoặc mật khẩu');
        }
    }

    public function logoutUser()
    {
        Auth::guard('student')->logout();
        return redirect()->route('home');
    }
}
