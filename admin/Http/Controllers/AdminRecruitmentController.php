<?php

namespace admin\Http\Controllers;

use admin\Http\Requests\Recruitment\RecruitmentRequestAdd;
use admin\Http\Requests\Recruitment\RecruitmentRequestUpdate;
use admin\Repositories\Recruitment\RecruitmentRepositoryInterface;
use admin\Traits\DeleteTrait;
use admin\Traits\StorageImageTrait;

class AdminRecruitmentController extends FrontendController
{
    private $recruitmentRepo;

    use DeleteTrait;

    use StorageImageTrait;

    public function __construct(RecruitmentRepositoryInterface $recruitmentRepo)
    {
        parent::__construct();
        $this->recruitmentRepo = $recruitmentRepo;
    }

    public function index()
    {
        $recruitments = $this->recruitmentRepo->paginate();
        return view('backend::recruitment.index',compact('recruitments'));
    }

    public function create()
    {
        return view('backend::recruitment.create');
    }

    public function store(RecruitmentRequestAdd $request)
    {
        $dataRecruitment = [
            'title' => $request->title,
            'content' => $request->Content
        ];
        $recruitmentUpload = $this->storageTraitUpload($request,'image_path','recruitment');
        if (!empty($recruitmentUpload)) {
            $dataRecruitment['image_name']= $recruitmentUpload['file_name'];
            $dataRecruitment['image_path'] = $recruitmentUpload['file_path'];
        }
        $this->recruitmentRepo->create($dataRecruitment);
        return redirect()->back()->with('success','Thêm dữ liệu thành công');
    }

    public function edit($id)
    {
        $reEdit = $this->recruitmentRepo->detail($id);
        return view('backend::recruitment.edit',compact('reEdit'));
    }

    public function update(RecruitmentRequestUpdate $request, $id)
    {
        $reEdit = $this->recruitmentRepo->detail($id);
        $dataRecruitment = [
            'title' => $request->title,
            'content' => $request->Content
        ];
        $recruitmentUpload = $this->storageTraitUpload($request, 'image_path', 'recruitment');
        if (!empty($recruitmentUpload)) {
            unlink(substr($reEdit->image_path, 1));
            $dataRecruitment['image_name'] = $recruitmentUpload['file_name'];
            $dataRecruitment['image_path'] = $recruitmentUpload['file_path'];
        }
        $this->recruitmentRepo->update($id, $dataRecruitment);
        return redirect()->back()->with('success','Cập nhật dữ liệu thành công');
    }

    public function delete($id)
    {
        $reEdit = $this->recruitmentRepo->detail($id);
        unlink(substr($reEdit->image_path, 1));
        return $this->recruitmentRepo->delete($id);
    }

    public function action($id)
    {
        $reEdit = $this->recruitmentRepo->detail($id);
        $reEdit->is_active = $reEdit->is_active ? 0 : 1;
        $reEdit->save();
        return redirect()->back()->with('success','Cập nhật trạng thái thành công');
    }
}
