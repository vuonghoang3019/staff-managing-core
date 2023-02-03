<?php

namespace Admin\Repos;

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

    public function search()
    {
        $query = $this->baseQuery();

        $query = $query->select(Classroom::$_All);

        return $this->pagination($query);
    }
}
