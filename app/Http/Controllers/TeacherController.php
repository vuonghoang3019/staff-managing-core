<?php

namespace App\Http\Controllers;

use App\Models\User;

class TeacherController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->newQuery()->with(['grades'])->where('status',1)->get();
        return view('teacher', compact('categories'));
    }
}
