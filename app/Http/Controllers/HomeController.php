<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use App\Models\Student;
use App\Models\User;

class HomeController extends FrontendController
{
    private $slider;
    private $about;
    private $student;
    private $user;

    public function __construct(Slider $slider, About $about,Student $student,User $user)
    {
        parent::__construct();
        $this->slider = $slider;
        $this->about = $about;
        $this->student = $student;
        $this->user = $user;
    }

    public function index()
    {
        $sliders = $this->slider->newQuery()->where('status', 1)->limit(3)->get();
        $abouts = $this->about->newQuery()->where('status', 1)->limit(2)->get();
        $students = $this->student->newQuery()->get()->pluck('id');
        $users = $this->user->newQuery()->get()->pluck('id');
        return view('index', compact('sliders', 'abouts','students','users'));
    }

}
