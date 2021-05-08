<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'calendar';
    protected $fillable = ['day','start_time','end_time','status'];

    public function validateTime($day, $time, $ignore = '')
    {
        return $this->newQuery()->where('day', $day)
            ->whereRaw(sprintf("'%s' BETWEEN %s AND %s", $time, 'start_time', 'end_time'))
            ->when(!empty($ignore), function ($q) use ($ignore) {
                return $q->where(Calendar::id, '!=', $ignore);
            })->get();
    }
}
