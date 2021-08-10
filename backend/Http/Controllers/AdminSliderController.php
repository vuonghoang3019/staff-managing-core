<?php

namespace Backend\Http\Controllers;

use App\Models\Slider;
use Backend\Http\Requests\Slider\SliderRequestAdd;
use Backend\Http\Requests\Slider\SliderRequestUpdate;
use Backend\Traits\DeleteTrait;
use Backend\Traits\StorageImageTrait;

class AdminSliderController extends FrontendController
{
    use StorageImageTrait;

    use DeleteTrait;

    private $slider;

    public function __construct(Slider $slider)
    {
        parent::__construct();
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->paginate(5);
        return view('backend::slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend::slider.create');
    }

    public function store(SliderRequestAdd $request)
    {
        $this->slider->name = $request->name;
        $this->slider->description = $request->description;
        $dataUpload = $this->storageTraitUpload($request, 'image_path', 'slider');
        if (!empty($dataUpload)) {
            $this->slider->image_name = $dataUpload['file_name'];
            $this->slider->image_path = $dataUpload['file_path'];
        }
        $this->slider->save();
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        $sliderEdit = $this->slider->findOrFail($id);
        return view('backend::slider.edit', compact('sliderEdit'));
    }

    public function update(SliderRequestUpdate $request, $id)
    {
        $sliderUpdate = $this->slider->findOrFail($id);
        $sliderUpdate->name = $request->name;
        $sliderUpdate->description = $request->description;
        $sliderUpload = $this->storageTraitUpload($request, 'image_path', 'slider');
        if (!empty($sliderUpload)) {
            unlink(substr($sliderUpdate->image_path, 1));
            $sliderUpdate->image_name = $sliderUpload['file_name'];
            $sliderUpdate->image_path = $sliderUpload['file_path'];
        }
        $sliderUpdate->save();
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $sliderDelete = $this->slider->findOrFail($id);
        unlink(substr($sliderDelete->image_path, 1));
        return $this->deleteModelTrait($id, $this->slider);
    }

    public function action($id)
    {
        $sliderAction = $this->slider->findOrFail($id);
        $sliderAction->is_active = $sliderAction->is_active ? 0 : 1;
        $sliderAction->save();
        return redirect()->back();
    }
}
