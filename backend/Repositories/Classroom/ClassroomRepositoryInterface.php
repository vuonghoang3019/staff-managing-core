<?php

namespace Backend\Repositories\Classroom;

use Backend\Repositories\RepositoryInterface;

interface ClassroomRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getCourses();
}
