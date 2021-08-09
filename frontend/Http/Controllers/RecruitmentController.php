<?php

namespace Frontend\Http\Controllers;

use App\Models\News;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends FrontendController
{
    private $news;
    public function __construct(News $news)
    {
        parent::__construct();
        $this->news = $news;
    }

    public function index()
    {
        $recruitments= Recruitment::where('is_active',1)->limit(6)->get();
        return view('frontend::recruitment.recruitment',compact('recruitments'));
    }


    public function detail($id)
    {
        $news = $this->news->newQuery()->limit(3)->get();
        $recruitmentDetail = Recruitment::all()->find($id)->where('is_active',1)->first();
        return view('frontend::recruitment.recruitmentDetail',compact('recruitmentDetail','news'));
    }
}
