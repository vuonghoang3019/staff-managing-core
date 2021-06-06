@extends('admin::layouts.master')
@section('title')
    <title>Contact</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Contact', 'key' => 'List Contact'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên phụ huynh</th>
                                <th scope="col">Tên học sinh</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                                {{--th scope="col">Status</th>--}}
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($contactsView)  )
                                @foreach($contactsView as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $data->name_parent }}</td>
                                        <td>{{ $data->name_student }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>

                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactDetail{{ $data->id }}">
                                                View
                                            </button>
                                            @include('admin::contact.modal')

                                            <a href=""
                                               data-url=""
                                               class="btn btn-danger action-delete">Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $stt++; ?>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12 float-right">
                        {{ $contactsView->links('pagination::bootstrap-4') }}
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
