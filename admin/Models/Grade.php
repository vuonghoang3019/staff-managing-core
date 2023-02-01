<?php

namespace Admin\Models;

use Admin\Models\Columns\GradeColumn;
use Admin\Traits\HasUuid;

class Grade extends BaseModel
{
    use HasUuid, GradeColumn;

    protected $table = 'tbGrade';

    public static string $Name = 'tbGrade';

    protected $primaryKey = 'id';

    protected $fillable = [
        'Id',
        'DisplayName',
        'Remark',
        'Status',
        'CreatedBy',
        'CreatedDate',
        'ChangedDate',
        'ChangedBy',
    ];

}
