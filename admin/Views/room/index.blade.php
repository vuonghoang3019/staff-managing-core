@extends('admin::master.master')
@section('title')
    <title>Phòng học</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'Phòng học', 'key' => 'Danh sách phòng'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('room.create') }}" class="btn btn-success">Thêm</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Description</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($rooms))
                                @foreach($rooms as $room)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $room->name }}</td>
                                        <td>{{ $room->code }}</td>
                                        <td>{{ $room->description }}</td>
                                        <td>
                                            {!! $room->is_active !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('room.edit',['id' => $room->id]) }}"
                                               class="btn btn-default">Edit</a>
                                            <a href=""
                                               data-url="{{ route('room.delete',['id' => $room->id]) }}"
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
                        {{ $rooms->links('pagination::bootstrap-4') }}
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
