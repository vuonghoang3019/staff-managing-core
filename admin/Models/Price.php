<?php

namespace Admin\Models;

use Admin\Models\Columns\PriceColumn;
use Admin\Traits\HasUuid;

class Price extends BaseModel
{
    use HasUuid, PriceColumn;

    protected $table = 'tbPrice';

    public static string $Name = 'tbPrice';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Id',
        'DisplayName',
        'UnitPrice',
        'CourseId',
        'Lesson',
        'Discount',
        'Remark',
        'CreatedDate',
        'CreatedBy',
        'ChangedDate',
        'ChangedBy',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
