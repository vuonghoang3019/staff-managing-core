<?php

namespace Frontend\Http\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        return view('index');
    }
}
