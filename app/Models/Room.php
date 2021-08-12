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
        'description',
        'is_active'
    ];

}
