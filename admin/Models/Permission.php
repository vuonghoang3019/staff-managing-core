<?php

namespace Admin\Models;

use Admin\Models\Columns\PermissionColumn;
use Admin\Traits\HasUuid;

class Permission extends BaseModel
{
    use PermissionColumn, HasUuid;

    protected $table = 'tbPermission';

    public static string $Name = 'tbPermission';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Id',
        'DisplayName',
        'Remark',
        'ParentId',
        'Value',
        'SortOrder',
    ];

    public function child()
    {
        return $this->hasMany(Permission::class,'parent_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_role','permission_id','role_id');
    }
}
