<?php

namespace Admin\Repositories\Recruitment;

use Admin\Repositories\RepositoryInterface;

interface RecruitmentRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}

