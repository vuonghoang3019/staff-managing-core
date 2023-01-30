<?php

namespace Admin\Models;

use Admin\Models\Columns\AboutColumn;
use Admin\Traits\HasUuid;

class About extends BaseModel
{
    use AboutColumn, HasUuid;

    protected $table = 'about';

    public static $Name = 'about';

    protected $primaryKey = 'Id';

    public static $Key = "Id";

    protected $fillable = [
        'Id',
        'Title',
        'Slug',
        'ImagePath',
        'Remark',
        'SortOrder',
        'Content',
        'ShortContent',
        'Seo',
        'Status',
        'Publish',
        'CreatedBy',
        'CreatedDate',
        'ChangedDate',
        'ChangedBy',
    ];
}
