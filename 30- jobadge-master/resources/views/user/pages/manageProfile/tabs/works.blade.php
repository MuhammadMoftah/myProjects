<main class="user-details bg-white rounded p-3">

    <!-- ==== Show if no Experince Added ==== -->
    

    <div class="card">
        @forelse ($user->work_experiences as $experience)
            
       
        <div class="card-header py-0 d-flex justify-content-between align-items-center flex-column flex-sm-row">
            <hgroup class="py-3">
                <div>
                    <span>Worked as</span>
                <strong class="text-capitalize">{{$experience->title}} </strong> 
                    at
                    <strong class="text-capitalize">{{$experience->company_name}} </strong>
                </div>
                <div>
                    <i class="far fa-clock mr-2 text-muted text-center" style="width: 15px;"></i>
                    <strong class="text-capitalize">{{$experience->displayStart()}}</strong> 
                    to
                    <strong class="text-capitalize">@if($experience->till_present==1) Now @else {{$experience->displayEnd()}} @endif </strong>
                </div>  

                <div>
                    <i class="fas fa-map-marker-alt mr-2 text-muted text-center" style="width: 15px;""></i>
                <span class="text-muted">{{$experience->city->name_en}}, {{$experience->country->name_en}}</span>
                </div>
            </hgroup>
            
            <aside class="mb-2 mb-sm-0">
              <button data-href="{{route('user.experience.edit',$experience->id)}}" class="btn btn-info btn-sm edit-experience edit-works-{{$experience->id}}" title="Edit" 
                 data-id="{{$experience->id}}"
                 data-company_name="{{$experience->company_name}}"
                 data-till_present="{{$experience->till_present}}"
                 data-title="{{$experience->title}}"
                 data-city_id="{{$experience->city_id}}"
                 data-country_id="{{$experience->country_id}}"
                 data-job_description="{{$experience->job_description}}"
                 data-achievements="{{$experience->achievements}}"
                 data-from ="{{$experience->from}}"
                 data-to ="{{$experience->to}}"
                 data-reporting_to ="{{$experience->reporting_to}}"
                 data-industry_id ="{{$experience->industry_id}}"
                 data-button = ".edit-works-{{$experience->id}}"
                ><i class="fas fa-user-edit"></i></button> 
                <a href="{{route('user.experience.delete',$experience->id)}}"  data-id="{{$experience->id}}" class="btn btn-danger deleted-general btn-sm" data-toggle="modal" data-target="#generalDeleteModel" title="Delete"><i class="far fa-trash-alt"></i></a> 
            </aside>
        </div>

        <div class="card-body added-info">
            <div class="row">
                @if($experience->job_description)
                <div class="col-12 my-2">
                    <strong class="d-block h5 font-weight-bold">Job Description</strong>
                    <p class="text-muted">
                       {{ $experience->job_description}}
                    </p>
                </div>
                @endif

                @if($experience->achievements)
                <!-- <div class="col-12 my-2">
                    <strong class="d-block h5 font-weight-bold">My achievements</strong>
                    <p class="text-muted">
                        {{ $experience->achievements}}
                    </p>
                </div> -->
                @endif
            </div>
        </div>
        @empty
            <div class="card mb-1">
                <div class="card-body text-center pb-1">
                        <strong class="text-muted">You have no work experince yet.</strong>
                        <p>Add work experinces to reach your <strong>DREAM JOB!</strong></p>
                </div>
            </div>
        @endforelse

    </div>

    <button class="btn btn-main2 mt-4 btn-sm" data-toggle="modal" data-target="#addExpModal"> <i class="fas fa-plus mr-2"></i>  Add Experience</button>

</main>


