<?php

namespace Backend\Repositories\Classroom;

use App\Models\Classroom;
use App\Models\Course;
use Backend\Repositories\BaseRepository;

class ClassroomRepository extends BaseRepository implements ClassroomRepositoryInterface
{
    public function getModel()
    {
        return Classroom::class;
    }

    public function paginate()
    {
        return $this->model->newQuery()->with(['course','students'])->paginate(10);
    }

    public function getCourses()
    {
        return Course::all();
    }

}
