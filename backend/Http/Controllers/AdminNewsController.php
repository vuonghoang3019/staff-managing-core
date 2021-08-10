<?php

namespace Backend\Http\Controllers;

use App\Models\News;
use Backend\Http\Requests\News\NewsRequestAdd;
use Backend\Traits\DeleteTrait;
use Backend\Traits\StorageImageTrait;

class AdminNewsController extends FrontendController
{
    private $news;

    use StorageImageTrait;

    use DeleteTrait;

    public function __construct(News $news)
    {
        parent::__construct();
        $this->news = $news;
    }

    public function index()
    {
        $news = $this->news->paginate(5);
        return view('backend::news.index',compact('news'));
    }

    public function create()
    {
        return view('backend::news.create');
    }

    public function store(NewsRequestAdd $request)
    {
        $this->news->title = $request->title;
        $this->news->content = $request->Content;
        $aboutUpload = $this->storageTraitUpload($request,'image_path','news');
        if (!empty($aboutUpload)) {
            $this->news->image_name = $aboutUpload['file_name'];
            $this->news->image_path = $aboutUpload['file_path'];
        }
        $this->news->save();
        return redirect()->back()->with('success','Thêm dữ liệu thành công');
    }

    public function edit($id)
    {
        $newsEdit = $this->news->find($id);
        return view('backend::news.edit',compact('newsEdit'));
    }

    public function update($id, NewsRequestAdd $request)
    {
        $newsUpdate = $this->news->findOrFail($id);
        $newsUpdate->title = $request->title;
        $newsUpdate->content = $request->Content;
        $aboutUpload = $this->storageTraitUpload($request, 'image_path', 'news');
        if (!empty($aboutUpload)) {
            unlink(substr($newsUpdate->image_path, 1));
            $newsUpdate->image_name = $aboutUpload['file_name'];
            $newsUpdate->image_path = $aboutUpload['file_path'];
        }
        $newsUpdate->save();
        return redirect()->back()->with('success','Cập nhật dữ liệu thành công');
    }

    public function delete($id)
    {
        $newsDelete = $this->news->findOrFail($id);
        unlink(substr($newsDelete->image_path, 1));
        return $this->deleteModelTrait($id, $this->news);
    }

    public function action($id)
    {
        $newsUpdate = $this->news->findOrFail($id);
        $newsUpdate->is_active = $newsUpdate->is_active ? 0 : 1;
        $newsUpdate->save();
        return redirect()->back()->with('success','Cập nhật trạng thái thành công');
    }
}
