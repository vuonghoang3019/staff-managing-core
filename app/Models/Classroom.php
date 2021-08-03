<?php

namespace App\Models;

use App\Models\Attributes\IsActiveAttributes;

/**
 * @property mixed is_active
 */
class Classroom extends BaseModel
{
    use IsActiveAttributes;

    protected $table = 'classroom';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'code',
        'course_id',
        'is_active',
        'max_student',
        'min_student'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'classroom_id');
    }
}
