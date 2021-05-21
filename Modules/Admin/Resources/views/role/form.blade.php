<!-- Modal -->
<div class="modal fade" id="editRole{{ isset($data) ? $data->id : '' }}" tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ isset($data) ? route('role.update',['id' => $data->id]) : route('role.store') }}"
                      method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="name">Nhập tên</label>
                        <input type="text" class="form-control " id="nameRole" placeholder="Nhập tên mức độ" name="name"
                               value="{{ old('name',isset($data) ? $data->name : '') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Nhập mô tả</label>
                        <textarea class="form-control "
                                  id="descriptionRole" name="description"
                                  rows="3">{{ old('description',isset($data) ? $data->description : '') }}</textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
