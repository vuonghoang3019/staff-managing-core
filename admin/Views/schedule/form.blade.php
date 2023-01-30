<button type="submit" class="btn btn-success">Lưu</button>
<a href="{{ route('schedule.index') }}" class="btn btn-primary">Quay lại</a>
<div class="row">
    <div class="col-md-6">
        <div class="form-group ">
            <label for="classroom_id">Lớp</label>
            <select class="form-control classroom" name="classroom_id" data-url="{{ route('schedule.ajaxGetSelect') }}">
                <option value="">---Chọn lớp---</option>
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}"
                    @if(isset($scheduleEdit)) {{ $scheduleEdit->classroom_id === $classroom->id ? 'selected' : '' }} @endif
                    >{{ $classroom->name }}</option>
                @endforeach
            </select>
            @error('classroom_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="user_id">Giáo Viên</label>
            <select class="form-control user" name="user_id">
                <option value="">---Chọn giáo viên---</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}"
                    @if(isset($scheduleEdit)) {{ $scheduleEdit->user_id === $user->id ? 'selected' : '' }} @endif
                    >{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="weekday">Chọn thứ</label>
            <select class="form-control" name="weekday">
                <option value="">---Chọn thứ----</option>
                @foreach($weeks as $item => $day)
                    <option value="{{ $item }}"
                    @if(isset($scheduleEdit)) {{ $scheduleEdit->weekday === $item ? 'selected' : '' }} @endif
                    >{{ $day }}</option>
                @endforeach
            </select>
            @error('weekday')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group ">
            <label for="start_time">Thời gian bắt đầu học</label>
            <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                   id="start_time"
                   name="start_time"
                   value="{{ old('start_time',isset($scheduleEdit) ? $scheduleEdit->start_time : '') }}">
            @error('start_time')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="end_time">Thời gian kết thúc</label>
            <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                   id="end_time"
                   name="end_time" value="{{ old('end_time',isset($scheduleEdit) ? $scheduleEdit->end_time : '') }}">
            @error('end_time')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="start_time">Phòng</label>
            <select class="form-control " name="room_id">
                <option value="">---Chọn phòng học---</option>
                @foreach($rooms as $room)
                    <option
                        value="{{ $room->id }}" @if(isset($scheduleEdit))
                        {{ $scheduleEdit->room_id === $room->id ? 'selected' : '' }}
                        @endif>{{ $room->name }}</option>
                @endforeach
            </select>
            @error('room_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

