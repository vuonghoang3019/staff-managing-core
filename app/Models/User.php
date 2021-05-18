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
}
