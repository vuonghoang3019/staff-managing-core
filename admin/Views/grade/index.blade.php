@extends('admin::master.master')
@section('title')
    <title>Grade</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'Grade', 'key' => 'List grade'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @can('grade-add')
                        <div class="col-md-12">
                            <a href="{{ route('grade.create') }}" class="btn btn-success">ADD</a>
                        </div>
                    @endcan
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($grades))
                                @foreach($grades as $grade)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td>{{ $grade->name }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($grade->description,20)}}</td>
                                        <td>
                                            {!! $grade->is_active !!}
                                        </td>
                                        <td>
                                            @can('grade-update')
                                                <a href="{{ route('grade.edit',['id' => $grade->id]) }}"
                                                   class="btn btn-default">Edit</a>
                                            @endcan
                                            @can('grade-delete')
                                                <a href=""
                                                   data-url="{{ route('grade.delete',['id' => $grade->id]) }}"
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
                        {{ $grades->links('pagination::bootstrap-4') }}
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
