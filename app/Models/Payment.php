<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['user_id','course_id','total','transaction_code','note','vn_response_code','code_vnpay','code_bank','time'];
}
