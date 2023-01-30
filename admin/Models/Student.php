<?php

namespace App\Models;

use App\Models\Attributes\IsActiveAttributes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;
    use IsActiveAttributes;

    protected $table = 'student';

    protected $primaryKey = 'id';

    protected $fillable = [
        'code', 'name', 'birthday', 'sex', 'nation','classroom_id',
        'is_active', 'email', 'password', 'phone',
        'image_path', 'image_name', 'code_reset', 'code_time',
        'code_active', 'time_active'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

}
