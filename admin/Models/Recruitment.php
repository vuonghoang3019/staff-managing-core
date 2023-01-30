<?php

namespace App\Models;

use App\Models\Attributes\IsActiveAttributes;

class Recruitment extends BaseModel
{
    use IsActiveAttributes;

    protected $table = 'recruitment';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'is_active',
        'image_name',
        'image_path'
    ];
}
