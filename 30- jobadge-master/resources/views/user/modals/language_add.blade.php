<!-- Language Modal-->
<div class="modal fade" id="add-language" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Language</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-row" method="POST" action="{{route('user.language.post')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="add_language"/>
                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span> Language</label>
                        <input value="{{old('language')}}" type="text" name="language" class="form-control {{ $errors->has('language') && old('type')=='add_language'? 'is-invalid': ''}}" placeholder="Enter your language">
                        @if(old('type')=="add_language"){!! $errors->first('language', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span> Rate</label>
                        <select name="rate" class="form-control {{ $errors->has('rate') && old('type')=='add_language'? 'is-invalid': ''}}">
                            @if(!old('rate'))
                            <option selected disabled>select your rate</option>
                            @endif
                            <option {{old('rate')==4?'selected':''}} value="4">Excellent</option>
                            <option {{old('rate')==3?'selected':''}} value="3">Very Good</option>
                            <option {{old('rate')==2?'selected':''}} value="2">Good</option>
                            <option {{old('rate')==1?'selected':''}} value="1">intermediate</option>
                        </select>
                        @if(old('type')=="add_language"){!! $errors->first('rate', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ml-2">Add Language</button>
                </form>
            </div>

        </div>
    </div>
</div> <!-- End modal-->