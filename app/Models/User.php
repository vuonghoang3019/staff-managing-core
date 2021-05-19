<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $fillable = ['name','code','email','password','image_name','image_path','status'];
    public function grade()
    {
        return $this->belongsToMany(Grade::class,'user_grade','user_id','grade_id');
    }

    public function role()
    {
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    }

    //check one role (check user one role)
    public function hasRole($role)
    {
        return null !== $this->role()->where('name',$role)->first();
    }

    //check multiple role (check user one-to-many role)
    public function hasAnyRole($roles)
    {
        return null !== $this->role()->whereIn('name',$roles)->first();
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }
}
