<div class="modal fade" id="edit-board-{{ $board->id }}">
    <form class="modal-dialog" method="POST" action="{{ route('update.board',$board->id) }}">
        @csrf
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Board</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" name="type" value="edit-board"/>
                <input type="hidden" name="modal_id" value="{{ $board->id }}"/>
                <div class="form-group">
                    <label for="exampleName1" class="my-2">{{ $board->name }}</label>
                    <input type="text" class="form-control {{ $errors->has('name') && old('type')=='edit-board' && $board->id==old('modal_id') ? 'is-invalid' : ''}}" value="{{ $board->name }}" id="exampleName1" aria-describedby="emailHelp"
                        placeholder="Board Name" name="name" value="{{ old('name') }}">
                        <p class="{{ $errors->has('name') && old('type')=='edit-board' && $board->id==old('modal_id') ? 'text-danger' : ''}}">{{ $errors->first('name') }}</p>
                </div>
                <div class="form-group">
                    <label class="my-2" for="exampleFormControlSelect1">Board Status</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                        @if($board->private==1)
                        <option selected value="1">Private</option>
                        <option value="0">Public</option>
                        @else
                        <option value="1">Private</option>
                        <option value="0" selected>Public</option>
                        @endif
                    </select>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" onclick="form.submit();" class="btn main-btn" data-dismiss="modal">Save</button>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </form>
</div><!-- end Modal-->