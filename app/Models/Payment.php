<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['order_id','user_id','price','note','vn_response_code','code_vnpay','code_bank','time'];
}
