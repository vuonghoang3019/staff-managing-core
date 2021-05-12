<?php

namespace Modules\Admin\Services;

use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class CalendarService
{
    public function generateCalendarData($weekDays)
    {
        $calendarData = [];
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start'), config('app.calendar.end'));
        $schedules = Schedule::with('teacher','calendar','course','class')->get();
        foreach ($timeRange as $time) {
            $timeText = $time['start'] . ' - ' . $time['end'];
            $calendarData[$timeText] = [];
            foreach ($weekDays as $index => $day) {
                $schedule = $schedules->where('calendar.day', $day)
                    ->where('calendar.start_time','>',$time['start'])->first();
                if ($schedule) {
                    array_push($calendarData[$timeText], [
                        'className'   => $schedule->class->name,
                        'teacherName' => $schedule->teacher->name,
                        'rowspan'     => $schedule->difference / 30 ?? ''
                    ]);
                } else if (!$schedules->where('calendar.day', $day)->where('calendar.start_time', '<', $time['start'])->where('calendar.end_time', '>=', $time['end'])->count()) {
                    array_push($calendarData[$timeText], 1);
                } else {
                    array_push($calendarData[$timeText], 0);
                }
            }
        }
        return $calendarData;
    }
}
