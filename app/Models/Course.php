<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;


class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['name','description','image_name','image_path','status'];
    //k cos primary key à
    const STATUS_ACTIVE  = 1;
    const STATUS_INACTIVE = 0;
    protected $statusCourse = [
        1 => [
            'name' => 'active',
            'class' => 'btn btn-primary'
        ],
        0 => [
            'name' => 'inactive',
            'class' => 'btn btn-default'
        ]
    ];
    public function getStatus()
    {
        return Arr::get($this->statusCourse,$this->status,'N\A');
    }
    public function course_grade()
    {
        return $this->belongsToMany(Grade::class,'course_grade','course_id','grade_id');
    }

    public function price()
    {
        return $this->hasMany(Price::class,'course_id');
    }

    public function classroom()
    {
        return $this->hasMany(Classroom::class,'course_id');
    }

    public function getStudentInClassroom($id,$max)
    {
        return $this->newQuery()
            ->join('classrooms', 'classrooms.course_id', 'courses.id')
            ->leftJoin('students', 'students.classroom_id', 'classrooms.id')
            ->where("courses.id", $id)
            ->select([
                'courses.id',
                'courses.name as course_name',
                'classrooms.name as classroom_name',
            ])
            ->groupBy([
                'classrooms.id',
                'courses.id',
                'courses.name',
                'classrooms.name',
            ])
            ->havingRaw(sprintf("count(students.id) < %s", $max))
            ->first();
    }
}
