<?php

namespace App\Models;


use App\Models\Attributes\IsActiveAttributes;

class About extends BaseModel
{
    use IsActiveAttributes;

    protected $table = 'about';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'image_path',
        'image_name',
        'content',
        'is_active'
    ];
}
