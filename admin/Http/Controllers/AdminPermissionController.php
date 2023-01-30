<?php

namespace admin\Http\Controllers;

use admin\Http\Requests\Permission\PermissionRequestAdd;
use admin\Repositories\Permission\PermissionRepositoryInterface;

class AdminPermissionController extends FrontendController
{
    private $permissionRepo;

    public function __construct(PermissionRepositoryInterface $permissionRepo)
    {
        parent::__construct();
        $this->permissionRepo = $permissionRepo;
    }

    public function index()
    {
        $permissions = $this->permissionRepo->paginate();
        $modules = $this->permissionRepo->getModules();
        return view('admin::permission.index', compact('permissions', 'modules'));
    }

    public function store(PermissionRequestAdd $request)
    {
        $dataAdd = [
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => 0,
        ];
        $permissions = $this->permissionRepo->create($dataAdd);
        foreach ($request->module_child as $value)
        {
            $data = [
                'name' => $value,
                'description' => $value,
                'parent_id' => $permissions->id,
                'value' => $value.'_'.$request->name
            ];
            $this->permissionRepo->create($data);
        }
        return redirect()->back()->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
        $permissionEdit = $this->permissionRepo->detail($id);
        $permissionCheck = $permissionEdit->child;
        $modules = $this->permissionRepo->getModules();
        return view('admin::permission.edit',compact('permissionEdit','modules','permissionCheck'));
    }

    public function update(PermissionRequestAdd $request, $id)
    {
        $this->permissionRepo->deleteParent($id);
        $dataUpdate = [
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => 0,
        ];
        $this->permissionRepo->update($id, $dataUpdate);
        foreach ($request->module_child as $value)
        {
            $dataChild = [
                'name' => $value,
                'description' => $value,
                'parent_id' => $request->id,
                'value' => $value.'_'.$request->name
            ];
            $this->permissionRepo->create($dataChild);
        }
        return redirect()->back()->with('success','Cập nhật thành công');
    }

    public function delete($id)
    {
        return $this->permissionRepo->delete($id);
    }

}
