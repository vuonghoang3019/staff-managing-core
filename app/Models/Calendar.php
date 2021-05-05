<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'calendar';
    protected $fillable = ['day','start_time','end_time','status','schedule_id'];
}
