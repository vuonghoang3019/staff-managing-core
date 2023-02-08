<?php

namespace Admin\Repos;

use Admin\Http\Resources\BaseCollection;
use Admin\Models\Student;
use Illuminate\Container\Container as Application;
use Admin\General\Student as StudentConfig;

class StudentRepo extends BaseRepo
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->responseSingle = StudentConfig::NAME;
        $this->responseList = StudentConfig::LIST;
    }

    public function model(): string
    {
        return Student::class;
    }

    public function index()
    {
        $query = $this->baseQuery();

        $query = $query->select(Student::$_All);

        $response = new BaseCollection($this->pagination($query));

        return $this->baseIndex($this->pagination($query));
    }
}
