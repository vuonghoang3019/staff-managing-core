<?php

namespace Modules\Admin\Http\Requests;

use App\Models\Schedule;
use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequestAdd extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     */
    private $schedule;

    public function __construct(Schedule $schedule)
    {
        parent::__construct();
        $this->schedule = $schedule;
    }


    public function rules()
    {
        return [
            'classroom_id' => 'required',
            'teacher_id'   => 'required',
            'course_id'    => 'required',
            'calendar_id'  => 'required|unique:schedule,calendar_id,' . $this->id,
            'date_start'   => 'required|after_or_equal:today',
            'date_end'     => 'required|after:date_start'
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
