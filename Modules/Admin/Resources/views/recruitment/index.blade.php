@extends('admin::layouts.master')
@section('title')
    <title>Recruitment</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Recruitment', 'key' => 'List Recruitment'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('recruitment.create') }}" class="btn btn-success">ADD</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($recruitments)  )
                                @foreach($recruitments as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{!! \Illuminate\Support\Str::limit($data->title,20)  !!}</td>
                                        <td><img src="{{ asset($data->image_path) }}" width="100" height="100"></td>
                                        <td>
                                            <a href="{{ route('recruitment.action',['id' => $data->id]) }}"
                                               class=" {{ $data->getStatus($data->status)['class'] }}">
                                                {{ $data->getStatus($data->status)['name'] }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('recruitment.edit',['id' => $data->id]) }}"
                                               class="btn btn-default">Edit</a>
                                            <a href=""
                                               data-url="{{ route('recruitment.delete',['id' => $data->id]) }}"
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
                        {{ $recruitments->links('pagination::bootstrap-4') }}
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
