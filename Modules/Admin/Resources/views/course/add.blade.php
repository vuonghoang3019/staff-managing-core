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
        @include('admin::components.headerContent',['name' => 'Course', 'key' => 'Add Course'])
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill col-md-4" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                   role="tab" aria-controls="nav-home" aria-selected="true">Khóa học</a>
                                <a class="nav-item nav-link  col-md-4" id="nav-profile-tab" data-toggle="tab"
                                   href="#nav-profile"
                                   role="tab" aria-controls="nav-profile" aria-selected="false">Giá</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active " id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                    <a href="{{ route('course.index') }}" class="btn btn-primary">Quay lại</a>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nhập tên khóa học</label>
                                                <input type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       id="name"
                                                       placeholder="Nhập tên danh mục" name="name"
                                                       value="{{ old('name') }}">
                                                @error('name')
                                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label for="Password">Chọn trình độ</label>
                                                <br>
                                                <select name="grade_id[]"
                                                        class="form-control select2_init @error('grade_id') is-invalid @enderror"
                                                        multiple>
                                                    <option value=""></option>
                                                    @foreach ($grades as $grade)
                                                        <option
                                                            value="{{ $grade->id }}" {{ old('grade_id') }}>{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('grade_id')
                                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group ">
                                                <label for="description">Mô tả</label>
                                                <textarea class="form-control" id="description" name="description"
                                                          rows="3">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description">Chọn ảnh</label>
                                                <div class="drop-zone ">
                                                    <span
                                                        class="drop-zone__prompt @error('image_path') is-invalid @enderror">Drop file here or click to upload
                                                    </span>
                                                    <input type="file" name="image_path" class="drop-zone__input">
                                                </div>
                                                @error('image_path')
                                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="tab-pane fade " id="nav-profile" role="tabpanel"
                                 aria-labelledby="nav-profile-tab">
                                <form action="{{ route('course.storePrice') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                    <a href="{{ route('course.index') }}" class="btn btn-primary">Quay lại</a>
                                    <div class="col-md-3 mt-3 ">
                                        <div class="form-group">
                                            <select class="form-control @error('course_id') is-invalid @enderror" name="course_id">
                                                <option value="">---Mời bạn chọn khóa học---</option>
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('course_id')
                                            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12 table-responsive">
                                            <table class="table table-bordered table-hover table-sortable"
                                                   id="tab_logic">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        Tên
                                                    </th>
                                                    <th class="text-center">
                                                        Giá
                                                    </th>
                                                    <th class="text-center">
                                                        Buổi
                                                    </th>
                                                    <th class="text-center">
                                                        Khuyến mại
                                                    </th>
                                                    <th class="text-center">
                                                        Mô tả
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach(config('date.dateOfYear') as $year)
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="name[]" placeholder='{{ $year }}' value="{{ $year }}" readonly style="background-color: #fff" class="form-control"/>
                                                        </td>
                                                        <td>
                                                            <input type="number" name='price[]' min="0" placeholder='0'  class="form-control"/>
                                                        </td>
                                                        <td>
                                                            <input type="number" name='lesson[]' min="0" placeholder='0'  class="form-control"/>
                                                        </td>
                                                        <td>
                                                            <input type="number" name='sale[]' min="0" placeholder='0' max="100%" class="form-control"/>
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" name="description[]" ></textarea>
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
    <script src="{{ asset('admins/assets/js/upload.js') }}"></script>
    <script src="{{ asset('admins/assets/js/add.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script>
        // CKEDITOR.replace( 'description');
        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        });
    </script>
@endsection
