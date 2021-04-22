<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classroom';
    protected $fillable = ['name','code','course_id','status'];
}
