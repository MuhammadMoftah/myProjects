<!-- work experince Modal-->
<div class="modal fade work-modal show" id="edit-experience-{{$experience->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Experience</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-row" method="POST" action="{{route('user.experience.edit',$experience->id)}}">
                    <input type="hidden" name="type" value="edit_experience" />
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="edit_experience" />
                    <input type="hidden" name="modal" value="{{$experience->id}}" />
                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Job Title</label>
                        <input value="{{$experience->title}}" type="text" name="title" class="form-control {{ $errors->has('title') && old('type')=='edit_experience' && old('modal')==$experience->id ?'is-invalid' : ''}}" placeholder="Job Title">
                        @if(old('type')=="edit_experience" && old('modal')==$experience->id) {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Company Name</label>
                        <input value="{{$experience->company_name}}" type="text" name="company_name" class="form-control {{ $errors->has('company_name') && old('type')=='edit_experience' && old('modal')==$experience->id ?'is-invalid' : ''}}" placeholder="Company Name">
                        @if(old('type')=="edit_experience" && old('modal')==$experience->id) {!! $errors->first('company_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Start From</label>
                        <input value="{{$experience->from}}" type='text' name="from_date" class="form-control datepicker {{ $errors->has('from_date') && old('type')=='edit_experience' && old('modal')==$experience->id ?'is-invalid' : ''}}" data-language='en' />
                        @if(old('type')=="edit_experience" && old('modal')==$experience->id) {!! $errors->first('from_date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> End Date</label>
                        <input value="{{$experience->to}}" type='text' name="to_date" class="end-date form-control datepicker {{ $errors->has('to_date') && old('type')=='edit_experience' && old('modal')==$experience->id ?'is-invalid' : ''}}" data-language='en' />
                        @if(old('type')=="edit_experience" && old('modal')==$experience->id) {!! $errors->first('to_date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                        <input type="checkbox" name="till_present" @if(auth("user")->user()->has_still && $experience->till_present==0 ) disabled @endif {{$experience->till_present==1?'checked':''}} class="custom-control-input currently-work" id="till_present_{{$experience->id}}">
                        <label class="custom-control-label" for="till_present_{{$experience->id}}">till now</label>
                        @if(auth("user")->user()->has_still && $experience->till_present==0 )
                        <div style="color:green">You Have Another Experience till now</div>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label>Reporting to (optional)</label>
                        <input value="{{$experience->reporting_to}}" type="text" name="reporting_to" class="form-control {{ $errors->has('reporting_to') && old('type')=='edit_experience' && old('modal')==$experience->id ?'is-invalid' : ''}}" placeholder="Reporting To">
                        @if(old('type')=="edit_experience" && old('modal')==$experience->id) {!! $errors->first('reporting_to', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="industry"><span class="text-danger">*</span> Industry</label>
                        <select id="industry" name="industry_id" class="form-control p-0 {{ $errors->has('industry_id') && old('type')=='edit_experience' && old('modal')==$experience->id ?'is-invalid' : ''}}">
                            <option disabled selected>Select Company industry</option>
                            @foreach($industries as $industry)
                            <option {{$industry->id==$experience->industry_id?'selected':''}} value="{{$industry->id}}">{{$industry->name_en}}</option>
                            @endforeach
                        </select>
                      
                        @if(old('type')=="edit_experience" && old('modal')==$experience->id) {!! $errors->first('industry_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country2"><span class="text-danger">*</span> Country</label>
                        <select id="country2" name="country_id" class="form-control p-0 {{ $errors->has('country_id') && old('type')=='edit_experience' && old('modal')==$experience->id ?'is-invalid' : ''}}">
                            <option disabled selected>Select your Country</option>
                            @foreach($countries as $country)
                            <option {{$country->id==$experience->country_id?'selected':''}} value="{{$country->id}}">{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="edit_experience" && old('modal')==$experience->id) {!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    <div class="form-group col-md-6" id="cities_2">
                        <label for="city"><span class="text-danger">*</span> City</label>
                        <select id="city" name="city_id" class="form-control p-0 {{ $errors->has('country_id') && old('type')=='edit_experience' && old('modal')==$experience->id?'is-invalid' : ''}}">
                            @foreach($experience->country->cities as $city)
                            <option {{$city->id==$experience->city_id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="edit_experience" && old('modal')==$experience->id) {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span> Job  Description </label>
                        <textarea value="{{$experience->job_description}}" name="description" class="form-control {{ $errors->has('description') && old('type')=='edit_experience' && old('modal')==$experience->id?'is-invalid' : ''}}" rows="4">{{$experience->job_description}}</textarea>
                        @if(old('type')=="edit_experience" && old('modal')==$experience->id) {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12">
                        <label>Achievements (optional)</label>
                        <textarea value="{{$experience->achievements}}" name="achievements" class="form-control {{ $errors->has('achievements') && old('type')=='edit_experience' && old('modal')==$experience->id?'is-invalid' : ''}}" rows="4">{{$experience->achievements}}</textarea>
                        @if(old('type')=="edit_experience" && old('modal')==$experience->id) {!! $errors->first('achievements', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ml-2">Save changes</button>
                </form>
            </div>

        </div>
    </div>
</div>