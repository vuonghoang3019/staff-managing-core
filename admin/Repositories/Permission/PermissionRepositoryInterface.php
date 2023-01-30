<?php

namespace Admin\Repositories\Permission;

use Admin\Repositories\RepositoryInterface;

interface PermissionRepositoryInterface extends RepositoryInterface
{
    public function paginate();

    public function getModules();

    public function deleteParent($id);
}
