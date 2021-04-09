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
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               placeholder="Nhập tên danh mục" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Chọn danh mục</label>
                        <select class="form-control @error('parent_id') is-invalid @enderror " name="parent_id">
                            <option value="">---Mời bạn chọn danh mục---</option>
                            <option value="0">Mời bạn chọn danh mục cha</option>
                            @foreach($categoryParent as $categoryParentItem)
                                <option value="{{ $categoryParentItem->id }}">{{ $categoryParentItem->name }}</option>
                                @foreach($categoryParentItem->categoryChild as $categoryChildItem)
                                    <option value="{{ $categoryChildItem->id }}">--{{ $categoryChildItem->name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                        @error('parent_id')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </section>


    </div>

@endsection
