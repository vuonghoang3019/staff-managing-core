<?php

namespace App\Models;

use App\Models\Attributes\IsActiveAttributes;

class Contact extends BaseModel
{
    use IsActiveAttributes;

    protected $table = 'contact';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name_parent',
        'phone',
        'name_student',
        'email',
        'content','is_active'];


}
