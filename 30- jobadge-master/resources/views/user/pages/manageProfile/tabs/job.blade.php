<main class="user-details bg-white rounded p-3">

    

   
         @forelse($user->target_job as $target_job)
         <div class="card mb-2">
            <div class="card-body py-0 d-flex justify-content-between align-items-center flex-column flex-sm-row ">
            
                <hgroup class="py-3">
                    <div>
                        <span>Desired Title</span>
                        <strong class="text-capitalize">{{$target_job->title}}</strong> 
                    </div>

                    <div>
                        <i class="fas fa-money-bill-alt mr-2 text-muted text-center" style="width: 15px;"></i>
                        <span class="text-muted">{{$target_job->salary_from }} : {{$target_job->salary_to }} EGP @if($target_job->show_salary == 0 )<span>- Confidential</span></span> @endif
                    </div>
                </hgroup>
                
                <aside class="mb-2 mb-sm-0">
                    @if($user->target_job->count() >  0  )
                    {{-- {{ dd($target_job->toArray())}} --}}
                    <button data-href="{{route('user.target.edit',$target_job->id)}}" class="btn btn-info btn-sm edit-jobs edit-jobs-{{$target_job->id}} " title="Edit" 
                        data-id="{{$target_job->id}}"
                        data-title="{{$target_job->title}}"
                        data-salary_from="{{$target_job->salary_from}}"
                        data-salary_to="{{$target_job->salary_to}}"
                        data-show_salary="{{$target_job->show_salary}}"
                        data-category_id="{{$target_job->category_id}}"
                        data-industry_id="{{$target_job->industry_id}}"
                        data-jobtype_id="{{$target_job->jobtype_id}}"
                        data-country_id="{{$target_job->country_id}}"
                        data-city_id="{{$target_job->city_id}}"
                        data-catgories={{ $target_job->categories->pluck('id')}}
                        data-indusries={{ $target_job->industries->pluck('id')}}
                        data-button=".edit-jobs-{{$target_job->id}}"
                        >
                        <i class="fas fa-user-edit"></i></button> 
                    @else
                    @endif
                    {{-- <a href="javascript:void(0)" class="btn btn-danger deleted-general btn-sm" data-toggle="modal" data-target="#generalDeleteModel" title="Delete"><i class="far fa-trash-alt"></i></a>  --}}
                </aside>
            
            </div>
         </div>
        @empty
        <div class="card mb-2">
            <div class="card-body text-center pb-1">
                <strong class="text-muted">You have no Target job yet.</strong>
                <p>Add up to 1 job to reach your <strong>DREAM JOB!</strong></p>
            </div>
        </div>
        @endforelse

    

    <!-- ==== show if user add more than 3 jobs==== -->
    <div class="alert alert-danger" role="alert">
        You can add only 1 Desired jobs Maximum
    </div>
    @if($user->target_job->count() ==  0 )
    <button class="btn btn-main2 mt-2 btn-sm" data-toggle="modal" data-target="#addJobModal"> <i class="fas fa-plus mr-2"></i>  Add Job</button>
    @endif
</main>

@push('models')

