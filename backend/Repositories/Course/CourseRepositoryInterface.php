<?php

namespace Backend\Repositories\Course;

use Backend\Repositories\RepositoryInterface;

interface CourseRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getGrades();

    public function getCourses();
}
