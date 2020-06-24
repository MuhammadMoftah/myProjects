<!-- Job Target Modal-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit-target-{{$target_job->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Target Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-row" method="POST" action="{{route('user.target.edit',$target_job->id)}}">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="edit_target"/>
                    <input type="hidden" name="modal" value="{{$target_job->id}}"/>
                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Job Title</label>
                        <input value="{{$target_job->title}}" type="text" name="title" class="form-control {{ $errors->has('title') && old('type')=='edit_target' && old('modal')==$target_job->id ? 'is-invalid': ''}}" placeholder="Job Title">
                        @if(old('type')=="edit_target" && old('modal')==$target_job->id){!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Category</label>
                        <select name="category_id" class="form-control {{ $errors->has('category_id') && old('type')=='edit_target' && old('modal')==$target_job->id ? 'is-invalid': ''}}">
                            @foreach($categories as $category)
                            <option {{$category->id==$target_job->category_id?'selected':''}} value="{{$category->id}}">{{$category->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="edit_target" && old('modal')==$target_job->id){!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country6"><span class="text-danger">*</span> Country</label>
                        <select id="country6" name="country_id" class="form-control p-0 {{ $errors->has('country_id') && old('type')=='edit_target' && old('modal')==$target_job->id ? 'is-invalid': ''}}">
                            @foreach($countries as $country)
                            <option {{$country->id==$target_job->country_id?'selected':''}} value="{{$country->id}}">{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="edit_target" && old('modal')==$target_job->id){!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    <div class="form-group col-md-6" id="cities_6">
                        <label for="city"><span class="text-danger">*</span> City</label>
                        <select id="city" name="city_id" class="form-control p-0 {{ $errors->has('country_id') && old('type')=='edit_target' && old('modal')==$target_job->id ? 'is-invalid': ''}}">
                            @foreach($target_job->country->cities as $city)
                            <option {{$city->id==$target_job->city_id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="edit_target" && old('modal')==$target_job->id){!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="industry"><span class="text-danger">*</span> Industry</label>
                        <select id="industry" name="industry_id" class="form-control p-0 {{ $errors->has('industry_id') && old('type')=='edit_target' && old('modal')==$target_job->id ? 'is-invalid': ''}}">
                            @foreach($industries as $industry)
                            <option {{$industry->id==$target_job->industry_id?'selected':''}}  value="{{$industry->id}}">{{$industry->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="edit_target" && old('modal')==$target_job->id){!! $errors->first('industry_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="jobtype"><span class="text-danger">*</span> Job Type</label>
                        <select id="jobtype" name="jobtype_id" class="form-control p-0 {{ $errors->has('jobtype_id') && old('type')=='edit_target' && old('modal')==$target_job->id ? 'is-invalid': ''}}">
                            @foreach($jobtypes as $jobtype)
                            <option {{$jobtype->id==$target_job->jobtype_id?'selected':''}} value="{{$jobtype->id}}">{{$jobtype->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('type')=="edit_target" && old('modal')==$target_job->id){!! $errors->first('jobtype_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12 ">Salary is Per Month</div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Salary From</label>
                        <input value="{{$target_job->salary_from}}" type="number" name="salary_from" class="form-control {{ $errors->has('salary_from') && old('type')=='edit_target' && old('modal')==$target_job->id ? 'is-invalid': ''}}" placeholder="Salary from">
                        @if(old('type')=="edit_target" && old('modal')==$target_job->id){!! $errors->first('salary_from', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Salary To</label>
                        <input value="{{$target_job->salary_to}}" type="number" name="salary_to" class="form-control {{ $errors->has('salary_to') && old('type')=='edit_target' && old('modal')==$target_job->id ? 'is-invalid': ''}}" placeholder="Salary to">
                        @if(old('type')=="edit_target" && old('modal')==$target_job->id){!! $errors->first('salary_to', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                        <input @if($target_job->show_salary == 0) checked @endif value="0" type="checkbox" name="show_salary" class="custom-control-input currently-work form-control {{ $errors->has('show_salary') && old('type')=='edit_target'? 'is-invalid': ''}}" id="show_salary_{{$target_job->id}}">
                        <label class="custom-control-label" for="show_salary_{{$target_job->id}}"> Make It Confidential </label>
                    </div>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ml-2">Edit</button>

                </form>
            </div>

        </div>
    </div>
</div> <!-- End modal-->