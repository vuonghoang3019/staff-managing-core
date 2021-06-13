<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title','image_name','image_path','content','status'];
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
