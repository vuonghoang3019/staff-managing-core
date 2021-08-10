<?php

namespace Backend\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Backend\Http\Requests\Role\RoleRequestAdd;
use Backend\Traits\DeleteTrait;

class AdminRoleController extends FrontendController
{
    private $role;

    private $permission;

    use DeleteTrait;

    public function __construct(Role $role, Permission $permission)
    {
        parent::__construct();
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->paginate(5);
        return view('backend::role.index',compact('roles'));
    }

    public function create()
    {
        $permissions = $this->permission->newQuery()->with('child')->where('parent_id',0)->get();
        return view('backend::role.create',compact('permissions'));
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

    public function edit($id)
    {
        $roleEdit = $this->role->findOrFail($id);
        $permissions = $this->permission->newQuery()
            ->with('child')
            ->where('parent_id',0)
            ->get();
        $roleCheck = $roleEdit->permission_role;
        return view('backend::role.edit',compact('permissions','roleEdit','roleCheck'));
    }

    public function update(RoleRequestAdd $request ,$id)
    {
        $roleEdit = $this->role->findOrFail($id);
        $dataRole = [
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description
        ];
        $roleEdit->update($dataRole);
        $roleEdit->permission_role()->sync($request->permissionID);
        return redirect()->back()->with('success','Cập nhật thành công');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->role);
    }
}
