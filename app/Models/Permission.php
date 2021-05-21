<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['name','description','parent_id','value'];

    public function child()
    {
        return $this->hasMany(Permission::class,'parent_id');
    }
}
