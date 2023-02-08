<?php

namespace Admin\Http\Controllers;

use Admin\Repos\CourseRepo;
//use Admin\Repositories\Course\CourseRepositoryInterface;
//use Admin\Repositories\Price\PriceRepositoryInterface;
use Illuminate\Http\Request;
use Admin\Http\Requests\Course\BaseRequest;
use Admin\Http\Requests\Price\PriceRequestAdd;
use Admin\Http\Requests\Course\CourseRequestUpdate;

class CourseController extends BaseController
{

    protected CourseRepo $courseRepo;

    protected $priceRepo;

    public function __construct(CourseRepo $courseRepo)
    {
        $this->courseRepo = $courseRepo;
    }

    public function index()
    {
        return $this->courseRepo->index();
    }

    public function create()
    {
        return $this->courseRepo->createCourse();
    }

    public function store(BaseRequest $request)
    {
//        $dataCourse = [
//            'name'        => $request->name,
//            'description' => $request->description
//        ];
//        $courseUpload = $this->storageTraitUpload($request, 'image_path', 'course');
//        if (!empty($courseUpload)) {
//            $dataCourse['image_name'] = $courseUpload['file_name'];
//            $dataCourse['image_path'] = $courseUpload['file_path'];
//        }
//        $courseCreate = $this->courseRepo->create($dataCourse);
//        $courseCreate->course_grade()->attach($request->grade_id);
//        return redirect()->back()->with('success', 'Thêm mới thành công');

    }

    public function edit($id)
    {
        $priceEdit = $this->priceRepo->getPrice($id);
        $grades = $this->courseRepo->getGrades();
        $courses = $this->courseRepo->getCourses();
        $courseEdit = $this->courseRepo->detail($id);
        $courseGrade = $courseEdit->course_grade;
        return view('admin::course.edit', compact('courseEdit', 'grades', 'courseGrade', 'courses', 'priceEdit'));
    }

    public function update(CourseRequestUpdate $request, $id)
    {
        $courseEdit = $this->courseRepo->detail($id);
        $dataCourse = [
            'name'        => $request->name,
            'description' => $request->description
        ];
        $courseUpload = $this->storageTraitUpload($request, 'image_path', 'course');
        if (!empty($courseUpload)) {
            unlink(substr($courseEdit->image_path, 1));
            $dataCourse['image_name'] = $courseUpload['file_name'];
            $dataCourse['image_path'] = $courseUpload['file_path'];
        }
        $this->courseRepo->update($id, $dataCourse);
        $courseEdit->course_grade()->sync($request->grade_id);
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {

        $courseEdit = $this->courseRepo->detail($id);
        unlink(substr($courseEdit->image_path, 1));
        return $this->courseRepo->delete($id);
    }

    public function action($id)
    {
        $courseEdit = $this->courseRepo->detail($id);
        $courseEdit->is_active = $courseEdit->is_active ? 0 : 1;
        $courseEdit->save();
        return redirect()->back();
    }

    public function storePrice(Request $request)
    {
        $count = count($request->name);
        for ($i = 0; $i < $count; $i++)
        {
            $names = [
                'course_id'   => $request->course_id,
                'name'        => $request->name[$i],
                'price'       => $request->price[$i],
                'lesson'      => $request->lesson[$i],
                'sale'        => $request->sale[$i],
                'description' => $request->description[$i]
            ];
            $this->priceRepo->create($names);
        }
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function updatePrice(Request $request, $id)
    {
        $this->priceRepo->deletePrice($id);
        $count = count($request->name);
        for ($i = 0; $i < $count; $i++) {
            $names = [
                'course_id'   => $request->course_id,
                'name'        => $request->name[$i],
                'price'       => $request->price[$i],
                'lesson'      => $request->lesson[$i],
                'sale'        => $request->sale[$i],
                'description' => $request->description[$i]
            ];
            $this->priceRepo->create($names);
        }
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }
}
