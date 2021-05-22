<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
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
        $permissions = $this->permission->newQuery()->with(['child'])->where('parent_id',0)->paginate(5);
        $modules = $this->module->get();
        return view('admin::permission.index', compact('permissions', 'modules'));
    }

    public function store(PermissionRequestAdd $request)
    {
        $dataAdd = [
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => 0,
        ];
        $permissions = $this->permission->create($dataAdd);
        foreach ($request->module_child as $value)
        {
            $data = [
                'name' => $value,
                'description' => $value,
                'parent_id' => $permissions->id,
                'value' => $value.'_'.$request->name
            ];
            $this->permission->create($data);
        }
        return redirect()->back()->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
        $permissionEdit = $this->permission->findOrFail($id);
        $permissionCheck = $permissionEdit->child;
        $modules = $this->module->get();
        return view('admin::permission.edit',compact('permissionEdit','modules','permissionCheck'));
    }

    public function delete($id)
    {
        return $this->deleteModelParent_idTrait($id, $this->permission);
    }

}
