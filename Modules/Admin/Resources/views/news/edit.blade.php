@extends('admin::layouts.master')
@section('title')
    <title>About</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/assets/css/upload.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'About', 'key' => 'Edit About'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('news.update',['id' => $newsEdit->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-success">Submit</button>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Nhập tiêu đề</label>
                                <textarea class="form-control" name="title" rows="3" id="title">{{ old('title',$newsEdit->title) }}</textarea>
                                @error('title')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="name">Chọn ảnh đại diện</label>
                                <div class="drop-zone ">
                                    <span class="drop-zone__prompt @error('image_path') is-invalid @enderror">Drop file here or click to upload</span>
                                    <input type="file" name="image_path" class="drop-zone__input" value="{{ $newsEdit->image_path }}">
                                </div>
                                @error('image_path')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Content">Viết nội dung</label>
                                <textarea class="form-control @error('Content') is-invalid @enderror" name="Content" id="Content">{{ old('Content',$newsEdit->content) }}</textarea>
                                @error('content')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>


    </div>

@endsection
@section('js')
    <script src="{{ asset('admins/assets/js/upload.js') }}"></script>
    <script>
        CKEDITOR.replace( 'title');
        CKEDITOR.replace( 'Content');
        {{--CKEDITOR.replace( 'Content', {--}}
        {{--    filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',--}}
        {{--} );--}}
    </script>
    @include('ckfinder::setup')

@endsection
