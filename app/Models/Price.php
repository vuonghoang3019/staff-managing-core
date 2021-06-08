<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';
    protected $fillable = ['name','price','course_id'];
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
