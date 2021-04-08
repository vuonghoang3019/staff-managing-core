@extends('admin::layouts.master')
@section('title')
    <title>Category</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Category', 'key' => 'List Category'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('category.create') }}" class="btn btn-success">ADD</a>
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
                            <?php $stt = 0 ?>
                            @foreach($categories as $data)
                                <tr>
                                    <th scope="row">{{ $stt }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <a href="{{ route('categories.action',['id' => $data->id]) }}"
                                           class="{{ $data->status == 1 ? "btn btn-primary" : 'btn btn-default'}}"
                                        >
                                            {{ $data->status == 1 ? 'Show' : 'Not Show' }}
                                        </a>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <?php $stt++; ?>
                            @endforeach
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
