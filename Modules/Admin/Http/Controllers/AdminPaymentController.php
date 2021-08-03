<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Course;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPaymentController extends FrontendController {

    private $payment;
    private $course;

    public function __construct(Payment $payment, Course $course)
    {
        parent::__construct();
        $this->payment = $payment;
        $this->course = $course;
    }

    public function index()
    {
        $courses = $this->course->where('is_active', 1)->get();
        $payments = $this->payment->newQuery()->with(['course', 'user'])->paginate(5);
        return view('admin::payment.index', compact('payments', 'courses'));
    }

    public function searchClassroom(Request $request)
    {
        if ($request->get('id')) {
            $id = $request->get('id');
            $payments = $this->payment->with(['course', 'user'])
                ->where('course_id', $id)
                ->get();
            $output = '';
            foreach ($payments as $payment) {
                $output .= '<tr>
                    <td>' . $payment->id . '</td>
                    <td>' . $payment->user->name . '</td>
                     <td>' . $payment->course->name . '</td>
                     <td>' . number_format($payment->total) . 'VNĐ</td>
                       <td>' . Str::limit($payment->note, 20) . '</td>
                         <td>' . $payment->code_bank . '</td>
                          <td>' . $payment->time . '</td>
                    </tr>';
            }
            return response($output);
        }
    }

    public function searchName(Request $request)
    {
        if ($request->get('searchResult')) {
            $name = $request->get('searchResult');
            $payments = $this->payment->newQuery()
                ->join('students','payment.user_id','=','students.id')
                ->join('courses','payment.course_id','=','courses.id')
                ->where('students.name', 'like', '%' . $name . '%')->get();
            $output = '';
            foreach ($payments as $payment) {
                $output .= '<tr>
                    <td>' . $payment->id . '</td>
                    <td>' . $payment->user->name . '</td>
                     <td>' . $payment->course->name . '</td>
                     <td>' . number_format($payment->total) . 'VNĐ</td>
                       <td>' . Str::limit($payment->note, 20) . '</td>
                         <td>' . $payment->code_bank . '</td>
                          <td>' . $payment->time . '</td>
                    </tr>';
            }

            return response($output);
        }
    }
}
