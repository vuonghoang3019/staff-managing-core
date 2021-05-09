<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $fillable = ['calendar_id', 'teacher_id', 'course_id', 'classroom_id','date'];

    public function calendar()
    {
        return $this->belongsTo(Calendar::class, 'calendar_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function class()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

//    public function validateTime($day, $startTime, $endTime, $teacherID,$classID, $ignore = '')
//    {
//        return $this->newQuery()
//            ->join('calendar', 'schedule.calendar_id', '=', 'calendar.id')
//            ->where(
//                [
//                    ['day', '=', $day],
//                    ['teacher_id', '=', $teacherID],
//                    ['classroom_id','=',$classID]
//                ])
//            ->whereBetween('end_time',[$startTime,$endTime])
//            ->orWhereBetween('start_time',[$startTime,$endTime])
//            ->when(!empty($ignore), function ($q) use ($ignore) {
//                return $q->where('calendar_id', '!=', $ignore);
//            })
//            ->get();
//    }
}
