<?php

namespace admin\Repositories\Student;

use admin\Repositories\RepositoryInterface;

interface StudentRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getClassrooms();

    public function search($request);
}
