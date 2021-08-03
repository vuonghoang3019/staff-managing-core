<?php

namespace App\Models;

use App\Models\Attributes\IsActiveAttributes;

class Slider extends BaseModel
{
    use IsActiveAttributes;

    protected $table = 'slider';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'image_name',
        'image_path',
        'is_active'
    ];
}
