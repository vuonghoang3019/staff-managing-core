<?php

namespace App\Configs;

class Classroom {
    const CLASSROOM_STATUS = [
        1 => ['name' => 'Active', 'class' => 'badge bg-secondary'],
        0 => ['name' => 'Inactive', 'class' => 'label label-danger'],
        2 => ['name' => 'Pending', 'class' => 'label label-waring'],
    ];
}
