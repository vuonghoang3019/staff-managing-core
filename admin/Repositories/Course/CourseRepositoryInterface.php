<?php

namespace admin\Repositories\Course;

use admin\Repositories\RepositoryInterface;

interface CourseRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getGrades();

    public function getCourses();
}
