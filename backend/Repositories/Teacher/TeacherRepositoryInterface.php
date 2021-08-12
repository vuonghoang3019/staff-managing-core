<?php

namespace Backend\Repositories\Teacher;

use Backend\Repositories\RepositoryInterface;

interface TeacherRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getGrades();

    public function getRoles();
}
