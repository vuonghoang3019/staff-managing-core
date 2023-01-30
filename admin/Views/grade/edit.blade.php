@extends('backend::master.master')
@section('title')
    <title>Edit Grade</title>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('backend::layouts.headerContent',['name' => 'Grade', 'key' => 'Edit grade'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('grade.update',['id' => $gradeEdit->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('grade.index') }}" class="btn btn-primary">Back</a>
                    <div class="form-group col-md-6">
                        <label for="name">Nhập mức độ</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               placeholder="Nhập tên mức độ" name="name" value="{{ old('name',$gradeEdit->name) }}">
                        @error('name')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="description">Nhập mô tả</label>
                        <textarea class="form-control "
                                  id="text" name="description" rows="3">{{ old('description',$gradeEdit->description) }}</textarea>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
