<?php

namespace Admin\Repos;

use Admin\Http\Resources\Course\CourseCollection;
use Admin\Models\Course;
use Illuminate\Container\Container as Application;
use Admin\General\Course as CourseConfig;

class CourseRepo extends BaseRepo
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->responseSingle = CourseConfig::NAME;
        $this->responseList = CourseConfig::LIST;
    }

    public function model(): string
    {
        return Course::class;
    }

    public function index()
    {
        $query = $this->baseQuery();

        $query = $query->select(Course::$_All);

        $response = new CourseCollection($this->pagination($query));

        return $this->baseIndex($response);
    }

    public function createCourse()
    {
        try {
            return $this->baseCreate([
                'Grades' => '',
                'Course' => '',
            ]);
        }
        catch (\Exception $exception) {
            return $this->response->serverError($exception->getMessage());
        }
    }
}