<!-- Add new target job  -->
<!-- Add new target job  -->
<div id="addJobModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Add new target job</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('user.target.post')}}" method="POST" class="form-row" >
                    @csrf
                    <input value="jobs" name="tab"   type="hidden">
                    <input value="#addJobModal" name="model" type="hidden">
                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Job Title</label>
                        <input value="{{old('title')}}" type="text" name="title" class="form-control {{ $errors->has('title') && old('tab')=='jobs' && old('model')  == '#addJobModal' ? 'is-invalid': ''}}" placeholder="Job Title">
                        @if(old('tab')=="jobs" && old('model')  == '#addJobModal' ){!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Category</label>
                        <select multiple name="categories[]" class="form-control multipl-select {{ $errors->has('categories')  && old('tab')=='jobs' && old('model')  == '#addJobModal'? 'is-invalid': ''}}">
                            {{-- <option selected disabled>Choose Category</option> --}}
                            @foreach($categories as $category)
                            <option {{ is_array(old('categories')) && in_array($category->id , old('categories') ) ?'selected':''}} value="{{$category->id}}">{{$category->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=="jobs" && old('model')  == '#addJobModal'){!! $errors->first('categories', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country1"><span class="text-danger">*</span> Country</label>
                        <select id="country1" name="country_id" data-target=".jobs-city-add" data-city="{{old('tab')=='jobs' && old('model')  == '#addJobModal' ? old('city_id') :'' }}" class="country-select form-control p-0 {{ $errors->has('country_id') && old('model')  == '#addJobModal' && old('tab')=='jobs'?'is-invalid' : ''}}">
                            <option disabled @if(! (old('tab')=='jobs' && old('country_id') && old('model')  == '#addJobModal' ) ) selected @endif >Select your Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if( old('tab')=="jobs" && old('country_id') == $country->id) selected @endif >{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=="jobs" && old('model')  == '#addJobModal'){!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6 jobs-city-add {{ $errors->has('city_id') && old('tab')=='jobs' && old('model')  == '#addJobModal' ?'is-invalid' : ''}} " id="cities_holder">
                        <label>City</label>
                        <select name="city_id" disabled class="form-control p-0 ">
                            <option selected="" value="1">Choose City</option>
                        </select>
                    </div>

                   
                    <div class="form-group col-md-6">
                        <label for="industry"><span class="text-danger">*</span> Industry</label>
                        <select id="industry" multiple name="industries[]" class="form-control p-0 multipl-select {{ $errors->has('industries') && old('model')  == '#addJobModal' && old('tab')=='jobs'? 'is-invalid': ''}}">
                            {{-- <option disabled selected>Select industry</option> --}}
                            @foreach($industries as $industry)
                            <option {{ is_array(old('industries')) && in_array( $industry->id, old('industries') ) ?'selected':''}} value="{{$industry->id}}">{{substr($industry->name_en,0,50)}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=="jobs" && old('model')  == '#addJobModal'){!! $errors->first('industries', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="jobtype"><span class="text-danger">*</span> Job Type</label>
                        <select id="jobtype" name="jobtype_id" class="form-control p-0 {{ $errors->has('jobtype_id') && old('model')  == '#addJobModal' && old('tab')=="jobs" ? 'is-invalid': ''}}">
                            <option disabled selected>Select job type</option>
                            @foreach($jobtypes as $jobtype)
                            <option value="{{$jobtype->id}}">{{$jobtype->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=="jobs" && old('model')  == '#addJobModal'){!! $errors->first('jobtype_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    {{-- <div class="form-group col-md-12 ">Salary is Per Month</div> --}}
                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Salary From <span style="color:gray"> ( Salary is Per Month ) </span> </label>
                        <input value="{{old('salary_from')}}" type="number" name="salary_from" class="form-control {{ $errors->has('salary_from') && old('model')  == '#addJobModal' && old('tab')=="jobs" ? 'is-invalid': ''}}" placeholder="Salary from">
                        @if(old('tab')=="jobs" && old('model')  == '#addJobModal'){!! $errors->first('salary_from', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Salary To</label>
                        <input value="{{old('salary_to')}}" type="number" name="salary_to" class="form-control {{ $errors->has('salary_to') && old('model')  == '#addJobModal'&& old('tab')=="jobs" ? 'is-invalid': ''}}" placeholder="Salary to">
                        @if(old('tab')=="jobs" && old('model')  == '#addJobModal'){!! $errors->first('salary_to', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                        <input @if(old("show_salary") == 0) value="0" checked @endif type="checkbox"  name="show_salary" class="custom-control-input currently-work form-control {{ $errors->has('show_salary') && old('tab')=="jobs" ? 'is-invalid': ''}}" id="show_salary">
                        <label class="custom-control-label" for="show_salary"> Hide my salary </label>
                    </div>

                   

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Add job">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Edit your job details -->
<!-- Edit your job details -->
<div id="editJobModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Edit job details</h5>
            </div>
            <div class="modal-body">
               
                <form action="" method="POST" class="form-row" >
                    @csrf
                    <input value="jobs" name="tab"   type="hidden">
                    <input value="#editJobModal" name="model" type="hidden">
                    <input type="hidden" name="editbutton" value="">
                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Job Title</label>
                        <input value="{{old('title')}}" type="text" name="title" class="form-control {{ $errors->has('title') && old('model')  == '#editJobModal' && old('tab')=='jobs'? 'is-invalid': ''}}" placeholder="Job Title">
                        @if(old('tab')=="jobs"  && old('model')  == '#editJobModal' ){!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Category</label>
                        <select  multiple   name="categories[]" class="form-control multipl-select {{ $errors->has('categories') && old('tab')=='jobs'  && old('model')  == '#editJobModal'? 'is-invalid': ''}}">
                            {{-- <option selected disabled>Choose Category</option> --}}
                            @foreach($categories as $category)
                            <option {{ old('model')  == '#editJobModal' && is_array(old('categories')) && in_array($category->id, old('categories')  ) ?'selected':''}} value="{{$category->id}}">{{$category->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=="jobs"){!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country1"><span class="text-danger">*</span> Country</label>
                        <select id="country1" name="country_id" data-target=".jobs-city-add" data-city="{{old('tab')=='jobs' ? old('city_id') :'' }}" class="country-select form-control p-0 {{ $errors->has('country_id') && old('tab')=='jobs'?'is-invalid' : ''}}">
                            <option disabled @if(! (old('tab')=='jobs' && old('country_id') ) ) selected @endif >Select your Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if( old('tab')=="jobs" && old('country_id') == $country->id) selected @endif >{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=="jobs"  && old('model')  == '#editJobModal' ){!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6 jobs-city-add {{ $errors->has('city_id') && old('tab')=='jobs' && old('model')  == '#editJobModal'?'is-invalid' : ''}} " id="cities_holder">
                        <label>City</label>
                        <select name="city_id" disabled class="form-control p-0 ">
                            <option selected="" value="1">Choose City</option>
                        </select>
                    </div>

                   
                    <div class="form-group col-md-6">
                        <label for="industry"><span class="text-danger">*</span> Industry</label>
                        <select id="industry" name="industries[]"  multiple class="form-control multipl-select p-0 {{ $errors->has('industries') && old('model')  == '#editJobModal' && old('tab')=='jobs'? 'is-invalid': ''}}">
                            {{-- <option disabled selected>Select industry</option> --}}
                            @foreach($industries as $industry)
                            <option {{old('industry_id')==$industry->id?'selected':''}} value="{{$industry->id}}">{{substr($industry->name_en,0,50)}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=="jobs"  && old('model')  == '#editJobModal'){!! $errors->first('industries', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="jobtype"><span class="text-danger">*</span> Job Type</label>
                        <select id="jobtype" name="jobtype_id" class="form-control p-0 {{ $errors->has('jobtype_id')  && old('model')  == '#editJobModal' && old('tab')=="jobs" ? 'is-invalid': ''}}">
                            <option disabled selected>Select job type</option>
                            @foreach($jobtypes as $jobtype)
                            <option {{ old('model')  == '#editJobModal' && old('jobtype_id')==$jobtype->id?'selected':''}} value="{{$jobtype->id}}">{{$jobtype->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=="jobs"   && old('model')  == '#editJobModal'){!! $errors->first('jobtype_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    {{-- <div class="form-group col-md-12 ">Salary is Per Month</div> --}}
                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Salary From <span style="color:gray"> ( Salary is Per Month ) </span> </label>
                        <input value="{{old('salary_from')}}" type="number" name="salary_from" class="form-control {{ $errors->has('salary_from') && old('tab')=='jobs'? 'is-invalid': ''}}" placeholder="Salary from">
                        @if(old('tab')=="jobs"){!! $errors->first('salary_from', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Salary To</label>
                        <input value="{{old('salary_to')}}" type="number" name="salary_to" class="form-control {{ $errors->has('salary_to') && old('tab')=="jobs" ? 'is-invalid': ''}}" placeholder="Salary to">
                        @if(old('tab')=="jobs"  && old('model')  == '#editJobModal' ){!! $errors->first('salary_to', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                        <input @if(old("show_salary") == 0) value="0" checked @endif type="checkbox"  name="show_salary" class="custom-control-input currently-work form-control {{ $errors->has('show_salary') && old('tab')=="jobs" ? 'is-invalid': ''}}" id="show_salary_edit">
                        <label class="custom-control-label" for="show_salary_edit"> Hide my salary </label>
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

            function registerBSelct(){
                $(`.multipl-select`).bsMultiSelect({
                    //   useCssPatch=true, // default, can be ommitted
                    enableFiltering: true,
                    cssPatch: {
                        // choices - dropdown menu items
                        choices: {listStyleType:'none'},
                        choice: 'px-md-2 px-1',  // classes!
                        choice_hover: 'text-primary bg-light', 
                        choiceLabel_disabled: {opacity: '.65'},
                        
                        // picks - panel where selected item located
                        picks: {listStyleType:'none', display:'flex', flexWrap:'wrap',  height: 'auto', marginBottom: '0'},
                        picks_disabled: {backgroundColor: '#e9ecef'},
                        picks_focus: {borderColor: '#80bdff', boxShadow: '0 0 0 0.2rem rgba(0, 123, 255, 0.25)'},
                        picks_focus_valid: {boxShadow: '0 0 0 0.2rem rgba(40, 167, 69, 0.25)'},
                        picks_focus_invalid: {boxShadow: '0 0 0 0.2rem rgba(220, 53, 69, 0.25)'},
                        picks_def: {minHeight: 'calc(2.25rem + 2px)'},
                        picks_lg:  {minHeight: 'calc(2.875rem + 2px)'},
                        picks_sm:  {minHeight: 'calc(1.8125rem + 2px)'},
                        pick: {paddingLeft: '0px', lineHeight: '1.5em'},
                        pickButton: {fontSize:'1.5em', lineHeight: '.9em', float : "none"},
                        pickContent_disabled: {opacity: '.65'}, 

                        filterInput: {border:'0px', height: 'auto', boxShadow:'none', padding:'0', margin:'0', 
                                    outline:'none', backgroundColor:'transparent'}
                    }
                });
            }
            registerBSelct()
            
            var title        = $("#editJobModal input[name='title']"),
                EditJobModel=$("#editJobModal"),
                FormEditJobModel = EditJobModel.find("form") ,
                category_id = $("#editJobModal select[name='categories[]']"),
                jobtype_id = $("#editJobModal select[name='jobtype_id']"),
                salary_from = $("#editJobModal input[name='salary_from']"),
                show_salary = $("#editJobModal input[name='show_salary']"),
                industry = $("#editJobModal select[name='industries[]']"),
                country = $("#editJobModal select[name='country_id']"),
                // city_id = $("#editJobModal select[name='city_id']"),
                salary_to = $("#editJobModal input[name='salary_to']"),
                editbutton  = $("#editJobModal input[name='editbutton']");
        
             
           // ====================
           $("body").on("click",".edit-jobs", function(e){
              //set value in form 
              e.preventDefault();
            
              var _elm = $(this);
              var route = "{{route('user.target.edit','id')}}".replace("id",_elm.data('id'))
            
              FormEditJobModel.prop('action', route)
              title.val(_elm.data("title"))
              salary_from.val(_elm.data("salary_from"))
              salary_to.val(_elm.data('salary_to'))
            //   console.log(industry_id.find(`option[value='${_elm.data("industry_id")}']`))
         
              editbutton.val(_elm.data('button'))
              for(var i = 0 ; i < _elm.data("catgories").length ; i++  ){
                
                category_id.find(`option[value='${_elm.data("catgories")[i]}']`).attr("selected",true).trigger("click");
                console.log( category_id.find(`option[value='${_elm.data("catgories")[i]}']`), "dw")
              }
              category_id.val(_elm.data("catgories")[i]).end().trigger('change');
            

              for(var i = 0 ; i < _elm.data("indusries").length ; i++  ){
                
                industry.find(`option[value='${_elm.data("indusries")[i]}']`).attr("selected",true);
              }

              
              
         
              jobtype_id.find(`option[value='${_elm.data("jobtype_id")}']`).attr("selected",true).siblings().removeAttr("selected")
              country.data("city", _elm.data('city_id'))
              country.find(`option[value='${_elm.data("country_id")}']`).attr("selected",true)
                 .trigger('change')
                .siblings().removeAttr("selected");

              if(_elm.data("show_salary") == 0 ){
                show_salary.attr("checked", true)
              }else{
                show_salary.attr("checked", false)
              }  
              
              EditJobModel.modal("show")
              registerBSelct()
              // =================


           })

            
        })


    </script>
@endpush