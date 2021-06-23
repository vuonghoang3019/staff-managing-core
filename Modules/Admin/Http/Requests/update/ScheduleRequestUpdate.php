<?php

namespace Modules\Admin\Http\Requests\update;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\SheduleTimeAvalabilityRule;

class ScheduleRequestUpdate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'classroom_id' => 'required',
            'room_id'      => 'required',
            'weekday'      => 'required',
            'user_id'      => 'required',
            'start_time'   => [
                'required',
                new SheduleTimeAvalabilityRule($this->id),
            ],
            'end_time'     => 'required'
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
