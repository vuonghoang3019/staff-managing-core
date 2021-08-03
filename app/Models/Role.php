<?php

namespace App\Models;

class Role extends BaseModel
{
    protected $table = 'role';

    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'name',
        'description'
    ];

    public function permission_role()
    {
        return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }

}
