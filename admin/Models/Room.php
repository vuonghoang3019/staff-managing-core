<?php

namespace Admin\Models;

use Admin\Models\Columns\RoomColumn;
use Admin\Traits\HasUuid;

class Room extends BaseModel
{
    use HasUuid, RoomColumn;

    protected $table = 'tbRoom';

    public static string $Name = 'tbRoom';

    protected $primaryKey = 'Id';

    protected $keyType = 'string';

    protected $casts = ['Id' => 'string'];

    protected $fillable = [
        'Id',
        'Code',
        'DisplayName',
        'Remark',
        'Status',
        'Publish',
        'SortOrder',
        'CreatedBy',
        'CreatedDate',
        'ChangedDate',
        'ChangedBy',
    ];

}
