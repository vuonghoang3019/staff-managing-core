@extends('admin::layouts.master')
@section('title')
    <title>Grade</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Schedule', 'key' => 'List schedule'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('schedule.create') }}" class="btn btn-success">ADD</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
{{--                            <tbody>--}}
{{--                            <?php $stt = 0 ?>--}}
{{--                            @if(isset($grades))--}}
{{--                                @foreach($grades as $data)--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row">{{ $stt }}</th>--}}
{{--                                        <td>{{ $data->name }}</td>--}}
{{--                                        <td>{{ \Illuminate\Support\Str::limit($data->description,20)}}</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{ route('grade.action',['id' => $data->id]) }}"--}}
{{--                                               class=" {{ $data->getStatus($data->status)['class'] }}">--}}
{{--                                                {{ $data->getStatus($data->status)['name'] }}--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{ route('grade.edit',['id' => $data->id]) }}"--}}
{{--                                               class="btn btn-default">Edit</a>--}}
{{--                                            <a href=""--}}
{{--                                               data-url="{{ route('grade.delete',['id' => $data->id]) }}"--}}
{{--                                               class="btn btn-danger action-delete">Delete--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <?php $stt++; ?>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                            </tbody>--}}
                        </table>
                    </div>

                    <div class="col-md-12 float-right">
{{--                        {{ $grades->links('pagination::bootstrap-4') }}--}}
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
