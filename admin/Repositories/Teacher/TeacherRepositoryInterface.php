<?php

namespace Admin\Repositories\Teacher;

use Admin\Repositories\RepositoryInterface;

interface TeacherRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getGrades();

    public function getRoles();
}
