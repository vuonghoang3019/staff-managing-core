<!-- Modal -->
<div class="modal fade" id="contactDetail{{ $contach->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" readonly value="{{ $contach->name_parent }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  readonly value="{{ $contach->name_student }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  readonly value="{{ $contach->phone }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  readonly value="{{ $contach->email }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" readonly rows="3">{{ $contach->content }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                {!! $contach->is_active !!}
            </div>
        </div>
    </div>
</div>
