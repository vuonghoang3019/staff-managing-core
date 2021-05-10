<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $fillable = ['calendar_id', 'teacher_id', 'course_id', 'classroom_id','date_start','date_end'];

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

    public function countNumber($teacherID, $classId)
    {
        return $this->newQuery()
            ->where('teacher_id',$teacherID)
            ->orWhere('classroom_id',$classId)
            ->get()->count();
    }

    public function countTeacher($teacherID)
    {
        return $this->newQuery()
            ->where('teacher_id',$teacherID)
            ->get()->count();
    }
}
