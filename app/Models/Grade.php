<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Grade extends Model
{
    protected $table = 'grade';
    protected $fillable = ['name','description','status'];
    const STATUS_ACTIVE  = 1;
    const STATUS_INACTIVE = 0;
    protected $statusGrade = [
        1 => [
            'name' => 'active',
            'class' => 'btn btn-primary'
        ],
        0 => [
            'name' => 'inactive',
            'class' => 'btn btn-default'
        ]
    ];
    public function getStatus()
    {
        return Arr::get($this->statusGrade,$this->status,'N\A');
    }
}
