<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Recruitment extends Model
{
    protected $table = 'recruitments';
    protected $fillable = ['title','content','status','image_name','image_path'];
    const STATUS_ACTIVE  = 1;
    const STATUS_INACTIVE = 0;
    protected $statusCategory = [
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
        return Arr::get($this->statusCategory,$this->status,'N\A');
    }
}
