<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends FrontendController
{
    public function index()
    {
        parent::__construct();
        $recruitments= Recruitment::where('status',1)->limit(6)->get();
        return view('recruitment.recruitment',compact('recruitments'));
    }


    public function detail($id)
    {
        $recruitmentDetail = Recruitment::all()->find($id)->where('status',1)->first();
        return view('recruitment.recruitmentDetail',compact('recruitmentDetail'));
    }
}
