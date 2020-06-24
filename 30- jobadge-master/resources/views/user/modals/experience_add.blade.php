<!-- work experince Modal-->
<div class="modal fade work-modal" id="add-experience" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-row" method="POST" action="{{route('user.experience.post')}}">
                    <input type="hidden" name="type" value="add_experience" />
                    {{csrf_field()}}
                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Job Title</label>
                        <input value="{{old('title')}}" type="text" name="title" class="form-control {{ $errors->has('title') && old('type')=='add_experience'?'is-invalid' : ''}}" placeholder="Job Title">
                        @if(old('type')=='add_experience'){!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Company Name</label>
                        <input value="{{old('company_name')}}" type="text" name="company_name" class="form-control {{ $errors->has('company_name') && old('type')=='add_experience'?'is-invalid' : ''}}" placeholder="Company Name">
                        @if(old('type')=='add_experience'){!! $errors->first('company_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Start From</label>
                        <input value="{{old('from_date')}}" type='text' name="from_date" class="form-control datepicker {{ $errors->has('from_date') && old('type')=='add_experience'?'is-invalid' : ''}}" data-language='en' />
                        @if(old('type')=='add_experience'){!! $errors->first('from_date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    

                    <div class="form-group col-md-6">
                    
                        <label><span class="text-danger">*</span> End Date</label>
                    
                        <input value="{{old('to_date')}}"  type='text' name="to_date" class="form-control datepicker {{ $errors->has('to_date') && old('type')=='add_experience'?'is-invalid' : ''}} end-date" data-language='en' />
                        @if(old('type')=='add_experience'){!! $errors->first('to_date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                        <input {{ old('till_present') ? 'checked' : ''}} type="checkbox" @if(auth("user")->user()->has_still ) disabled @endif  name="till_present" class="custom-control-input currently-work" id="till_present">
                        <label class="custom-control-label" for="till_present">till now</label>
                        @if(auth("user")->user()->has_still  )
                           <div style="color:green">You Have Another Experience till now .</div>
                        @endif
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Reporting to (optional)</label>
                        <input value="{{old('reporting_to')}}" type="text" name="reporting_to" class="form-control {{ $errors->has('reporting_to') && old('type')=='add_experience'?'is-invalid' : ''}}" placeholder="Reporting To">
                        @if(old('type')=='add_experience'){!! $errors->first('reporting_to', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="industry"><span class="text-danger">*</span> Industry</label>
                        <select id="industry" name="industry_id" class="form-control p-0 {{ $errors->has('industry_id') && old('type')=='add_experience'?'is-invalid' : ''}}">
                            @if(!old('industry_id'))
                            <option disabled selected>Select Company industry</option>
                            @endif
                            @foreach($industries as $industry)
                            <option {{old('industry_id')==$industry->id?'selected':''}} value="{{$industry->id}}">{{$industry->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=='add_experience'){!! $errors->first('industry_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country1"><span class="text-danger">*</span> Country</label>
                        <select id="country1" name="country_id" class="form-control p-0 {{ $errors->has('country_id') && old('type')=='add_experience'?'is-invalid' : ''}}">
                            <option disabled selected>Select your Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=='add_experience'){!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    <div class="form-group col-md-6" id="cities_1"></div>

                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span>Job  Description</label>
                        <textarea value="{{old('description')}}" name="description" class="form-control {{ $errors->has('description') && old('type')=='add_experience'?'is-invalid' : ''}}" rows="4">{{old('description')}}</textarea>
                        @if(old('type')=='add_experience'){!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12">
                        <label>Achievements (optional)</label>
                        <textarea value="{{old('achievements')}}" name="achievements" class="form-control {{ $errors->has('achievements') && old('type')=='add_experience'?'is-invalid' : ''}}" rows="4">{{old('achievements')}}</textarea>
                        @if(old('type')=='add_experience'){!! $errors->first('achievements', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ml-2">Save changes</button>
                </form>
            </div>

        </div>
    </div>
</div>