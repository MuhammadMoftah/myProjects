<!-- Certificates Modal-->
<div class="modal fade crif-modal" id="edit-certificate-{{$certificate->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Certificate & Courses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-row" method="POST" action="{{route('user.certificate.edit',$certificate->id)}}">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="edit_certificate"/>
                    <input type="hidden" name="modal" value="{{$certificate->id}}"/>
                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span> Certificate Name</label>
                        <input value="{{$certificate->name}}" name="name" type="text" class="form-control {{ $errors->has('name') && old('type')=='edit_certificate' && old('modal')==$certificate->id ? 'is-invalid': ''}}" placeholder="Certificate Name">
                        @if(old('type')=="edit_certificate" && old('modal')==$certificate->id){!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Place Name (University,institute..)</label>
                        <input value="{{$certificate->place_name}}" type="text" name="place_name" class="form-control {{ $errors->has('place_name') && old('type')=='edit_certificate' && old('modal')==$certificate->id ? 'is-invalid': ''}}" placeholder="Place name">
                        @if(old('type')=="edit_certificate" && old('modal')==$certificate->id){!! $errors->first('place_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger"></span> Member ID</label>
                        <input value="{{$certificate->member_id}}" type="text" name="member_id" class="form-control {{ $errors->has('member_id') && old('type')=='edit_certificate' && old('modal')==$certificate->id ? 'is-invalid': ''}}" placeholder="member id">
                        @if(old('type')=="edit_certificate" && old('modal')==$certificate->id){!! $errors->first('member_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span>Start From</label>
                        <input value="{{$certificate->date}}" type='text' name="date" class="form-control datepicker {{ $errors->has('date') && old('type')=='edit_certificate' && old('modal')==$certificate->id ? 'is-invalid': ''}}" data-language='en' />
                        @if(old('type')=="edit_certificate" && old('modal')==$certificate->id){!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label> End Date</label>
                        <input value="{{$certificate->expired_date}}" type='text' name="expired_date" class="form-control endDateCertifcate_{{$certificate->id}} datepicker {{ $errors->has('expired_date') && old('type')=='edit_certificate' && old('modal')==$certificate->id ? 'is-invalid': ''}}" data-language='en' />
                        @if(old('type')=="edit_certificate" && old('modal')==$certificate->id){!! $errors->first('expired_date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    <div class="col-md-12">
                        <input type="checkbox" value="1" @if( is_null($certificate->expired_date) ) checked @else  @endif  name="no_expire"   style="width:30px;height:17px " class="allow-end" data-input=".endDateCertifcate_{{$certificate->id}}"> <label> This Certificate has no expiration date </label>  
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ml-2">Save</button>

                </form>
            </div>

        </div>
    </div>
</div> <!-- End modal-->