<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';
    protected $fillable = ['name','code','email','password','image_name','image_path'];
    public function grade()
    {
        return $this->belongsToMany(Grade::class,'teacher_grade','teacher_id','grade_id');
    }
}