@push('models')
<!-- Add new experince Modal -->
<!-- Add new experince Modal  -->
<div id="addExpModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Add new Experience</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('user.experience.post')}}"  method="POST"class="form-row" >
                    @csrf
                    <input value="works" name="tab"   type="hidden">
                    <input value="#addExpModal" name="model" type="hidden">
                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Job Title</label>
                        <input value="{{old('title')}}" type="text" name="title" class="form-control {{ $errors->has('title') && old('tab')=='works'?'is-invalid' : ''}}" placeholder="Job Title">
                        @if(old('tab')=='works'){!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Company Name</label>
                        <input value="{{old('company_name')}}" type="text" name="company_name" class="form-control {{ $errors->has('company_name') && old('tab')=='works'?'is-invalid' : ''}}" placeholder="Company Name">
                        @if(old('tab')=='works'){!! $errors->first('company_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Start From</label>
                        <input value="{{old('from_date')}}" type='text' name="from_date" class="form-control datepicker {{ $errors->has('from_date') && old('tab')=='works'?'is-invalid' : ''}}" data-language='en' />
                        @if(old('tab')=='works'){!! $errors->first('from_date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    
                    <div class="form-group col-md-6">
                    
                        <label><span class="text-danger">* </span> End Date  <span style="color:red;font-size: 14px">( required when not Currently work here )</span></label>
                    
                        <input value="{{old('to_date')}}"  type='text' name="to_date" class="form-control datepicker {{ $errors->has('to_date') && old('tab')=='works'?'is-invalid' : ''}} end-date" data-language='en' />
                        @if(old('tab')=='works'){!! $errors->first('to_date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                        <input data-end="#addExpModal" {{ old('till_present') ? 'checked' : ''}} type="checkbox" @if(auth("user")->user()->has_still ) disabled @endif  name="till_present" class="custom-control-input currently-work2" id="till_present">
                        <label class="custom-control-label" for="till_present">Currently work here</label>
                        @if(auth("user")->user()->has_still  )
                           <div style="color:green">You Have Currently work .</div>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label>Reporting to (optional)</label>
                        <input value="{{old('reporting_to')}}" type="text" name="reporting_to" class="form-control {{ $errors->has('reporting_to') && old('tab')=='works'?'is-invalid' : ''}}" placeholder="Reporting To">
                        @if(old('tab')=='works'){!! $errors->first('reporting_to', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="industry"><span class="text-danger">*</span> Industry</label>
                        <select id="industry" name="industry_id" class="form-control p-0 {{ $errors->has('industry_id') && old('tab')=='works'?'is-invalid' : ''}}">
                            @if(!old('industry_id'))
                            <option disabled selected>Select Company industry</option>
                            @endif
                            @foreach($industries as $industry)
                            <option {{old('industry_id')==$industry->id?'selected':''}} value="{{$industry->id}}">{{substr($industry->name_en,0,50)}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=='works'){!! $errors->first('industry_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country1"><span class="text-danger">*</span> Country</label>
                        <select id="country1" name="country_id" data-target=".works-city-add" data-city="{{old('tab')=='works' ? old('city_id') :'' }}" class="country-select form-control p-0 {{ $errors->has('country_id') && old('tab')=='works'?'is-invalid' : ''}}">
                            <option disabled @if(! (old('tab')=='works' && old('country_id') ) ) selected @endif >Select your Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if( old('tab')=='works' && old('country_id') == $country->id) selected @endif >{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=='works'){!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6 works-city-add" id="cities_holder">
                        <label>City</label>
                        <select name="city_id" disabled class="form-control p-0 {{ $errors->has('city_id') && old('tab')=='works'?'is-invalid' : ''}} ">
                            <option selected="" value="1">Choose City</option>
                        </select>
                        @if(old('tab')=='works'){!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span>Job  Description</label>
                        <textarea value="{{old('description')}}" name="description" class="form-control {{ $errors->has('description') && old('tab')=='works'?'is-invalid' : ''}}" rows="4">{{old('description')}}</textarea>
                        @if(old('tab')=='works'){!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12">
                        <label>Achievements (optional)</label>
                        <textarea value="{{old('achievements')}}" name="achievements" class="form-control {{ $errors->has('achievements') && old('tab')=='works'?'is-invalid' : ''}}" rows="4">{{old('achievements')}}</textarea>
                        @if(old('tab')=='works'){!! $errors->first('achievements', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                   

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Add Experince">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Edit your experince details -->
<!-- Edit your experince details -->
<div id="editExpModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Edit your Experience details</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-row" >
                    @csrf
                    <input value="works" name="tab"   type="hidden">
                    <input value="#editExpModal" name="model" type="hidden">
                    <input type="hidden" name="editbutton" value="">
                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Job Title</label>
                        <input value="{{old('title')}}" type="text" name="title" class="form-control {{ $errors->has('title') && old('tab')=='works'?'is-invalid' : ''}}" placeholder="Job Title">
                        @if(old('tab')=='works'){!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Company Name</label>
                        <input value="{{old('company_name')}}" type="text" name="company_name" class="form-control {{ $errors->has('company_name') && old('tab')=='works'?'is-invalid' : ''}}" placeholder="Company Name">
                        @if(old('tab')=='works'){!! $errors->first('company_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Start From</label>
                        <input value="{{old('from_date')}}" type='text' name="from_date" class="form-control datepicker {{ $errors->has('from_date') && old('tab')=='works'?'is-invalid' : ''}}" data-language='en' />
                        @if(old('tab')=='works'){!! $errors->first('from_date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    
                    <div class="form-group col-md-6">
                    
                        <label><span class="text-danger">* </span> End Date  <span style="color:red;font-size: 14px">( required when not Currently work here )</span></label>
                    
                        <input value="{{old('to_date')}}"  type='text' name="to_date" class="form-control datepicker {{ $errors->has('to_date') && old('tab')=='works'?'is-invalid' : ''}} end-date" data-language='en' />
                        @if(old('tab')=='works'){!! $errors->first('to_date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                        <input data-end="#editExpModal"  type="checkbox"   name="till_present" class="custom-control-input currently-work2" id="till_present2">
                        <label class="custom-control-label" for="till_present2">Currently work here</label>
                     
                        <div style="color:green" class="currentwork" >You Have Currently work .</div>
                    
                    </div>

                    <div class="form-group col-md-6">
                        <label>Reporting to (optional)</label>
                        <input value="{{old('reporting_to')}}" type="text" name="reporting_to" class="form-control {{ $errors->has('reporting_to') && old('tab')=='works'?'is-invalid' : ''}}" placeholder="Reporting To">
                        @if(old('tab')=='works'){!! $errors->first('reporting_to', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="industry"><span class="text-danger">*</span> Industry</label>
                        <select id="industry" name="industry_id" class="form-control p-0 {{ $errors->has('industry_id') && old('tab')=='works'?'is-invalid' : ''}}">
                            @if(!old('industry_id'))
                            <option disabled selected>Select Company industry</option>
                            @endif
                            @foreach($industries as $industry)
                            <option {{old('industry_id')==$industry->id?'selected':''}} value="{{$industry->id}}">{{substr($industry->name_en,0,50)}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=='works'){!! $errors->first('industry_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country1"><span class="text-danger">*</span> Country</label>
                        <select id="country1" name="country_id" data-target=".works-city-edit" data-city="{{old('tab')=='works' ? old('city_id') :'' }}" class="country-select form-control p-0 {{ $errors->has('country_id') && old('tab')=='works'?'is-invalid' : ''}}">
                            <option disabled @if(! (old('tab')=='works' && old('country_id') ) ) selected @endif >Select your Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if( old('tab')=='works' && old('country_id') == $country->id) selected @endif >{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=='works'){!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6 works-city-edit" id="cities_holder">
                        <label>City</label>
                        <select name="city_id" disabled class="form-control p-0 {{ $errors->has('city_id') && old('tab')=='works'?'is-invalid' : ''}} ">
                            <option selected="" value="1">Choose City</option>
                        </select>
                        @if(old('tab')=='works'){!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span>Job  Description</label>
                        <textarea value="{{old('description')}}" name="description" class="form-control {{ $errors->has('description') && old('tab')=='works'?'is-invalid' : ''}}" rows="4">{{old('description')}}</textarea>
                        @if(old('tab')=='works'){!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12">
                        <label>Achievements (optional)</label>
                        <textarea value="{{old('achievements')}}" name="achievements" class="form-control {{ $errors->has('achievements') && old('tab')=='works'?'is-invalid' : ''}}" rows="4">{{old('achievements')}}</textarea>
                        @if(old('tab')=='works'){!! $errors->first('achievements', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Done">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endpush


{{-- scripts --}}

@push('tabsScripts')
    <script>
        $(function(){

            
            var title        = $("#editExpModal input[name='title']"),
                EditWorkModel=$("#editExpModal"),
                 FormEditModel = EditWorkModel.find("form") 
                company_name = $("#editExpModal input[name='company_name']"),
                from_date = $("#editExpModal input[name='from_date']"),
                to_date = $("#editExpModal input[name='to_date']"),
                till_present = $("#editExpModal input[name='till_present']"),
                reporting_to = $("#editExpModal input[name='reporting_to']"),
                industry_id = $("#editExpModal select[name='industry_id']"),
                country_id = $("#editExpModal select[name='country_id']"),
                city_id = $("#editExpModal select[name='city_id']"),
                description = $("#editExpModal textarea[name='description']"),
                achievements = $("#editExpModal textarea[name='achievements']"),
                editbutton  = $("#editExpModal input[name='editbutton']"),
                userStillWork = "{{auth("user")->user()->has_still}}",
                curentWorkLabel = $("#editExpModal .currentwork")
             
           // ====================
           $("body").on("click",".edit-experience", function(e){
              //set value in form 
              e.preventDefault();
            
              var _elm = $(this);
              var route = "{{route('user.experience.edit','id')}}".replace("id",_elm.data('id'))
          
              FormEditModel.prop('action', $(this).data("href"))
              title.val(_elm.data("title"))
              company_name.val(_elm.data("company_name"))
              description.val(_elm.data('job_description'))
              achievements.val(_elm.data('achievements'))
              to_date.val(_elm.data("to"))
              from_date.val(_elm.data("from"))

              reporting_to.val(_elm.data("reporting_to"))
              editbutton.val(_elm.data('button'))

              industry_id.find(`option[value='${_elm.data("industry_id")}']`).attr("selected",true).siblings().removeAttr("selected")
              country_id.data("city", _elm.data('city_id'))
              country_id.find(`option[value='${_elm.data("country_id")}']`).attr("selected",true)
                 .trigger('change')
                .siblings().removeAttr("selected");

              /// handle the current worl
              if(userStillWork == 1 ){
                  if(_elm.data('till_present') ==  1){
                    till_present.prop("disabled", false)
                    till_present.attr("checked", true)
                    curentWorkLabel.fadeOut()
                    to_date.prop("disabled", true)
                  }else{
                    till_present.prop("disabled", true)
                    curentWorkLabel.fadeIn()
                    to_date.prop("disabled",false)
                  }
                  
              }else{
              
                till_present.prop("disabled", false)
                curentWorkLabel.fadeOut()
                to_date.prop("disabled", false)
              }
              EditWorkModel.modal("show")
              // =================


           })

            
        })


    </script>
@endpush
