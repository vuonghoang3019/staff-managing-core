<?php

namespace Admin\Models;

use Admin\Models\Columns\PaymentColumn;
use Admin\Traits\HasUuid;

class Payment extends BaseModel
{
    use HasUuid, PaymentColumn;

    protected $table = 'tbPayment';

    public static string $Name = 'tbPayment';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'Id'.
        'UserId',
        'CourseId',
        'Total',
        'TransactionCode',
        'Remark',
        'VNResponseCode',
        'CodeVnPay',
        'CodeBank',
        'Time'
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
