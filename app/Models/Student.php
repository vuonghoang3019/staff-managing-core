<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Student extends Model
{
    protected $table = 'student';
    protected $fillable = ['code','name','birthday','sex','nation','classroom_id','status'];
    const STATUS_ACTIVE  = 1;
    const STATUS_INACTIVE = 0;
    protected $statusStudent = [
        1 => [
            'name' => 'Đang học',
            'class' => 'btn btn-primary'
        ],
        0 => [
            'name' => 'Nghỉ học',
            'class' => 'btn btn-default'
        ]
    ];
    public function getStatus()
    {
        return Arr::get($this->statusStudent,$this->status,'N\A');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
}
