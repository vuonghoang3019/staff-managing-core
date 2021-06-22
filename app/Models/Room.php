<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Room extends Model
{
    protected $table = 'rooms';
    protected $fillable = ['code','name','sit_capacity','description','status'];
    const STATUS_ACTIVE  = 1;
    const STATUS_INACTIVE = 0;
    protected $statusCategory = [
        1 => [
            'name' => 'Đang học',
            'class' => 'btn btn-primary'
        ],
        0 => [
            'name' => 'Trống',
            'class' => 'btn btn-default'
        ]
    ];
    public function getStatus()
    {
        return Arr::get($this->statusCategory,$this->status,'N\A');
    }
}
