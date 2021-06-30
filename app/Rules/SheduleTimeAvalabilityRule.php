<?php

namespace App\Rules;

use App\models\Schedule;
use Illuminate\Contracts\Validation\Rule;

class SheduleTimeAvalabilityRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($schedule = null)
    {
        $this->schedule = $schedule;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Schedule::isTimeAvailable(request()->input('weekday'), $value, request()->input('end_time'), request()->input('classroom_id'), request()->input('user_id'), request()->input('room_id') , $this->schedule);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Đã có lớp học tại thời gian này';
    }
}
