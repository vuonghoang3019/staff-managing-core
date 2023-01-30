<?php

namespace Admin\Services;

use App\Models\Schedule;

class CalendarService {

    public function generateCalendarData($weekDays)
    {
        $user = auth()->user();
        $calendarData = [];
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start_time'), config('app.calendar.end_time'));
        $schedules = Schedule::with('user', 'class', 'room')->get();
        foreach ($timeRange as $time) {
            $timeText = substr($time['start'], 0, -3) . ' - ' . substr($time['end'], 0, -3);
            $calendarData[$timeText] = [];
            foreach ($weekDays as $index => $day) {

                foreach ($user->roles as $role) {
                    if ($role->code == 'SA') {
                        $schedule = $schedules->where('weekday', $index)->where('start_time', $time['start'])->first();
                    } else {
                        $schedule = $schedules->where('user_id', $user->id)->where('weekday', $index)->where('start_time', $time['start'])->first();
                    }
                    if ($schedule) {
                        array_push($calendarData[$timeText], [
                            'class_name'   => $schedule->class->name,
                            'teacher_name' => $schedule->user->name,
                            'room_name'    => $schedule->room->name,
                            'rowspan'      => $schedule->difference / 30 ?? ''
                        ]);

                    } else if (!$schedules->where('calendar.day', $index)->where('calendar.start_time', '<', $time['start'])->where('calendar.end_time', '>=', $time['end'])->count()) {
                        array_push($calendarData[$timeText], 1);
                    } else {
                        array_push($calendarData[$timeText], 0);
                    }
                }

            }
        }
        return $calendarData;
    }
}
