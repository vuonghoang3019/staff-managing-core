<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name','code','email','password','image_name','image_path'];
    public function grade()
    {
        return $this->belongsToMany(Grade::class,'user_grade','user_id','grade_id');
    }
}
