<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\User;

class AboutController extends Controller
{
    private $about;
    private $user;

    public function __construct(About $about, User $user)
    {
        $this->about = $about;
        $this->user = $user;
    }

    public function index()
    {
        $abouts = $this->about->newQuery()->where('status', 1)->limit(2)->get();
        $users = $this->user->newQuery()->where('status',1)->where('is_check',1)->get();
        return view('about', compact('abouts','users'));
    }
}
