@extends('admin::master.master')
@section('title')
    <title>News</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin::layouts.headerContent',['name' => 'News', 'key' => 'List News'])
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
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($news)  )
                                @foreach($news as $newsItem)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td><img src="{{ asset($newsItem->image_path) }}" width="100" height="100"></td>
                                        <td style="font-size: 20px">{!! \Illuminate\Support\Str::lower(\Illuminate\Support\Str::limit($newsItem->title,20)) !!}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($newsItem->content,20)  !!}</td>
                                        <td>
                                            {!! $newsItem->is_active !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('news.edit',['id' => $newsItem->id]) }}"
                                               class="btn btn-default">Edit</a>
                                            <a href=""
                                               data-url="{{ route('news.delete',['id' => $newsItem->id]) }}"
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
