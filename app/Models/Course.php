<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;


class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['name','description','image_name','image_path','status'];
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
}
