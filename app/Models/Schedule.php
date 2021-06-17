<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = ['calendar_id', 'user_id', 'classroom_id','date_start','date_end'];
    protected $weekDay = [
        '1' => 'Monday',
        '2' => 'Tuesday',
        '3' => 'Wednesday',
        '4' => 'Thursday',
        '5' => 'Friday',
        '6' => 'Saturday',
        '7' => 'Sunday',
    ];

    public function getWeek()
    {
        return Arr::get($this->weekDay,$this->week,'N\A');
    }

    public function getTimeAttribute($value)
    {
        $time = Carbon::createFromFormat('H:i:s', $value);
        return $time->format('H:i');
    }
    public function calendar()
    {
        return $this->belongsTo(Calendar::class,'calendar_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function class()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function countNumber($userID, $classId)
    {
        return $this->newQuery()
            ->where('user_id',$userID)
            ->orWhere('classroom_id',$classId)
            ->get()->count();
    }

    public function countTeacher($userID)
    {
        return $this->newQuery()
            ->where('user_id',$userID)
            ->get()->count();
    }
}
