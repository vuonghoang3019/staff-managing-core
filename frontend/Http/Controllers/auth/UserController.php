<?php

namespace Frontend\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\update\UserRequestUpdate;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Traits\StorageImageTrait;

class UserController extends FrontendController {
    private $student;
    private $course;
    private $payment;
    use StorageImageTrait;

    public function __construct(Student $student, Course $course, Payment $payment)
    {
        parent::__construct();
        $this->student = $student;
        $this->course = $course;
        $this->payment = $payment;
    }

    public function index($id)
    {
        $studentDetail = $this->student->findOrFail($id);
        $studentClassroom = $studentDetail->classroom;
        $courses = $this->course->newQuery()->with('classroom')->get();
        $paymentDetail = $this->payment->newQuery()->with(['course', 'user' => function ($query) {
            $query->where('id','=',Auth::guard('student')->id());
        }])->get();
        return view('auth.userInfo', compact('studentDetail', 'studentClassroom', 'courses','paymentDetail'));
    }

    public function updatePassword(ResetPasswordRequest $request, $id)
    {
        $studentUpdate = $this->student->newQuery()->findOrFail($id);
        if ($request->password)
        {
            if (!Hash::check($request->password_old,$studentUpdate->password))
            {
                return redirect()->back()->with('error','Mật khẩu của bạn không trùng với mật khẩu bạn đăng ký! Vui lòng thử lại');
            }
            $studentUpdate->password =  Hash::make($request->password);
            $studentUpdate->save();
            return redirect()->route('login')->with('success','Mật khẩu đã được đổi thành công, mời bạn đăng nhập lại');
        }
    }


}
