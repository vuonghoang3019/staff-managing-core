<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $fillable = ['calendar_id','teacher_id','course_id','classroom_id'];

    public function calendar()
    {
        return $this->belongsTo(Calendar::class,'calendar_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function class()
    {
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'classroom_id');
    }
}
