<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\RoleRequestAdd;
use Modules\Admin\Traits\DeleteTrait;

class AdminRoleController extends Controller
{
    private $role;
    private $permission;
    use DeleteTrait;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->paginate(5);
        return view('admin::role.index',compact('roles'));
    }

    public function create()
    {
        $permissions = $this->permission->newQuery()->with('child')->where('parent_id',0)->get();
        return view('admin::role.add',compact('permissions'));
    }

    public function store(Request $request)
    {
        $dataRole = [
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description
        ];
        $roleAdd = $this->role->create($dataRole);
        $roleAdd->permission_role()->attach($request->permissionID);
        return redirect()->back()->with('success','Thêm mới thành công');
    }

    public function update(RoleRequestAdd $request ,$id)
    {
        $roleUpdate = $this->role->findOrFail($id);
        $roleUpdate->name = $request->name;
        $roleUpdate->description = $request->description;
        $roleUpdate->save();
        return redirect()->back()->with('success','Cập nhật thành công');

    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->role);
    }


}
