<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['code','name','description'];

    public function permission_role()
    {
        return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }

}
