<?php

namespace admin\Http\Controllers;

use admin\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;
use admin\Http\Requests\Role\RoleRequestAdd;


class AdminRoleController extends FrontendController
{
    private $roleRepo;

    public function __construct(RoleRepositoryInterface $roleRepo)
    {
        parent::__construct();

        $this->roleRepo = $roleRepo;
    }

    public function index()
    {
        $roles = $this->roleRepo->paginate();
        return view('admin::role.index',compact('roles'));
    }

    public function create()
    {
        $permissions = $this->roleRepo->getPermission();
        return view('admin::role.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $dataRole = [
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description
        ];
        $roleAdd = $this->roleRepo->create($dataRole);
        $roleAdd->permission_role()->attach($request->permissionID);
        return redirect()->back()->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
        $roleEdit = $this->roleRepo->detail($id);
        $permissions = $this->roleRepo->getPermission();
        $roleCheck = $roleEdit->permission_role;
        return view('admin::role.edit',compact('permissions','roleEdit','roleCheck'));
    }

    public function update(RoleRequestAdd $request ,$id)
    {
        $dataRole = [
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description
        ];
        $roleEdit = $this->roleRepo->update($id, $dataRole);
        $roleEdit->permission_role()->sync($request->permissionID);
        return redirect()->back()->with('success','Cập nhật thành công');
    }

    public function delete($id)
    {
        return $this->roleRepo->delete($id);
    }
}
