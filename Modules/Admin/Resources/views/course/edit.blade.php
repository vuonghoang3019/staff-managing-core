@extends('admin::layouts.master')
@section('title')
    <title>Add course</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/assets/css/upload.css') }}">

@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Course', 'key' => 'Edit Course'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill col-md-4" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                   role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab"
                                   href="#nav-profile"
                                   role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade " id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                <form action="{{ route('course.update',['id' => $courseEdit->id]) }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label for="name">Nhập tên khóa học</label>
                                                <input type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       id="name"
                                                       placeholder="Nhập tên danh mục" name="name"
                                                       value="{{ old('name',$courseEdit->name) }}">
                                                @error('name')
                                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">Chọn trình độ</label>
                                                <select name="grade_id[]"
                                                        class="form-control select2_init @error('grade_id') is-invalid @enderror"
                                                        multiple>
                                                    <option value=""></option>
                                                    @foreach ($grades as $grade)
                                                        <option
                                                            value="{{ $grade->id }}" {{ $courseGrade->contains('id',$grade->id) ? 'selected' : '' }}
                                                            {{ old('grade_id') }}>{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('grade_id')
                                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label for="description">Mô tả</label>
                                                <textarea class="form-control " id="description" name="description"
                                                          rows="3">{{ old('description',$courseEdit->description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="drop-zone ">
                                                    <span
                                                        class="drop-zone__prompt @error('image_path') is-invalid @enderror">Drop file here or click to upload</span>
                                                    <input type="file" name="image_path" class="drop-zone__input">
                                                </div>
                                                @error('image_path')
                                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('course.index') }}" class="btn btn-primary">Quay lại</a>
                                </form>
                            </div>
                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                 aria-labelledby="nav-profile-tab">
                                <form action="{{ route('course.updatePrice',['id' => $courseEdit->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('course.index') }}" class="btn btn-primary">Quay lại</a>
                                    <div class="col-md-3 mt-3 ">
                                        <div class="form-group">
                                            <select class="form-control" name="course_id">
                                                <option value="">---Mời bạn chọn khóa học---</option>
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->id }}"
                                                    @foreach($course->price as $item) {{ $item->course_id == $courseEdit->id ? 'selected' : '' }} @endforeach
                                                    >{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12 table-responsive">
                                            <table class="table table-bordered table-hover table-sortable"
                                                   id="tab_logic">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        Name
                                                    </th>
                                                    <th class="text-center">
                                                        Price
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($priceEdit as $price)
                                                    <tr id='addr0' data-id="0">
                                                        <td data-name="name">
                                                            <input type="text" name="name[]" placeholder='{{ $price->name }}'
                                                                   value="{{ $price->name }}" readonly
                                                                   style="background-color: #fff"
                                                                   class="form-control"/>
                                                        </td>
                                                        <td data-name="mail">
                                                            <input type="number" name='price[]' value="{{ $price->price }}"
                                                                   class="form-control"/>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{ asset('admins/assets/js/add.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/assets/js/upload.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
