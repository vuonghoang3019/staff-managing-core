<?php

namespace Admin\Models;

use Admin\Models\Columns\GradeColumn;
use Admin\Traits\HasUuid;

class Grade extends BaseModel
{
    use HasUuid, GradeColumn;

    protected $table = 'tbGrade';

    public static string $Name = 'tbGrade';

    protected $primaryKey = 'Id';

    protected static $Key = "Id";

    protected $keyType = 'string';

    protected $casts = ['Id' => 'string'];

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
