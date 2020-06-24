<!-- Education Modal-->
<div class="modal fade edu-modal" id="add-education" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-row" method="POST" action="{{route('user.education.post')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="add_education"/>
<!--  
                    <div class="form-group col-md-10">
                        <label><span class="text-danger">*</span> Degree Name</label>
                        <input value="{{old('degree')}}" type="text" name="degree" class="form-control {{ $errors->has('degree') && old('type')=='add_education'? 'is-invalid' : ''}}" placeholder="Degree">
                        @if(old('type')=="add_education"){!! $errors->first('degree', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>   -->

                    <div class="form-group col-md-6">
                        <label for="Degree"><span class="text-danger">*</span> Degree Name</label>
                        <select id="Degree" name="degree" class="form-control p-0  {{ $errors->has('degree') && old('type')=='add_education'? 'is-invalid' : '' }}">
                            <option disabled selected> Select your Degree </option>
                             <option value="Bacherlor's-Degree"> Bacherlor's Degree</option>
                             <option value="Master's-Degree">Master's Degree </option>
                             <option value="MBA"> MBA</option>
                             <option value="Doctorate's-Degree"> Doctorate's Degree</option>
                             <option value="Vocational">Vocational</option>
                             <option value="Technical-Diploma">Technical Diploma </option> 
                         </select>
                         
                         @if(old('type')=="add_education"){!! $errors->first('degree', '<div class="invalid-feedback">:message</div>') !!}@endif
                        
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Major</label>
                        <input value="{{old('major')}}" type="text" name="major" class="form-control {{ $errors->has('major') && old('type')=='add_education'? 'is-invalid' : ''}}" placeholder="Major">
                        @if(old('type')=="add_education"){!! $errors->first('major', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Place Name (University,institute..)</label>
                        <input value="{{old('place_name')}}" type="text" name="place_name" class="form-control {{ $errors->has('place_name') && old('type')=='add_education'? 'is-invalid' : ''}}" placeholder=" Place Name">
                        @if(old('type')=="add_education"){!! $errors->first('place_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Faculty  Name (Computer Science ..)</label>
                        <input value="{{old('faculty')}}" type="text" name="faculty" class="form-control {{ $errors->has('faculty') && old('type')=='add_education'? 'is-invalid' : ''}}" placeholder=" Faculty Name">
                        @if(old('type')=="add_education"){!! $errors->first('faculty', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country3"><span class="text-danger">*</span> Country</label>
                        <select id="country3" name="country_id" class="form-control p-0 {{ $errors->has('country_id') && old('type')=='add_education'? 'is-invalid' : ''}}">
                            <option disabled selected>Select your Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="add_education"){!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    <div class="form-group col-md-6" id="cities_3">

                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Start Year</label>
                        <input value="{{old('from_year')}}" type='text' name="from_year" class="form-control datepicker {{ $errors->has('from_year') && old('type')=='add_education'? 'is-invalid' : ''}}" data-language='en' />
                        @if(old('type')=="add_education"){!! $errors->first('from_year', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> End Year</label>
                        <input value="{{old('to_year')}}" type='text' name="to_year" class="form-control datepicker {{ $errors->has('to_year') && old('type')=='add_education'? 'is-invalid' : ''}}" data-language='en' />
                        @if(old('type')=="add_education"){!! $errors->first('to_year', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12">
                        <label>Notes (optional)</label>
                        <textarea value="{{old('notes')}}" name="notes" class="form-control {{ $errors->has('notes') && old('type')=='add_education'? 'is-invalid' : ''}}" rows="4">{{old('notes')}}</textarea>
                        @if(old('type')=="add_education"){!! $errors->first('notes', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ml-2">Save changes</button>

                </form>
            </div>

        </div>
    </div>
</div> <!-- End modal-->