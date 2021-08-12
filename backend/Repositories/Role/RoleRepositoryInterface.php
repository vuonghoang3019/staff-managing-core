<?php

namespace Backend\Repositories\Role;

use Backend\Repositories\RepositoryInterface;

interface RoleRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getPermission();
}
