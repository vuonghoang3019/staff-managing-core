<div class="row">
    <div class="col-md-6">
        <div class="form-group ">
            <label for="code">Nhập mã học sinh</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                   placeholder="Nhập mã học sinh" name="code" value="{{ old('code',isset($studentEdit) ? $studentEdit->code : '') }}">
            @error('code')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="name">Nhập tên học sinh</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                   placeholder="Nhập tên học sinh" name="name" value="{{ old('name',isset($studentEdit) ? $studentEdit->name : '') }}">
            @error('name')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="birthday">Ngày sinh</label>
            <input type="date" class="form-control @error('email') is-invalid @enderror" id="birthday"
                   placeholder="Nhập email" name="birthday" value="{{ old('birthday',isset($studentEdit) ? $studentEdit->birthday : '') }}">
            @error('birthday')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="form-group ">
            <label for="nation">Dân tộc</label>
            <input type="text" class="form-control @error('nation') is-invalid @enderror" id="nation"
                   placeholder="Nhập dân tộc" name="nation" value="{{ old('nation',isset($studentEdit) ? $studentEdit->nation : '') }}">
            @error('nation')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="classroom_id">Lớp</label>
            <select class="form-control" name="classroom_id">
                <option value="">---Mời bạn chọn lớp---</option>
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}"
                            @if(isset($studentEdit)) {{ $studentEdit->classroom_id == $classroom->id ? 'selected' : '' }} @endif >
                        {{ $classroom->name }}
                    </option>
                @endforeach
            </select>
            @error('classroom_id')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="sex">Giới tính</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="male" value="0"
                @if(isset($studentEdit)) {{  $studentEdit->sex === 0 ? 'checked' : ''}} @endif  >
                <label class="form-check-label" for="male">
                    Nam
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="female" value="1"
                @if(isset($studentEdit)) {{  $studentEdit->sex === 1 ? 'checked' : ''}} @endif  >
                <label class="form-check-label" for="female">
                    Nữ
                </label>
            </div>
            @error('sex')
            <div class="alert alert-danger mt-2 px-2">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>
<button type="submit" class="btn btn-success">Submit</button>
