@extends('admin::layouts.master')
@section('title')
    <title>News</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'News', 'key' => 'List News'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('news.create') }}" class="btn btn-success">ADD</a>
                        </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh đại diện</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($news)  )
                                @foreach($news as $data)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td><img src="{{ asset($data->image_path) }}" width="100" height="100"></td>
                                        <td style="font-size: 20px">{!! \Illuminate\Support\Str::lower(\Illuminate\Support\Str::limit($data->title,20)) !!}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($data->content,20)  !!}</td>
                                        <td>
                                            <a href="{{ route('news.action',['id' => $data->id]) }}"
                                                   class=" {{ $data->getStatus($data->status)['class'] }}">
                                                {{ $data->getStatus($data->status)['name'] }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('news.edit',['id' => $data->id]) }}"
                                               class="btn btn-default">Edit</a>
                                            <a href=""
                                               data-url="{{ route('news.delete',['id' => $data->id]) }}"
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
                        {{ $news->links('pagination::bootstrap-4') }}
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
