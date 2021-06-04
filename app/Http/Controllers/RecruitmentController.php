<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function index()
    {
        $recruitments= Recruitment::where('status',1)->limit(6)->get();
        $categories = Category::with(['categoryChild'])->where('parent_id',0)->limit(6)->get();
        return view('recruitment',compact('categories','recruitments'));
    }


    public function detail($id)
    {
        $recruitmentDetail = Recruitment::all()->find($id)->where('status',1)->first();
        $categories = Category::with(['categoryChild'])->where('parent_id',0)->limit(6)->get();
        return view('recruitmentDetail',compact('categories','recruitmentDetail'));
    }
}
