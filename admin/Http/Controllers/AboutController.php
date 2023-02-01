<?php

namespace admin\Http\Controllers;

use Admin\Models\About;
use admin\Http\Requests\About\AboutRequestAdd;
use admin\Traits\DeleteTrait;
use admin\Traits\StorageImageTrait;

class AboutController extends FrontendController
{
    private $aboutRepo;
    use DeleteTrait;
    use StorageImageTrait;
    public function __construct(AboutRepositoryInterface $aboutRepo)
    {
        parent::__construct();
        $this->aboutRepo = $aboutRepo;
    }

    public function index()
    {
        $abouts = $this->aboutRepo->paginate();
        return view('admin::about.index',compact('abouts'));
    }

    public function create()
    {
        return view('admin::about.create');
    }

    public function store(AboutRequestAdd $request)
    {
        $dataAbout = [
            'title' => $request->title,
            'content' => $request->Content
        ];
        $aboutUpload = $this->storageTraitUpload($request,'image_path','about');
        if (!empty($aboutUpload)) {
            $dataAbout['image_name'] = $aboutUpload['file_name'];
            $dataAbout['image_path'] = $aboutUpload['file_path'];
        }
       $this->aboutRepo->create($dataAbout);
        return redirect()->back()->with('success','Thêm dữ liệu thành công');
    }

    public function edit($id)
    {
        $aboutEdit = $this->aboutRepo->detail($id);
        return view('admin::about.edit',compact('aboutEdit'));
    }

    public function update(AboutRequestAdd $request, $id)
    {
        $aboutUpdate = $this->aboutRepo->detail($id);
        $dataAbout = [
            'title' => $request->title,
            'content' => $request->Content
        ];
        $aboutUpload = $this->storageTraitUpload($request, 'image_path', 'about');
        if (!empty($aboutUpload)) {
            unlink(substr($aboutUpdate->image_path, 1));
            $dataAbout['image_name'] = $aboutUpload['file_name'];
            $dataAbout['image_path'] = $aboutUpload['file_path'];
        }
        $this->aboutRepo->update($id, $dataAbout);
        return redirect()->back()->with('success','Cập nhật dữ liệu thành công');
    }

    public function delete($id)
    {
        $aboutUpdate = $this->aboutRepo->detail($id);
        unlink(substr($aboutUpdate->image_path, 1));
        return $this->aboutRepo->delete($id);
    }

    public function action($id)
    {
        $this->aboutRepo->action($id);
        return redirect()->back()->with('success','Cập nhật trạng thái thành công');
    }

}