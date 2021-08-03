<?php

namespace App\Models;

use App\Models\Attributes\IsActiveAttributes;

class Room extends BaseModel
{
    use IsActiveAttributes;

    protected $table = 'room';

    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'name',
        'sit_capacity',
        'description',
        'is_active'
    ];

}
