<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private $category;
    private $user;

    public function __construct(Category $category, User $user)
    {
        $this->category = $category;
        $this->user = $user;
    }

    public function index()
    {
        $categories = Category::with(['categoryChild'])->where('parent_id', 0)->limit(6)->get();
        $users = $this->user->newQuery()->with(['grades'])->where('status',1)->get();
        return view('teacher', compact('categories','users'));
    }
}
