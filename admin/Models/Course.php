<?php

namespace Admin\Models;

use Admin\Models\Columns\CourseColumn;
use Admin\Traits\HasUuid;

class Course extends BaseModel
{
    use HasUuid, CourseColumn;

    protected $table = 'tbCourse';

    public static string $Name = 'tbCourse';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Id',
        'DisplayName',
        'Remark',
        'ImagePath',
        'Status',
        'CreatedBy',
        'CreatedDate',
        'ChangedDate',
        'ChangedBy',
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
