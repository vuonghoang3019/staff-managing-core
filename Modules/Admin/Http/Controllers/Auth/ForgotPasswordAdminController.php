<?php

namespace Modules\Admin\Http\Controllers\auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Modules\Admin\Http\Requests\ResetPasswordRequest;

class ForgotPasswordAdminController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getFormResetPassword()
    {
        return view('admin::auth.password.getEmailReset');
    }

    public function getCodeResetPassword(Request $request)
    {
        $email = $request->email;
        $checkUser = $this->user->where('email', $email)->first();
        if (!$checkUser) {
            return redirect()->back()->with('success', 'Email này không tồn tại');
        }
        $codeReset =  bcrypt(md5(time() . $email));
        $checkUser->code_reset = $codeReset;
        $checkUser->time_reset = Carbon::now();
        $checkUser->save();
        $url = route('password.reset.admin',['code_reset' => $checkUser->code_reset,'email' => $email]);
        $data = [
            'url' => $url,
        ];
        Mail::send('admin::auth.email.resetPassword',$data, function ($message) use ($email){
            $message->to($email, 'Reset Password')->subject('Lấy lại mật khẩu');
        });
        return redirect()->back()->with('success', 'Link lấy lại mật khẩu đã gửi vào email của bạn');
    }

    public function getResetPassword(Request $request)
    {
        $email = $request->email;
        $code = $request->code_reset;
        $checkUser = $this->user->where([
            'code_reset' => $code,
            'email' => $email
        ])->first();
        if (!$checkUser) {
            return redirect('/')->with('danger','Xin lỗi! Đường dẫn lấy lại mật khẩu không đúng, bạn vui lòng thử lại sau');
        }
        return view('admin::auth.password.resetPassword');
    }

    public function saveResetPassword(ResetPasswordRequest $request)
    {
        if ($request->password)
        {
            $email = $request->email;
            $code = $request->code;
            $checkUser = $this->user->where([
                'code_reset' => $code,
                'email' => $email
            ])->first();
            if (!$checkUser) {
                return redirect('/')->with('danger','Xin lỗi! Đường dẫn lấy lại mật khẩu không đúng, bạn vui lòng thử lại sau');
            }
            if (!Hash::check($request->password_old,$checkUser->password))
            {
                return redirect()->back()->with('error','Mật khẩu của bạn không trùng với mật khẩu bạn đăng ký! Vui lòng thử lại');
            }
            $checkUser->password =  Hash::make($request->password);
            $checkUser->save();
            return redirect()->route('getLogin')->with('success','Mật khẩu đã được đổi thành công, mời bạn đăng nhập');

        }
    }
}
