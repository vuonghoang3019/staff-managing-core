<?php

namespace App\Models;

class Permission extends BaseModel
{
    protected $table = 'permission';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'value'
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
