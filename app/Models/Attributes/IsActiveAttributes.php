<?php

namespace App\Models\Attributes;

use App\Configs\Classroom as ClassroomConfig;

trait IsActiveAttributes
{
    public function getIsActiveAttribute($value)
    {
        if (in_array($value,ClassroomConfig::CLASSROOM_STATUS)) return 'N\A';

        $status = ClassroomConfig::CLASSROOM_STATUS[$value];

        $class = $status['class'];
        $name = $status['name'];

        return "<span class='$class'>$name</span>";
    }

}
