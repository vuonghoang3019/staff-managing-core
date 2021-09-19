<?php

namespace Frontend\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    private $slider;
    private $about;
    private $student;
    private $user;

    public function __construct(Slider $slider, About $about, Student $student, User $user)
    {
        parent::__construct();
        $this->slider = $slider;
        $this->about = $about;
        $this->student = $student;
        $this->user = $user;
    }

    public function index()
    {
        $sliders = $this->slider->newQuery()->where('is_active', 1)->limit(3)->get();
        $abouts = $this->about->newQuery()->where('is_active', 1)->limit(2)->get();
        $students = $this->student->newQuery()->get()->pluck('id');
        $users = $this->user->newQuery()->get()->pluck('id');
        return view('frontend::index', compact('sliders', 'abouts', 'students', 'users'));
    }

    public function changeLanguage(Request $request)
    {
        $lang = $request->language;
        $language = config('app.locale');
        if ($lang == 'en') {
            $language = 'en';
        }
        if ($lang == 'vi') {
            $language = 'vi';
        }
        session()->put('language', $language);
        return redirect()->back();
    }

}
