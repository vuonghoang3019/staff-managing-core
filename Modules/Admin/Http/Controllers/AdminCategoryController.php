<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        $categoryParent = $this->category->where('parent_id',0)->with('categoryChild')->get();
        return view('admin::category.add',compact('categoryParent'));
    }
    public function store(CategoryRequestAdd $request)
    {
        $this->category->name = $request->name;
        $this->category->slug = Str::slug($request->slug);
        $this->category->parent_id = $request->parent_id;
        $this->category->save();
        return redirect()->back();
    }
    public function action(Request $request, $id)
    {
        $this->category->find($id);
        $this->category->status = $request->status == 1 ? 0 : 1;
        DB::connection()->enableQueryLog();
        $this->category->save();
        $queries = DB::getQueryLog();
        dd($queries);
    }
}
