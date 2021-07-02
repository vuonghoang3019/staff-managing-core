<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable {
    use Notifiable;

    protected $table = 'students';
    protected $guarded = 'student';
    protected $fillable = ['code', 'name', 'birthday', 'sex', 'nation', 'classroom_id',
                           'status', 'email', 'password', 'phone',
                           'image_path', 'image_name', 'code_reset', 'code_time',
                           'code_active', 'time_active'
    ];
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    protected $statusStudent = [
        1 => [
            'name'  => 'Đang học',
            'class' => 'btn btn-primary'
        ],
        0 => [
            'name'  => 'Nghỉ học',
            'class' => 'btn btn-default'
        ],
        2 => [
            'name'  => 'Đang chờ',
            'class' => 'btn btn-warning'
        ]
    ];

    public function getStatus()
    {
        return Arr::get($this->statusStudent, $this->status, 'N\A');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

}
