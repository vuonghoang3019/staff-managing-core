<?php

namespace Backend\Repositories\Permission;

use App\Models\Module;
use App\Models\Permission;
use Backend\Repositories\BaseRepository;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    public function getModel()
    {
        return Permission::class;
    }

    public function paginate()
    {
        return $this->model->newQuery()->with(['child'])->where('parent_id',0)->paginate(10);
    }

    public function getModules()
    {
        return Module::all();
    }

    public function deleteParent($id)
    {
        return $this->model->newQuery()->where('parent_id',$id)->delete();
    }
}
