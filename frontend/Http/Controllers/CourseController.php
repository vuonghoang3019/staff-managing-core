<?php

namespace Frontend\Http\Controllers;

use App\Helper\helper;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\News;
use App\Models\Payment;
use App\Models\Price;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends FrontendController {

    use Helper;
    private $course;
    private $classroom;
    private $price;
    private $news;
    private $payment;
    private $student;

    public function __construct(Course $course, Classroom $classroom, Price $price, News $news, Payment $payment, Student $student)
    {
        parent::__construct();
        $this->course = $course;
        $this->classroom = $classroom;
        $this->price = $price;
        $this->news = $news;
        $this->payment = $payment;
        $this->student = $student;
    }

    public function index()
    {
        $courses = $this->course->paginate(6);
        return view('frontend::course.course', compact('courses'));
    }

    public function detail($id)
    {
        $classrooms = $this->classroom
            ->newQuery()
            ->join('student', 'student.classroom_id', '=', 'classroom.id')
            ->join('course', 'course.id', '=', 'classroom.course_id')
            ->where('course.id', $id)
            ->get();
        $prices = $this->price->newQuery()->with(['course'])->where([
            ['course_id', '=', $id],
            ['price', '>', 0]
        ])->whereNotNull('price')->get();
        $courseDetail = $this->course->findOrFail($id);
        $news = $this->news->newQuery()->limit(3)->get();
        return view('frontend::course.courseDetail', compact('courseDetail', 'classrooms', 'prices', 'news'));
    }

    public function showCart($idPrice, $idCourse)
    {
        $prices = $this->price->findOrFail($idPrice);
        $courseDetail = $this->course->findOrFail($idCourse);
        return view('frontend::cart.cart', compact('prices', 'courseDetail'));
    }

    public function payment($idPrice, $idCourse)
    {
        if (!Auth::guard('student')->check()) {
            return redirect()->back()->with('error', 'Bạn phải đăng nhập mới thanh toán');
        }

//
//        if (!$course) {
//            return redirect()->back()->with('error', 'Số lượng học sinh đã đủ! Vui lòng liên hệ với trung tâm để biết thêm thông tin chi tiết');
//        }

        $course = $this->course->newQuery()->with('classroom')->findOrFail($idCourse);
        $classrooms = $course->classroom;


//        $lengthClassroom = count($classrooms);
//        for ($i = 0; $i < $lengthClassroom; $i++)
//        {
//            $countStudent = $this->student->newQuery()->where('classroom_id', $classrooms[$i]->id)->count();
//            if ($countStudent < $classrooms[$i]->max_student)
//            {
//                echo $classrooms[$i]->id;
//            }
//            else
//            {
////                echo $classrooms[$i]->id;
////                return redirect()->back()->with('error', 'Số lượng học sinh đã đủ! Vui lòng liên hệ với trung tâm để biết thêm thông tin chi tiết');
//            }
//        }
        $prices = $this->price->findOrFail($idPrice);
        $total = $prices->price - ($prices->sale * $prices->price) / 100;
        $dataCourses = $course->id;
        session()->put('courseID', $dataCourses);
        return view('frontend::vnpay.index', compact('total', 'course', 'classrooms'));
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
            "vnp_Version"    => "2.0.0",
            "vnp_TmnCode"    => env('VNP_TMN_CODE'),
            "vnp_Amount"     => $vnp_Amount,
            "vnp_Command"    => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode"   => "VND",
            "vnp_IpAddr"     => $vnp_IpAddr,
            "vnp_Locale"     => $vnp_Locale,
            "vnp_OrderInfo"  => $vnp_OrderInfo,
            "vnp_OrderType"  => $vnp_OrderType,
            "vnp_ReturnUrl"  => route('vnpay.return'),
            "vnp_TxnRef"     => $vnp_TxnRef,
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
        if ($request->vnp_ResponseCode == '00') {
            $vnpayData = $request->all();
            $userID = Auth::guard('student')->user()->id;
            $courseID = session()->get('courseID');

            $dataPayment = [
                'user_id'          => $userID,
                'course_id'        => $courseID,
                'total'            => $vnpayData['vnp_Amount'],
                'transaction_code' => $vnpayData['vnp_TxnRef'],
                'note'             => $vnpayData['vnp_OrderInfo'],
                'vn_response_code' => $vnpayData['vnp_ResponseCode'],
                'code_vnpay'       => $vnpayData['vnp_TransactionNo'],
                'code_bank'        => $vnpayData['vnp_BankCode'],
                'time'             => date('Y-m-d H:i', strtotime($vnpayData['vnp_PayDate']))

            ];
            $this->payment->create($dataPayment);
            session()->forget('courseID');
            return view('frontend::vnpay.vnpay_return', compact('vnpayData', 'userID'));
        } else {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi');
        }
    }
}
