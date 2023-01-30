@extends('admin::master.master')
@section('title')
    <title>Hạn chế</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/assets/css/checkbox.css') }}">
    <style>
        .rounded-list a {
            position: relative;
            display: block;
            padding: .4em .4em .4em 2em;
            *padding: .4em;
            margin: .5em 0;
            background: #ddd;
            color: #444;
            text-decoration: none;
            border-radius: .3em;
            transition: all .3s ease-out;
        }

        .rounded-list a:hover {
            background: #eee;
        }

        .rounded-list a:hover:before {
            transform: rotate(360deg);
        }

        .rounded-list a:before {
            content: counter(li);
            counter-increment: li;
            position: absolute;
            left: -1.3em;
            top: 50%;
            margin-top: -1.3em;
            background: #87ceeb;
            height: 2em;
            width: 2em;
            line-height: 2em;
            border: .3em solid #fff;
            text-align: center;
            font-weight: bold;
            border-radius: 2em;
            transition: all .3s ease-out;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => '', 'key' => 'Danh sách '])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @can('permission-add')
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#actionPermission">
                            Add
                        </button>
                        @include('admin::permission.create')
                    </div>
                    @endcan
                    <div class="col-md-12 mt-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Module</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($permissions))
                                @foreach($permissions as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($data->description,20)}}</td>
                                        <td>
                                            @foreach($data->child as $item)
                                                {{ $item->name }},
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('permission-update')
                                                <a href="{{ route('permission.edit',['id' => $data->id]) }}"
                                                   class="btn btn-default">Edit
                                                </a>
                                            @endcan
                                            @can('permission-delete')
                                                <a href=""
                                                   data-url="{{ route('permission.delete',['id' => $data->id]) }}"
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
                        {{ $permissions->links('pagination::bootstrap-4') }}
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
