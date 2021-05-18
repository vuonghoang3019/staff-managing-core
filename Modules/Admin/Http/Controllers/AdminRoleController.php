<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Role;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\RoleRequestAdd;
use Modules\Admin\Traits\DeleteTrait;

class AdminRoleController extends Controller
{
    private $role;
    use DeleteTrait;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role->paginate(5);
        return view('admin::role.index',compact('roles'));
    }

    public function create()
    {
        return view('admin::role.create');
    }

    public function store(RoleRequestAdd $request)
    {
        $this->role->name = $request->name;
        $this->role->description = $request->description;
        $this->role->save();
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
