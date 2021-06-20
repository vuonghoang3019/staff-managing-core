<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends FrontendController {
    public function __construct()
    {
        parent::__construct();
    }

    public function getFormResetPassword()
    {
        return view('auth.password.email');
    }

    public function sendCodeResetPassword(Request $request)
    {
        $email = $request->email;
        $checkStudent = Student::where('email', $email)->first();
        if (!$checkStudent) {
            return redirect()->back()->with('danger', 'email khong ton tai');
        }
        $code_reset = bcrypt(md5(time() . $email));

        $checkStudent->code_reset = $code_reset;
        $checkStudent->code_time = Carbon::now();
        $checkStudent->save();
        Mail::send('email.resetPassword',  $checkStudent->toArray(), function($message) use ($email){
            $message->to($email, 'Reset Password')->subject('Lấy lại mật khẩu');
        });
        return redirect()->back()->with('success', 'Link lấy lại mật khẩu đã gửi vào email của bạn');
    }

    public function resetPassword()
    {
        return view('auth.password.reset');
    }
}
