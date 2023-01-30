<?php

namespace Admin\Http\Requests\Schedule;

use App\Rules\ScheduleGradeAvalability;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\SheduleTimeAvalabilityRule;

class ScheduleRequestAdd extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     */
    private $schedule;


    public function rules()
    {
        return [
            'classroom_id' => 'required',
            'room_id'      => 'required',
            'weekday'      => 'required',
            'user_id'      => [
                'required',
                new ScheduleGradeAvalability()
            ],
            'start_time'   => [
                'required',
                new SheduleTimeAvalabilityRule(),
            ],
            'end_time'     => 'required'
        ];
    }

    public function messages()
    {
        return [

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
