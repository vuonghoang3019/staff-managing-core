<?php

namespace Admin\Repositories\Classroom;

use Admin\Repositories\RepositoryInterface;

interface ClassroomRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getCourses();
}
