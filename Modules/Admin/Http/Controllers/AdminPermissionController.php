<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Routing\Controller;

class AdminPermissionController extends Controller
{
    private $permission;
    private $role;

    public function __construct(Permission $permission, Role $role)
    {
        $this->permission = $permission;
        $this->role = $role;
    }

    public function index()
    {
        $permissions = $this->permission->paginate(5);
        $roles = $this->role->all();
        return view('admin::permission.index', compact('permissions', 'roles'));
    }

    public function store()
    {

    }

}
