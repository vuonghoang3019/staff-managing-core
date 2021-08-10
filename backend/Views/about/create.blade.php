@extends('backend::master.master')
@section('title')
    <title>About</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/assets/css/upload.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('backend::layouts.headerContent',['name' => 'About', 'key' => ''])
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('about.index') }}" class="btn btn-primary">Back</a>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <textarea class="form-control" name="title" rows="3" id="title">{{ old('title') }}</textarea>
                                @error('title')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="name">Image</label>
                                <div class="drop-zone ">
                                    <span class="drop-zone__prompt @error('image_path') is-invalid @enderror">Drop file here or click to upload</span>
                                    <input type="file" name="image_path" class="drop-zone__input">
                                </div>
                                @error('image_path')
                                <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="Content" id="content">{{ old('content') }}</textarea>
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
