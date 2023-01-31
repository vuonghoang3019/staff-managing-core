<?php

namespace Admin\Models;

use Admin\Models\Columns\ContactColumn;
use Admin\Traits\HasUuid;

class Contact extends BaseModel
{
    use HasUuid, ContactColumn;

    protected $table = 'tbContact';

    public static string $Name = 'tbContact';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Id',
        'DisplayName',
        'Phone',
        'NameStudent',
        'Email',
        'Content',
        'Status'
    ];
}
