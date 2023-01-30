<?php

namespace App\Models;

class Price extends BaseModel
{
    protected $table = 'price';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'price',
        'course_id',
        'lesson',
        'sale',
        'description']
    ;

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
