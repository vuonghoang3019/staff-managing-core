<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequestAdd;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequestAdd $request)
    {
        $this->student->name = $request->name;
        $this->student->email = $request->email;
        $this->student->password = Hash::make($request->password);
        $this->student->phone = $request->phone;
        $this->student->sex = $request->sex;
        $this->student->save();
        if ($this->student->id) {
            return redirect()->route('login');
        }
        return redirect()->back();
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }

    public function logoutUser()
    {
        Auth::guard('student')->logout();
        return redirect()->route('home');
    }
}
