<?php

namespace Frontend\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Carbon\Carbon;
use Frontend\Http\Requests\RegisterRequestAdd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller {
    private $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function getRegister()
    {
        return view('frontend::auth.register');
    }

    public function postRegister(RegisterRequestAdd $request)
    {
        $this->student->name = $request->name;
        $this->student->email = $request->email;
        $this->student->password = Hash::make($request->password);
        $this->student->phone = $request->phone;
        $this->student->sex = $request->sex;
        $this->student->status = 2;
        $this->student->save();
        if ($this->student->id)
        {
            $code = bcrypt(md5(time() . $this->student->email));
            $url = route('verify.account', ['id' => $this->student->id, 'code' => $code]);
            $this->student->code_active = $code;
            $this->student->time_active = Carbon::now();
            $this->student->save();
            $data = [
                'route' => $url
            ];
            $email = $this->student->email;
            Mail::send('email.verifyAccount', $data, function ($message) use ($email) {
                $message->to($email, 'Active Account')->subject('Kích hoạt email');
            });
            return redirect()->route('login');
        }
        return redirect()->back();
    }

    //Xác nhận tài khoản
    public function verifyAccount(Request $request)
    {
        $code = $request->code;
        $id = $request->id;
        $checkUser = Student::where([
            'code_active' => $code,
            'id' => $id
        ])->first();
        if (!$checkUser)
        {
            return redirect('/')->with('danger','Xin lỗi! Đường dẫn xác nhận tài khoản không đúng, bạn vui lòng thử lại sau');
        }
        $checkUser->status = 1;
        $checkUser->save();
        return redirect()->route('login')->with('success','Xác nhận tài khoản thành công');

    }
}
