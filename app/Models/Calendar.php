<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'calendar';
    protected $fillable = ['day','start_time','end_time','status'];

    public function validateDay($calendarID)
    {
        return $this->newQuery()->select('day')->where('id','=',$calendarID)->get();
    }
}
