<?php

namespace Backend\Repositories\Role;

use App\Models\Permission;
use App\Models\Role;
use Backend\Repositories\BaseRepository;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{

    public function getModel()
    {
        return Role::class;
    }

    public function paginate()
    {
        return $this->model->paginate(5);
    }

    public function getPermission()
    {
        return Permission::with('child')->where('parent_id',0)->get();
    }
}
