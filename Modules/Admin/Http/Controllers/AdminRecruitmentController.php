<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\RecruitmentRequestAdd;
use Modules\Admin\Http\Requests\update\RecruitmentRequestUpdate;
use Modules\Admin\Traits\DeleteTrait;
use Modules\Admin\Traits\StorageImageTrait;

class AdminRecruitmentController extends FrontendController
{
    private $recruitment;
    use DeleteTrait;
    use StorageImageTrait;
    public function __construct(Recruitment $recruitment)
    {
        parent::__construct();
        $this->recruitment = $recruitment;
    }

    public function index()
    {
        $recruitments = $this->recruitment->paginate(5);
        return view('admin::recruitment.index',compact('recruitments'));
    }

    public function create()
    {
        return view('admin::recruitment.add');
    }

    public function store(RecruitmentRequestAdd $request)
    {
        $this->recruitment->title = $request->title;
        $this->recruitment->content = $request->Content;
        $aboutUpload = $this->storageTraitUpload($request,'image_path','recruitment');
        if (!empty($aboutUpload)) {
            $this->recruitment->image_name = $aboutUpload['file_name'];
            $this->recruitment->image_path = $aboutUpload['file_path'];
        }
        $this->recruitment->save();
        return redirect()->back()->with('success','Thêm dữ liệu thành công');
    }

    public function edit($id)
    {
        $reEdit = $this->recruitment->findOrFail($id);
        return view('admin::recruitment.edit',compact('reEdit'));
    }

    public function update(RecruitmentRequestUpdate $request, $id)
    {
        $reEdit = $this->recruitment->findOrFail($id);
        $reEdit->title = $request->title;
        $reEdit->content = $request->Content;
        $reEditUpload = $this->storageTraitUpload($request, 'image_path', 'recruitment');
        if (!empty($reEditUpload)) {
            $reEdit->image_name = $reEditUpload['file_name'];
            $reEdit->image_path = $reEditUpload['file_path'];
            unlink(substr($reEdit->image_path, 1));
        }
        $reEdit->save();
        return redirect()->back()->with('success','Cập nhật dữ liệu thành công');
    }

    public function delete($id)
    {
        $reEdit = $this->recruitment->findOrFail($id);
        unlink(substr($reEdit->image_path, 1));
        return $this->deleteModelTrait($id, $this->recruitment);
    }


    public function action($id)
    {
        $reEdit = $this->recruitment->findOrFail($id);
        $reEdit->status = $reEdit->status ? 0 : 1;
        $reEdit->save();
        return redirect()->back()->with('success','Cập nhật trạng thái thành công');
    }



}