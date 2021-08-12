<?php

namespace Backend\Repositories\Payment;

use App\Models\Course;
use App\Models\Payment;
use Backend\Repositories\BaseRepository;
use Illuminate\Support\Str;

class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{
    public function getModel()
    {
        return Payment::class;
    }

    public function paginate()
    {
        return $this->model->newQuery()->with(['course', 'user'])->paginate(5);
    }

    public function getCourse()
    {
        return Course::where('is_active', 1)->get();
    }

    public function search($request)
    {
        if ($request->get('id')) {
            $id = $request->get('id');
            $payments = $this->model->with(['course', 'user'])
                ->where('course_id', $id)
                ->get();
        } else {
            $name = $request->get('searchResult');
            $payments = $this->model->newQuery()
                ->join('student', 'payment.user_id', '=', 'student.id')
                ->join('course', 'payment.course_id', '=', 'course.id')
                ->where('student.name', 'like', '%' . $name . '%')->get();
        }
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
