<?php

namespace Admin\Models;

use Admin\Models\Columns\AboutColumn;
use Admin\Traits\HasUuid;

class About extends BaseModel
{
    use AboutColumn, HasUuid;

    protected $table = 'tbAbout';

    public static string $Name = 'tbAbout';

    protected $primaryKey = 'Id';

    public static string $Key = "Id";

    protected $keyType = 'string';

    protected $casts = ['Id' => 'string'];

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
