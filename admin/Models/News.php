<?php

namespace Admin\Models;

use Admin\Models\Columns\PostColumn;
use Admin\Traits\HasUuid;

class News extends BaseModel
{
    use HasUuid, PostColumn;

    protected $table = 'tbPosts';

    public static string $Name = 'tbPosts';

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
