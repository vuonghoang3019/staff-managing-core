
@extends('admin::layouts.master')
@section('title')
    <title>Add Schedule</title>
@endsection
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        @include('admin::components.headerContent',['name' => 'Schedule  ', 'key' => 'Add Schedule'])
        <section class="content">
            <div class="container-fluid">
                <form action="" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="date">Lớp</label>
                        <select>

                        </select>
                        @error('date')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date">Giáo Viên</label>
                        <select>

                        </select>
                        @error('date')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date">Nhập thứ</label>
                        <input type="text" class="form-control @error('date') is-invalid @enderror" id="date"
                               placeholder="Monday-Sunday" name="date" value="{{ old('date') }}">
                        @error('date')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date">Nhập thứ</label>
                        <input type="text" class="form-control @error('date') is-invalid @enderror" id="date"
                               placeholder="Monday-Sunday" name="date" value="{{ old('date') }}">
                        @error('date')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date">Start Time</label>
                        <input type="text" class="form-control @error('date') is-invalid @enderror" id="date"
                               placeholder="Monday-Sunday" name="date" value="{{ old('date') }}">
                        @error('date')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date">End Time</label>
                        <input type="time" class="form-control timepicker  @error('date') is-invalid @enderror" id="date"
                               placeholder="Monday-Sunday" name="date" value="{{ old('date') }}">
                        @error('date')
                        <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </section>
    </div>
@endsection
