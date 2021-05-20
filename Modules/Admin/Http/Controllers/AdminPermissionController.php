<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\PermissionRequestAdd;
use Modules\Admin\Traits\DeleteTrait;

class AdminPermissionController extends Controller
{
    use DeleteTrait;
    private $permission;
    private $module;

    public function __construct(Permission $permission, Module $module)
    {
        $this->permission = $permission;
        $this->module = $module;
    }

    public function index()
    {
        $permissions = $this->permission->paginate(5);
        $modules = $this->module->get();
        return view('admin::permission.index', compact('permissions', 'modules'));
    }

    public function store(PermissionRequestAdd $request)
    {
        foreach ($request->module_child as $value)
        {
            $data = [
                'name' => $value . '_' . $request->name,
                'description' => $request->description
            ];
            $this->permission->create($data);
        }
        return redirect()->back()->with('success','Thêm mới thành công');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->permission);
    }

}
