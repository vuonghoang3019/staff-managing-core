<?php

namespace Backend\Repositories\About;

use Backend\Repositories\RepositoryInterface;

interface AboutRepositoryInterface extends RepositoryInterface
{
    public function paginate();
}
