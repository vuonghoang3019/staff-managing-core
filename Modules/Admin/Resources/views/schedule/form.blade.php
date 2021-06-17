<button type="submit" class="btn btn-success">Lưu</button>
<a href="{{ route('schedule.index') }}" class="btn btn-primary">Quay lại</a>
<div class="row">
    <div class="col-md-6">
        <div class="form-group ">
            <label for="classroom_id">Lớp</label>
            <select class="form-control " name="classroom_id">
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
            <select class="form-control " name="user_id">
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
            <label for="start_time">Chọn lịch</label>
            <select class="form-control " name="calendar_id">
                <option value="">---Chọn lịch---</option>
                @foreach($calendars as $calendar)

                    <option value="{{ $calendar->id }}"
                    @if(isset($scheduleEdit)) {{ $scheduleEdit->calendar_id === $calendar->id ? 'selected' : '' }} @endif>
                        @foreach($weeks as $item => $day)
                            {{ $calendar->day === $item ? $day : '' }}
                        @endforeach
                        {{ $calendar->start_time }}-{{ $calendar->end_time }}</option>
                @endforeach
            </select>
            @error('calendar_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group ">
            <label for="date_start">Ngày dự kiến bắt đầu</label>
            <input type="date" class="form-control @error('date_start') is-invalid @enderror"
                   id="date"
                   name="date_start"
                   value="{{ old('date_start',isset($scheduleEdit) ? $scheduleEdit->date_start : '') }}">
            @error('date_start')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="date_end">Ngày dự kiến kết thúc</label>
            <input type="date" class="form-control @error('date_end') is-invalid @enderror"
                   id="date_end"
                   name="date_end" value="{{ old('date_end',isset($scheduleEdit) ? $scheduleEdit->date_end : '') }}">
            @error('date_end')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="start_time">Phòng</label>
            <select class="form-control " name="calendar_id">
                <option value="">---Chọn phòng học---</option>

            </select>
            @error('calendar_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

