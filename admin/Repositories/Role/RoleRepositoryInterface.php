<?php

namespace admin\Repositories\Role;

use admin\Repositories\RepositoryInterface;

interface RoleRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getPermission();
}
