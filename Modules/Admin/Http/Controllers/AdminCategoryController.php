<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Admin\Http\Requests\CategoryRequestAdd;
use Modules\Admin\Components\Recursive;
use Modules\Admin\Traits;

class AdminCategoryController extends Controller
{
    use Traits\DeleteTrait;
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $Recursive = new Recursive($data);
        $htmlOption = $Recursive->Recursive($parent_id);
        return $htmlOption;
    }

    public function index()
    {
        $categories = $this->category->orderBy('id','desc')->paginate(5);
        return view('admin::category.index', compact('categories'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parent_id = '');
        return view('admin::category.add', compact('htmlOption'));
    }

    public function store(CategoryRequestAdd $request)
    {
        $this->category->name = $request->name;
        $this->category->slug = Str::slug($request->slug);
        $this->category->parent_id = $request->parent_id;
        $this->category->save();
        return redirect()->back()->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
        $categoryEdit = $this->category->find($id);
        $htmlOption = $this->getCategory($categoryEdit->parent_id);
        return view('admin::category.edit', compact('htmlOption', 'categoryEdit'));
    }

    public function update(CategoryRequestAdd $request, $id)
    {
        $categoryUpdate = $this->category->find($id);
        $categoryUpdate->name = $request->name;
        $categoryUpdate->slug = Str::slug($request->name);
        $categoryUpdate->parent_id = $request->parent_id;
        $categoryUpdate->save();
        return redirect()->back()->with('success','Thêm mới thành công');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->category);
    }

    public function action($id)
    {
        $categoryUpdate = $this->category->find($id);
        $categoryUpdate->status = $categoryUpdate->status ? 0 : 1;
        $categoryUpdate->save();
        return redirect()->back()->with('success','Thêm mới thành công');
    }
}
