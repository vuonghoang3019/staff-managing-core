<?php

namespace Admin\Models;

use Admin\Models\Columns\ScheduleColumn;
use Admin\Traits\HasUuid;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class Schedule extends BaseModel
{
    use HasUuid, ScheduleColumn;

    protected $table = 'tbSchedule';

    public static string $Name = 'tbSchedule';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Id',
        'Weekday',
        'UserId',
        'ClassRoomId',
        'RoomId',
        'StartTime',
        'EndTime'
    ];

    protected $weekDay = [
        '1' => 'Monday',
        '2' => 'Tuesday',
        '3' => 'Wednesday',
        '4' => 'Thursday',
        '5' => 'Friday',
        '6' => 'Saturday',
        '7' => 'Sunday',
    ];

    public function getWeek()
    {
        return Arr::get($this->weekDay,$this->week,'N\A');
    }

    public function getTimeAttribute($value)
    {
        $time = Carbon::createFromFormat('H:i:s', $value);
        return $time->format('H:i');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function class()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function countNumber($userID, $classId,$weekday)
    {
        return $this->newQuery()
            ->where('weekday',$weekday)
            ->where('user_id',$userID)
            ->orWhere('classroom_id',$classId)
            ->get()->count();
    }

    public function countTeacher($userID)
    {
        return $this->newQuery()
            ->where('user_id',$userID)
            ->get()->count();
    }

    public static function isTimeAvailable($weekday, $startTime, $endTime, $classroom_id, $user_id, $room_id, $id)
    {
        $schedule = self::where('weekday', $weekday)
            ->when($id, function ($query) use ($id) {
                $query->where('id', '!=', $id);
            })
            ->where(function ($query) use ($classroom_id, $user_id, $room_id) {
                $query->where('classroom_id', $classroom_id)
                    ->orWhere('user_id', $user_id)
                    ->orWhere('room_id', $room_id);
            })
            ->where([
                ['start_time', '<', $endTime],
                ['end_time', '>', $startTime],
            ])
            ->count();

        return !$schedule;
    }

    public static function checkGrade($user_id,$classroom_id)
    {
        $user= User::with('grades')->where('id',$user_id)->first();
        $userGrade = $user->grades;
        $class = Classroom::with('course')->where('id',$classroom_id)->first();
        $classGrade = $class->course->course_grade;
        foreach ($userGrade as $item)
        {
            foreach ($classGrade as $value)
            {
                if ($item->name == $value->name)
                {
                    return true;
                }
            }
        }
        return false;
    }
}
