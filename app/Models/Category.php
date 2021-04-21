<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['name','slug','parent_id','total','active'];
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
    public function categoryChild()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }

}
