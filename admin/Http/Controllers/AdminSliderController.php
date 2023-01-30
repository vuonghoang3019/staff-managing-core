<?php

namespace admin\Http\Controllers;

use admin\Http\Requests\Slider\SliderRequestAdd;
use admin\Http\Requests\Slider\SliderRequestUpdate;
use admin\Repositories\Slider\SliderRepositoryInterface;
use admin\Traits\StorageImageTrait;

class AdminSliderController extends FrontendController
{
    use StorageImageTrait;

    private $sliderRepo;

    public function __construct(SliderRepositoryInterface $sliderRepo)
    {
        parent::__construct();
        $this->sliderRepo = $sliderRepo;
    }

    public function index()
    {
        $sliders = $this->sliderRepo->paginate();
        return view('admin::slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin::slider.create');
    }

    public function store(SliderRequestAdd $request)
    {
        $dataSlider = [
            'name'        => $request->name,
            'description' => $request->description
        ];
        $sliderUpload = $this->storageTraitUpload($request, 'image_path', 'slider');
        if (!empty($sliderUpload)) {
            $dataSlider['image_name'] = $sliderUpload['file_name'];
            $dataSlider['image_path'] = $sliderUpload['file_path'];
        }
        $this->sliderRepo->create();
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        $sliderEdit = $this->sliderRepo->detail($id);
        return view('admin::slider.edit', compact('sliderEdit'));
    }

    public function update(SliderRequestUpdate $request, $id)
    {
        $sliderUpdate = $this->sliderRepo->detail($id);
        $dataSlider = [
            'name'        => $request->name,
            'description' => $request->description
        ];
        $sliderUpload = $this->storageTraitUpload($request, 'image_path', 'slider');
        if (!empty($sliderUpload)) {
            unlink(substr($sliderUpdate->image_path, 1));
            $dataSlider['image_name'] = $sliderUpload['file_name'];
            $dataSlider['image_path'] = $sliderUpload['file_path'];
        }
        $this->sliderRepo->update($id, $dataSlider);
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $sliderDelete = $this->sliderRepo->detail($id);
        unlink(substr($sliderDelete->image_path, 1));
        return $this->sliderRepo->delete($id);
    }

    public function action($id)
    {
        $sliderAction = $this->sliderRepo->detail($id);
        $sliderAction->is_active = $sliderAction->is_active ? 0 : 1;
        $sliderAction->save();
        return redirect()->back();
    }
}
