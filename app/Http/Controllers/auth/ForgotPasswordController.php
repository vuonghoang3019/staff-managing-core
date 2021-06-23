<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\FrontendController;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            return redirect()->back()->with('danger', 'email này không tồn tại');
        }
        $code_reset = bcrypt(md5(time() . $email));
        $checkStudent->code_reset = $code_reset;
        $checkStudent->code_time = Carbon::now();
        $checkStudent->save();
        $url = route('password.reset',['code' => $checkStudent->code_reset,'email' => $email]);
        $data = [
            'route' => $url
        ];
        Mail::send('email.resetPassword',$data, function($message) use ($email){
            $message->to($email, 'Reset Password')->subject('Lấy lại mật khẩu');
        });
        return redirect()->back()->with('success', 'Link lấy lại mật khẩu đã gửi vào email của bạn');
    }

    public function resetPassword(Request $request)
    {
        Auth::guard('student')->logout();
        $code = $request->code;
        $email = $request->email;
        $checkUser = Student::where([
            'code_reset' => $code,
            'email' => $email
        ])->first();
        if (!$checkUser)
        {
            return redirect('/')->with('danger','Xin lỗi! Đường dẫn lấy lại mật khẩu không đúng, bạn vui lòng thử lại sau');
        }

        return view('auth.password.reset');
    }

    public function saveResetPassword(ResetPasswordRequest $request)
    {
        if ($request->password)
        {
            $code = $request->code;
            $email = $request->email;
            $checkUser = Student::where([
                'code_reset' => $code,
                'email' => $email
            ])->first();
            if (!$checkUser)
            {
                return redirect('/')->with('error','Xin lỗi! Đường dẫn lấy lại mật khẩu không đúng, bạn vui lòng thử lại sau');
            }
            if (!Hash::check($request->password_old,$checkUser->password))
            {
                return redirect()->back()->with('error','Mật khẩu của bạn không trùng với mật khẩu bạn đăng ký! Vui lòng thử lại');
            }
            $checkUser->password =  Hash::make($request->password);
            $checkUser->save();
            return redirect()->route('login')->with('success','Mật khẩu đã được đổi thành công, mời bạn đăng nhập');

        }
    }
}
