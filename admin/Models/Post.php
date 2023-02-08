<?php

namespace Admin\Models;

use Admin\Models\Columns\PostColumn;
use Admin\Traits\HasUuid;

class Post extends BaseModel
{
    use HasUuid, PostColumn;

    protected $table = 'tbPost';

    public static string $Name = 'tbPost';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Id',
        'Slug',
        'Content',
        'ShortContent',
        'Seo',
        'Title',
        'ImagePath',
        'Remark',
        'Status',
        'Publish',
        'SortOrder',
        'CreatedBy',
        'CreatedDate',
        'ChangedDate',
        'ChangedBy',
        'AuthorId',
    ];

}
