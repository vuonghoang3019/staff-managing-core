@extends('admin::Modules.Admin.Resources.views.master.master')
@section('title')
    <title>Category</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'Category', 'key' => 'List Category'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @can('category-add')
                        <div class="col-md-12">
                            <a href="{{ route('category.create') }}" class="btn btn-success">ADD</a>
                        </div>
                    @endcan
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
                            <?php $stt = 0 ?>
                            @if(isset($categories)  )
                                @foreach($categories as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <a href="{{ route('category.action',['id' => $data->id]) }}"
                                               class=" {{ $data->getStatus($data->status)['class'] }}">
                                                {{ $data->getStatus($data->status)['name'] }}
                                            </a>
                                        </td>
                                        <td>
                                            @can('category-update')
                                                <a href="{{ route('category.edit',['id' => $data->id]) }}"
                                                   class="btn btn-default">Edit</a>
                                            @endcan
                                            @can('category-delete')
                                                <a href=""
                                                   data-url="{{ route('category.delete',['id' => $data->id]) }}"
                                                   class="btn btn-danger action-delete">Delete
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                    <?php $stt++; ?>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12 float-right">
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('admins/assets/delete.js') }}"></script>
@endsection
