<?php

namespace admin\Http\Controllers;

use App\Models\News;
use admin\Http\Requests\News\NewsRequestAdd;
use admin\Repositories\News\NewsRepositoryInterface;
use admin\Traits\DeleteTrait;
use admin\Traits\StorageImageTrait;

class AdminNewsController extends FrontendController
{
    private $newsRepository;

    use StorageImageTrait;

    use DeleteTrait;

    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        parent::__construct();
        $this->newsRepository = $newsRepository;
    }

    public function index()
    {
        $news = $this->newsRepository->paginate();
        return view('backend::news.index',compact('news'));
    }

    public function create()
    {
        return view('backend::news.create');
    }

    public function store(NewsRequestAdd $request)
    {
        $dataNews = [
            'title' => $request->title,
            'content' => $request->Content
        ];
        $newsUpload = $this->storageTraitUpload($request,'image_path','news');
        if (!empty($newsUpload)) {
            $dataNews['image_name'] = $newsUpload['file_name'];
            $dataNews['image_path'] = $newsUpload['file_path'];
        }
        $this->newsRepository->create($dataNews);
        return redirect()->back()->with('success','Thêm dữ liệu thành công');
    }

    public function edit($id)
    {
        $newsEdit = $this->newsRepository->detail($id);
        return view('backend::news.edit',compact('newsEdit'));
    }

    public function update($id, NewsRequestAdd $request)
    {
        $newsUpdate = $this->newsRepository->detail($id);
        $dataNews = [
            'title' => $request->title,
            'content' => $request->Content
        ];
        $newsUpload = $this->storageTraitUpload($request, 'image_path', 'news');
        if (!empty($newsUpload)) {
            unlink(substr($newsUpdate->image_path, 1));
            $dataNews['image_name'] = $newsUpload['file_name'];
            $dataNews['image_path'] = $newsUpload['file_path'];
        }
        $this->newsRepository->update($id, $dataNews);
        return redirect()->back()->with('success','Cập nhật dữ liệu thành công');
    }

    public function delete($id)
    {
        $newsDelete = $this->newsRepository->detail($id);
        unlink(substr($newsDelete->image_path, 1));
        return $this->newsRepository->delete($id);
    }

    public function action($id)
    {
        $newsUpdate = $this->newsRepository->detail($id);
        $newsUpdate->is_active = $newsUpdate->is_active ? 0 : 1;
        $newsUpdate->save();
        return redirect()->back()->with('success','Cập nhật trạng thái thành công');
    }
}
