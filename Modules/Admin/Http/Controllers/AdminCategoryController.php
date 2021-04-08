<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\CategoryRequestAdd;

class AdminCategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->paginate(5);
        return view('admin::category.index',compact('categories'));
    }
    public function create()
    {
        return view('admin::category.add');
    }
    public function store(CategoryRequestAdd $request)
    {
        dd($request->all());
    }
}
