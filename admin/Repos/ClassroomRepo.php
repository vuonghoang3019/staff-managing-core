<?php

namespace Admin\Repos;

use Admin\Http\Resources\BaseCollection;
use Admin\Models\Classroom;
use Illuminate\Container\Container as Application;

class ClassroomRepo extends BaseRepo
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    public function model(): string
    {
        return Classroom::class;
    }

    public function index()
    {
        $query = $this->baseQuery();

        $query = $query->select(Classroom::$_All);

        $response = $this->pagination($query);

        return $this->baseIndex(new BaseCollection($response));
    }
}
