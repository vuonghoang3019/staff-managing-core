<?php

namespace App\Models;

use App\Models\Attributes\IsActiveAttributes;

class Grade extends BaseModel
{
    use IsActiveAttributes;

    protected $table = 'grade';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'is_check'
    ];

}
