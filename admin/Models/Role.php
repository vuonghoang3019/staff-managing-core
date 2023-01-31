<?php

namespace Admin\Models;

use Admin\Models\Columns\RoleColumn;
use Admin\Traits\HasUuid;

class Role extends BaseModel
{
    use HasUuid, RoleColumn;

    protected $table = 'tbRole';

    public static string $Name = 'tbRole';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Id',
        'Code',
        'DisplayName',
        'Remark',
        'SortOrder'
    ];

    public function permission_role()
    {
        return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }

}
