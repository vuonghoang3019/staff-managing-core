<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Classroom extends Model
{
    protected $table = 'classrooms';
    protected $fillable = ['name','code','course_id','status','number','min'];
    const STATUS_ACTIVE  = 1;
    const STATUS_INACTIVE = 0;
    protected $statusClassroom = [
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
        return Arr::get($this->statusClassroom,$this->status,'N\A');
    }
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    public function student()
    {
        return $this->hasMany(Student::class,'classroom_id');
    }

    public function countStudent($id)
    {
        return Student::all()->where('classroom_id',$id)->count();
    }
}
