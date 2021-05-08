<?php

namespace Modules\Admin\Http\Requests;

use App\Models\Calendar;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class ScheduleRequestAdd extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     */
    private $calendar;
    public function  __construct(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    public function isValidate($date, $ignore = '')
    {
        try {
            $id = $this->get('id');
            return $this->calendar->validateTime($id, $date, $ignore);
        } catch (\Exception $exception) {
            Log::error('Message' . $exception->getMessage() . 'Line' . $exception->getLine());
        }
    }

    public function rules()
    {
        return [
            'start_time' => [
                'required',
                'date_format:H:i',
                function ($attributes, $value, $fail) {
                    if ($this->isValidate($value)) {
                        return $fail(sprintf("The %s alreaydy", $attributes));
                    }
                },
            ],
            'end_time' => 'required|date_format:H:i|after:start_time'
        ];
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
