<?php

namespace Modules\Admin\Http\Requests;

use App\Models\Calendar;
use App\Models\Schedule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class ScheduleRequestAdd extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     */
    private $schedule;
    private $calendar;

//    public function __construct(Schedule $schedule)
//    {
//        parent::__construct();
//        $this->schedule = $schedule;
//    }
//
//    public function isValidate($ignore = '')
//    {
//        try {
//            $startTime = $this->get('start_time');
//            $endTime = $this->get('end_time');
//            $day = $this->get('day');
//            $classID = $this->get('classroom_id');
//            $teacherID = $this->get('teacher_id');
//            return $this->schedule->validateTime($day, $startTime, $endTime, $teacherID, $classID, $ignore);
//        } catch (\Exception $exception) {
//            Log::error('Message' . $exception->getMessage() . 'Line' . $exception->getLine());
//        }
//    }


    public function rules()
    {
        return [

        ];

//        if (!is_null($this->get('start_time', null)) && !is_null($this->get('end_time', null))) {
//            $rules['start_time'] = [
//                'required',
//                'date_format:H:i',
//                function ($attributes, $value, $fail) {
//                    if ($this->isValidate() == null) {
//                        return $fail(sprintf("The %s already", $attributes));
//                    }
//                },
//            ];
//
//            $rules['end_time'] = [
//                'required',
//                'date_format:H:i',
//                'after:start_time',
//                function ($attributes, $value, $fail) {
//                    if ($this->isValidate() == null) {
//                        return $fail(sprintf("The %s already", $attributes));
//                    }
//                },
//            ];
//        }


    }

    public function messages()
    {
        return [
            'end_time.after' => 'End time must be after Start time',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
