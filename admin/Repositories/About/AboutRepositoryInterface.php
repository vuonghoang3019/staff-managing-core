<?php

namespace admin\Repositories\About;

use admin\Repositories\RepositoryInterface;

interface AboutRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
