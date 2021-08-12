<?php

namespace Backend\Repositories\Student;

use Backend\Repositories\RepositoryInterface;

interface StudentRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getClassrooms();

    public function search($request);
}
