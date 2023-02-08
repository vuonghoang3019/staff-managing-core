<?php

namespace Admin\Models;

use Admin\Models\Columns\StudentColumn;
use Admin\Traits\HasUuid;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable, HasUuid, StudentColumn;

    protected $table = 'tbStudent';

    public static string $Name = 'tbStudent';

    protected $primaryKey = 'Id';

    protected $keyType = 'string';

    protected $fillable = [
        'Id',
        'Code',
        'DisplayName',
        'Email',
        'Password',
        'Birthday',
        'Gender',
        'ClassroomId',
        'Status',
        'ImagePath',
        'CodeReset',
        'CodeTime',
        'CodeActive',
        'TimeActive',
        'Value1',
        'Value2',
        'Value3',
        'Value4',
        'Value5',
        'Deleted',
        'CreatedBy',
        'CreatedDate',
        'ChangedDate',
        'ChangedBy',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

}
