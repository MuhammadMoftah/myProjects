<!-- Job Target Modal-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="add-target">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Target Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-row" method="POST" action="{{route('user.target.post')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="add_target"/>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Job Title</label>
                        <input value="{{old('title')}}" type="text" name="title" class="form-control {{ $errors->has('title') && old('type')=='add_target'? 'is-invalid': ''}}" placeholder="Job Title">
                        @if(old('type')=="add_target"){!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Category</label>
                        <select name="category_id" class="form-control {{ $errors->has('category_id') && old('type')=='add_target'? 'is-invalid': ''}}">
                            <option selected disabled>Choose Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="add_target"){!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country5"><span class="text-danger">*</span> Country</label>
                        <select id="country5" name="country_id" class="form-control p-0 {{ $errors->has('country_id') && old('type')=='add_target'? 'is-invalid': ''}}">
                            <option disabled selected>Select your Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="add_target"){!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    <div class="form-group col-md-6" id="cities_5"></div>

                    <div class="form-group col-md-6">
                        <label for="industry"><span class="text-danger">*</span> Industry</label>
                        <select id="industry" name="industry_id" class="form-control p-0 {{ $errors->has('industry_id') && old('type')=='add_target'? 'is-invalid': ''}}">
                            <option disabled selected>Select industry</option>
                            @foreach($industries as $industry)
                            <option value="{{$industry->id}}">{{$industry->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="add_target"){!! $errors->first('industry_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="jobtype"><span class="text-danger">*</span> Job Type</label>
                        <select id="jobtype" name="jobtype_id" class="form-control p-0 {{ $errors->has('jobtype_id') && old('type')=='add_target'? 'is-invalid': ''}}">
                            <option disabled selected>Select job type</option>
                            @foreach($jobtypes as $jobtype)
                            <option value="{{$jobtype->id}}">{{$jobtype->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="add_target"){!! $errors->first('jobtype_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="industry"><span class="text-danger">*</span> Industry</label>
                        <select id="industry" name="industry_id" class="form-control p-0 {{ $errors->has('industry_id') && old('type')=='add_target'? 'is-invalid': ''}}">
                            <option disabled selected>Select industry</option>
                            @foreach($industries as $industry)
                            <option value="{{$industry->id}}">{{$industry->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="add_target"){!! $errors->first('industry_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="jobtype"><span class="text-danger">*</span> Job Type</label>
                        <select id="jobtype" name="jobtype_id" class="form-control p-0 {{ $errors->has('jobtype_id') && old('type')=='add_target'? 'is-invalid': ''}}">
                            <option disabled selected>Select job type</option>
                            @foreach($jobtypes as $jobtype)
                            <option value="{{$jobtype->id}}">{{$jobtype->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="add_target"){!! $errors->first('jobtype_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    
                    <div class="form-group col-md-12 ">Salary is Per Month</div>
                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Salary From</label>
                        <input value="{{old('salary_from')}}" type="number" name="salary_from" class="form-control {{ $errors->has('salary_from') && old('type')=='add_target'? 'is-invalid': ''}}" placeholder="Salary from">
                        @if(old('type')=="add_target"){!! $errors->first('salary_from', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Salary To</label>
                        <input value="{{old('salary_to')}}" type="number" name="salary_to" class="form-control {{ $errors->has('salary_to') && old('type')=='add_target'? 'is-invalid': ''}}" placeholder="Salary to">
                        @if(old('type')=="add_target"){!! $errors->first('salary_to', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                        <input @if(old("show_salary") == 0) value="0" checked @endif type="checkbox"  name="show_salary" class="custom-control-input currently-work form-control {{ $errors->has('show_salary') && old('type')=='add_target'? 'is-invalid': ''}}" id="show_salary">
                        <label class="custom-control-label" for="show_salary"> Make It Confidential </label>
                    </div>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ml-2">Add</button>

                </form>
            </div>

        </div>
    </div>
</div> <!-- End modal-->