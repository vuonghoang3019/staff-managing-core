@extends('backend::master.master')
@section('title')
    <title>About</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('backend::layouts.headerContent',['name' => 'About', 'key' => ''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
{{--                    @can('category-add')--}}
                        <div class="col-md-12">
                            <a href="{{ route('about.create') }}" class="btn btn-success">ADD</a>
                        </div>
{{--                    @endcan--}}
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @if(isset($abouts)  )
                                @foreach($abouts as $about)
                                    <tr>
                                        <th scope="row">{{ $stt }}</th>
                                        <td><img src="{{ asset($about->image_path) }}" width="100" height="100"></td>
                                        <td>{!! \Illuminate\Support\Str::limit($about->title,20)  !!}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($about->content,10)  !!}</td>
                                        <td>
                                            {!! $about->is_active !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('about.edit',['id' => $about->id]) }}"
                                               class="btn btn-default">Edit</a>
                                            <a href=""
                                               data-url="{{ route('about.delete',['id' => $about->id]) }}"
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
                        {{ $abouts->links('pagination::bootstrap-4') }}
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
