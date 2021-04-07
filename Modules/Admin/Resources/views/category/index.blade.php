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
                <div class="row">
                    <div class="col-md-12">
                        <a href="" class="btn btn-success">ADD</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
{{--                                <th scope="row">{{ $stt }}</th>--}}
{{--                                <td>{{ $data->name }}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{ route('categories.action',['id' => $data->id]) }}"--}}
{{--                                       class="{{ $data->home == 1 ? "btn btn-primary" : 'btn btn-default'}}"--}}
{{--                                    >--}}
{{--                                        {{ $data->home == 1 ? 'Show' : 'Not Show' }}--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    @can('category-edit')--}}
{{--                                        <a href="{{ route('categories.edit',['id' => $data->id]) }}"--}}
{{--                                           class="btn btn-default">Edit</a>--}}
{{--                                    @endcan--}}
{{--                                    @can('category-delete')--}}
{{--                                        <a href=""--}}
{{--                                           data-url="{{ route('categories.delete',['id' => $data->id]) }}"--}}
{{--                                           class="btn btn-danger action-delete">Delete--}}
{{--                                        </a>--}}
{{--                                    @endcan--}}
{{--                                </td>--}}
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection
