<?php

namespace Backend\Repositories\Permission;

use Backend\Repositories\RepositoryInterface;

interface PermissionRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getModules();

    public function deleteParent($id);
}
