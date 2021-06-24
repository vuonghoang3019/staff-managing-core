<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
    protected $table = 'payments';
    protected $fillable = ['user_id', 'course_id', 'total', 'transaction_code', 'note', 'vn_response_code', 'code_vnpay', 'code_bank', 'time'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function user()
    {
        return $this->belongsTo(Student::class, 'user_id');
    }
}
