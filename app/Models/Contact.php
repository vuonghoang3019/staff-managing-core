<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['name_parent','phone','name_student','email','content'];
    const STATUS_ACTIVE  = 1;
    const STATUS_INACTIVE = 0;
    protected $statusClassroom = [
        1 => [
            'name' => 'Đã xem',
            'class' => 'btn btn-primary'
        ],
        0 => [
            'name' => 'Chưa xem',
            'class' => 'btn btn-default'
        ]
    ];
    public function getStatus()
    {
        return Arr::get($this->statusClassroom,$this->status,'N\A');
    }
}
