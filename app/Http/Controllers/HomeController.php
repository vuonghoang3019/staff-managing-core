<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;

class HomeController extends FrontendController
{
    private $slider;
    private $about;

    public function __construct(Slider $slider, About $about)
    {
        parent::__construct();
        $this->slider = $slider;
        $this->about = $about;
    }

    public function index()
    {
        $sliders = $this->slider->newQuery()->where('status', 1)->limit(3)->get();
        $abouts = $this->about->newQuery()->where('status', 1)->limit(2)->get();
        return view('index', compact('sliders', 'abouts'));
    }

}
