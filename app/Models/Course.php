<?php

namespace App\Models;
use App\Models\Attributes\IsActiveAttributes;

class Course extends BaseModel
{
    use IsActiveAttributes;

    protected $table = 'course';

    public static $name = 'course';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'image_name',
        'image_path',
        'is_active'
    ];

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
