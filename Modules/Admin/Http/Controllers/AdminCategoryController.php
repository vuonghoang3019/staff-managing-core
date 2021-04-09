<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Admin\Http\Requests\CategoryRequestAdd;
use Modules\Admin\Components\Recursive;

class AdminCategoryController extends Controller
{
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
        $categories = $this->category->paginate(5);
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
        return redirect()->back();
    }

    public function edit($id)
    {
        $categoryEdit = $this->category->find($id);
        $htmlOption = $this->getCategory($id);
        return view('admin::category.edit', compact('htmlOption', 'categoryEdit'));
    }

    public function update(Request $request, $id)
    {
//        $categoryUpdate = $this->category->find($id);
//        $categoryUpdate->name = $request->name;
//        $categoryUpdate->slug = Str::slug($request->name);
//        if ($categoryUpdate->parent_id == $request->parent_id)
//        {
//            $categoryUpdate->parent_id = $request->parent_id;
//        }
//        else
//            {
//
//        }
////        DB::connection()->enableQueryLog();
//        $categoryUpdate->save();
////        $queries = DB::getQueryLog();
////        dd($queries);
//        return redirect()->back();
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id
        ];
//        $this->category->find($id)->update()

    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
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
