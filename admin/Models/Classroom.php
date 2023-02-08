<?php

namespace Admin\Models;

use Admin\Models\Columns\ClassRoomColumn;
use Admin\Traits\HasUuid;

/**
 * @property mixed is_active
 */
class Classroom extends BaseModel
{
    use HasUuid, ClassRoomColumn;

    protected $table = 'tbClassroom';

    public static $Name = 'tbClassroom';

    protected $primaryKey = 'Id';

    protected $keyType = 'string';

    protected $fillable = [
        'Id',
        'DisplayName',
        'Code',
        'CourseId',
        'Status',
        'Publish',
        'MaxStudent',
        'MinStudent',
        'SortOrder',
        'CreatedBy',
        'CreatedDate',
        'ChangedDate',
        'ChangedBy',
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
