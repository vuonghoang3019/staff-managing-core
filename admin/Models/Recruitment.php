<?php

namespace Admin\Models;

class Recruitment extends BaseModel
{

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
