@extends('admin::layouts.master')
@section('title')
    <title>Add Grade</title>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Grade', 'key' => 'Add grade'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('grade.store') }}" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="name">Nhập danh mục</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               placeholder="Nhập tên mức độ" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="description">Nhập mô tả</label>
                        <textarea class="form-control "
                                  id="text" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </section>
    </div>
@endsection
