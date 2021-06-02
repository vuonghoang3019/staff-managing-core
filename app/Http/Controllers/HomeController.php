<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $slider;
    private $about;
    private $category;

    public function __construct(Slider $slider, About $about, Category $category)
    {
        $this->slider = $slider;
        $this->about = $about;
        $this->category = $category;
    }

    public function index()
    {
        $sliders = $this->slider->newQuery()->where('status', 1)->limit(3)->get();
        $abouts = $this->about->newQuery()->where('status', 1)->limit(2)->get();
        $categories = $this->category->newQuery()->with(['categoryChild'])->where('parent_id',0)->get();
        return view('index', compact('sliders', 'abouts','categories'));
    }

}
