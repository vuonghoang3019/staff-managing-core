<?php

namespace App\Http\Controllers;

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
        $users = $this->user->newQuery()->with(['grades'])->where('status',1)->get();
        return view('teacher', compact('users'));
    }
}
