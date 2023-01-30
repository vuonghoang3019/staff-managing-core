<?php

namespace Admin\Repositories\Course;

use App\Models\Course;
use App\Models\Grade;
use Admin\Repositories\BaseRepository;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface
{
    public function getModel()
    {
        return Course::class;
    }

    public function paginate()
    {
        return $this->model->newQuery()->with(['course_grade', 'price'])->orderBy('id', 'desc')->paginate(5);
    }

    public function getGrades()
    {
        return Grade::all();
    }

    public function getCourses()
    {
        return Course::with(['price'])->get();
    }
}
