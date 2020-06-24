<!-- Certificates Modal-->
<div class="modal fade crif-modal" id="add-certificate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Certificate & Courses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-row" method="POST" action="{{route('user.certificate.post')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="add_certificate"/>
                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span> Certificate Name</label>
                        <input value="{{old('name')}}" name="name" type="text" class="form-control {{ $errors->has('name') && old('type')=='add_certificate'? 'is-invalid': ''}}" placeholder="Certificate Name">
                        @if(old('type')=="add_certificate"){!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Place Name (University,institute..)</label>
                        <input value="{{old('place_name')}}" type="text" name="place_name" class="form-control {{ $errors->has('place_name') && old('type')=='add_certificate'? 'is-invalid': ''}}" placeholder="Place name">
                        @if(old('type')=="add_certificate"){!! $errors->first('place_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger"></span> Member ID</label>
                        <input value="{{old('member_id')}}" type="text" name="member_id" class="form-control {{ $errors->has('member_id') && old('type')=='add_certificate'? 'is-invalid': ''}}" placeholder="member id">
                        @if(old('type')=="add_certificate"){!! $errors->first('member_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Start From</label>
                        <input value="{{old('date')}}" type='text' name="date" class="form-control datepicker {{ $errors->has('date') && old('type')=='add_certificate'? 'is-invalid': ''}}" data-language='en' />
                        @if(old('type')=="add_certificate"){!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger"></span> End Date</label>
                        <input value="{{old('expired_date')}}" type='text' name="expired_date" class="form-control endDateCertifcate datepicker {{ $errors->has('expired_date') && old('type')=='add_certificate'? 'is-invalid': ''}}" data-language='en' />
                        @if(old('type')=="add_certificate"){!! $errors->first('expired_date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    <div class="col-md-12">
                        <input type="checkbox" value="1" @if( old("no_expire") == 1) checked @else  @endif  name="no_expire"   style="width:30px;height:17px " class="allow-end"  data-input=".endDateCertifcate">
                        <label>This Certificate has no expiration date</label>  
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ml-2">Add</button>

                </form>
            </div>

        </div>
    </div>
</div> <!-- End modal-->