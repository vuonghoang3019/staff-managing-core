<?php

namespace App\Models;

class Payment extends BaseModel
{

    protected $table = 'payment';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'course_id',
        'total',
        'tr ansaction_code',
        'note',
        'vn_response_code',
        'code_vnpay',
        'code_bank',
        'time'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function user()
    {
        return $this->belongsTo(Student::class, 'user_id');
    }
}
