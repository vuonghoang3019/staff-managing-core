<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\News;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends FrontendController
{
    private $course;
    private $classroom;
    private $price;
    private $news;

    public function __construct(Course $course, Classroom $classroom, Price $price, News $news)
    {
        parent::__construct();
        $this->course = $course;
        $this->classroom = $classroom;
        $this->price = $price;
        $this->news = $news;
    }

    public function index()
    {
        $courses = $this->course->paginate(6);
        return view('course.course', compact('courses'));
    }

    public function detail($id)
    {
        $classrooms = $this->classroom
            ->newQuery()
            ->join('students', 'students.classroom_id', '=', 'classrooms.id')
            ->join('courses', 'courses.id', '=', 'classrooms.course_id')
            ->where('courses.id', $id)
            ->get();
        $prices = $this->price->newQuery()->with(['course'])->where([
            ['course_id','=',$id],
            ['price','>',0]
        ])->whereNotNull('price')->get();
        $courseDetail = $this->course->findOrFail($id);
        $news = $this->news->newQuery()->limit(3)->get();
        return view('course.courseDetail', compact('courseDetail', 'classrooms','prices','news'));
    }

    public function showCart($idPrice,$idCourse)
    {
        $prices = $this->price->findOrFail($idPrice);
        $courseDetail =  $this->course->findOrFail($idCourse);
        return view('cart.cart',compact('prices','courseDetail'));
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function payment($idPrice,$idCourse)
    {
        if (!Auth::guard('student')->check())
        {
            return redirect()->back()->with('error','Bạn phải đăng nhập mới thanh toán');
        }
        $prices = $this->price->findOrFail($idPrice);
        $courseDetail =  $this->course->findOrFail($idCourse);
        $total = $prices->price - ($prices->sale * $prices->price) / 100;
        $dataCourses = $courseDetail->id;
        session()->put('courseID',$dataCourses);
//        dd(session()->get('courseID'));
        return view('vnpay.index',compact('total','courseDetail'));
    }

    public function postPay(Request $request)
    {
        $vnp_TxnRef = $this->generateRandomString(15);
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = $request->amount * 100;
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];;
        $inputData = [
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
        ];
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);

        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
            $vnpSecureHash = hash('sha256', env('VNP_HASH_SECRET') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function vnpayReturn(Request $request)
    {
        if ($request->vnp_ResponseCode == '00')
        {
            $vnpayData = $request->all();
            $userID = Auth::guard('student')->user()->id;
            $couseID = session()->get('courseID');

            return view('vnpay.vnpay_return',compact('vnpayData','userID'));
        }
        else
        {
            return redirect()->back()->with('error','Đã xảy ra lỗi');
        }
    }
}
