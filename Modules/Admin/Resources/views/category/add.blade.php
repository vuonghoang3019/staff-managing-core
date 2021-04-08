@extends('admin::layouts.master')
@section('title')
    <title>Category</title>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Category', 'key' => 'List Category'])
        <section class="content">
            <div class="container-fluid">
                <form action="{{  route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="name">Nhập danh mục</label>
                        <input type="text" id="name" name="name" placeholder="name" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Chọn danh mục</label>
                        <select class="form-control" name="parent_id">
                            <option value="">---Mời bạn chọn danh mục---</option>
                            <option value="0">Mời bạn chọn danh mục cha</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </section>


    </div>

@endsection
