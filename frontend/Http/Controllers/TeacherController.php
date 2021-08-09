<?php

namespace Frontend\Http\Controllers;

use App\Models\Role;
use App\Models\User;

class TeacherController extends FrontendController
{
    private $user;
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->newQuery()->with(['grades'])->where('is_active',1)->paginate(20);
        return view('frontend::teacher.teacher', compact('users'));
    }

    public function getTypeTeacher($is_check)
    {
//        if ($is_check == 1)
//        {
//            $users = $this->user->newQuery()->with(['grades'])->where('status',1)->where('is_check','1')->get();
//        }
//        else
//        {
//            $users = $this->user->newQuery()->with(['grades'])->where('status',1)->where('is_check','0')->get();
//        }
        $users = $this->user->newQuery()->with(['grades'])
            ->where('is_active',1)
            ->when($is_check,function ($query) use ($is_check){
                $query->where('is_check','=',$is_check);
            })
            ->get();
        return view('frontend::teacher.typeTeacher',compact('users'));
    }
}
