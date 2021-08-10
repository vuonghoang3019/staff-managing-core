<?php

namespace Backend\Http\Controllers;

use App\Models\About;
use Backend\Http\Requests\AboutRequestAdd;
use Backend\Traits\DeleteTrait;
use Backend\Traits\StorageImageTrait;

class AdminAboutController extends FrontendController
{
    private $about;
    use DeleteTrait;
    use StorageImageTrait;
    public function __construct(About $about)
    {
        parent::__construct();
        $this->about = $about;
    }

    public function index()
    {
        $abouts = $this->about->paginate(5);
        return view('backend::about.index',compact('abouts'));
    }

    public function create()
    {
        return view('backend::about.create');
    }

    public function store(AboutRequestAdd $request)
    {
        $this->about->title = $request->title;
        $this->about->content = $request->Content;
        $aboutUpload = $this->storageTraitUpload($request,'image_path','about');
        if (!empty($aboutUpload)) {
            $this->about->image_name = $aboutUpload['file_name'];
            $this->about->image_path = $aboutUpload['file_path'];
        }
        $this->about->save();
        return redirect()->back()->with('success','Thêm dữ liệu thành công');
    }

    public function edit($id)
    {
        $aboutEdit = $this->about->findOrFail($id);
        return view('backend::about.edit',compact('aboutEdit'));
    }

    public function update(AboutRequestAdd $request, $id)
    {
        $aboutUpdate = $this->about->findOrFail($id);
        $aboutUpdate->title = $request->title;
        $aboutUpdate->content = $request->Content;
        $aboutUpload = $this->storageTraitUpload($request, 'image_path', 'about');
        if (!empty($aboutUpload)) {
            unlink(substr($aboutUpdate->image_path, 1));
            $aboutUpdate->image_name = $aboutUpload['file_name'];
            $aboutUpdate->image_path = $aboutUpload['file_path'];
        }
        $aboutUpdate->save();
        return redirect()->back()->with('success','Cập nhật dữ liệu thành công');
    }

    public function delete($id)
    {
        $aboutUpdate = $this->about->findOrFail($id);
        unlink(substr($aboutUpdate->image_path, 1));
        return $this->deleteModelTrait($id, $this->about);
    }

    public function action($id)
    {
        $aboutUpdate = $this->about->findOrFail($id);
        $aboutUpdate->is_active = $aboutUpdate->is_active ? 0 : 1;
        $aboutUpdate->save();
        return redirect()->back()->with('success','Cập nhật trạng thái thành công');
    }

}
