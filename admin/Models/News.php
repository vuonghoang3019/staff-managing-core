<?php

namespace App\Models;


use App\Models\Attributes\IsActiveAttributes;

class News extends BaseModel
{
    use IsActiveAttributes;

    protected $table = 'news';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'image_name',
        'image_path',
        'content',
        'status'
    ];

}
