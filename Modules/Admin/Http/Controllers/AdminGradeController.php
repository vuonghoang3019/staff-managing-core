<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Grade;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminGradeController extends Controller
{
    private $grade;
    public function __construct(Grade $grade)
    {
        $this->grade = $grade;
    }

    public function index()
    {
        $grades = $this->grade->paginate(10);
        return view('admin::grade.index',compact('grades'));
    }
    public function create()
    {
        return view('admin::grade.add');
    }
}
