<?php

namespace Modules\Admin\Services;

use App\Models\Schedule;

class CalendarService
{
    public function generateCalendarData($weekDays)
    {
        $calendarData = [];
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start'), config('app.calendar.end'));
        $schedules = Schedule::with('calendar', 'teacher', 'class', 'course')->get();
//        dd($schedules);
        foreach ($timeRange as $time)
        {
            $timeText = $time['start'] . ' - ' . $time['end'];
            $calendarData[$timeText] = [];
            foreach ($weekDays as $index => $day) {
                $schedule = $schedules->where('calendar.day', $index)->where('start_time', $time['start'])->first();

                if ($schedule) {
                    array_push($calendarData[$timeText], [
                        'className'   => $schedules->class->name,
                        'teacherName' => $schedules->teacher->name,
                        'rowspan'     => $schedules->difference / 30 ?? ''
                    ]);
                }
                else if (!$schedules->where('day',$index)->where('start_time','<',$time['start'])->where('end_time','>=',$time['end'])->count())
                {
                    array_push($calendarData[$timeText],1);
                }
                else
                {
                    array_push($calendarData[$timeText],0);
                }
            }
        }
        return $calendarData;
    }
}
