<?php

namespace Admin\Repositories\Student;

use Admin\Repositories\RepositoryInterface;

interface StudentRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getClassrooms();

    public function search($request);
}
