<main class="user-details bg-white rounded p-3">

    

   
        @forelse ($user->educations as $education)
            
        <div class="card mb-2">
            <div class="card-body py-0 d-flex justify-content-between align-items-center flex-column flex-sm-row ">
                <hgroup class="py-3">
                    <div>
                        <strong class="text-capitalize d-block">{{$education->place_name}} - {{$education->faculty}} </strong>
                        <strong class="text-capitalize">{{$education->degree}}</strong> 
                    </div>

                    <div class="text-muted">
                        <i class="far fa-clock mr-2 text-muted text-center" style="width: 15px;"></i>
                        <strong class="text-capitalize">{{$education->displayStart()}}</strong> 
                        to
                        <strong class="text-capitalize">{{$education->displayEnd()}} </strong>
                    </div>

                    <div>
                        <i class="fas fa-map-marker-alt mr-2 text-muted text-center" style="width: 15px;"></i>
                        <span class="text-muted"> {{$education->country->name_en}}</span>
                    </div>

                    
                </hgroup>
                
                <aside class="mb-2 mb-sm-0">
                    <button data-href="{{route('user.education.edit',$education->id)}}" class="btn btn-info btn-sm  edit-education  edit-education-{{$education->id}} " title="Edit"  
                  
                    data-id="{{$education->id}}"
                    data-degree="{{$education->degree}}"
                    data-major="{{$education->major}}"
                    data-place_name="{{$education->place_name}}"
                    data-from_year="{{$education->from_year}}"
                    data-country_id="{{$education->country_id}}"
                    data-city_id="{{$education->city_id}}"
                    data-to_year="{{$education->to_year}}"
                    data-notes="{{$education->notes}}"
                    data-faculty="{{$education->faculty}}"
                    data-button=".edit-education-{{$education->id}}"
                    >
                        <i class="fas fa-user-edit"></i></button> 
                    <a href="{{route('user.education.delete',$education->id)}}"  data-id="{{$education->id}}" class="btn btn-danger deleted-general btn-sm" data-toggle="modal" data-target="#generalDeleteModel" title="Delete"><i class="far fa-trash-alt"></i></a> 
                </aside>
            </div>
        </div>
        @empty
            <!-- ==== Show if no job Added ==== -->
                <div class="card mb-2">
                    <div class="card-body text-center">
                        <strong class="text-muted">You have no education information yet.</strong>
                    </div>
                </div>
        @endforelse
  

    <button class="btn btn-main2 mt-2 btn-sm" data-toggle="modal" data-target="#addEduModal"> <i class="fas fa-plus mr-2"></i> Add education</button>

</main>

@push('models')
    <!-- Add new education -->
<!-- Add new education -->
<div id="addEduModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Add Education</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('user.education.post')}}" method="POST" class="form-row" >
                    @csrf
                    <input value="educations" name="tab"   type="hidden">
                    <input value="#addEduModal" name="model" type="hidden">      
                    <div class="form-group col-md-6">
                        <label for="Degree"><span class="text-danger">*</span> Degree Name</label>
                        <select id="Degree" name="degree" class="form-control p-0  {{ $errors->has('degree') &&old('tab') == 'educations'? 'is-invalid' : '' }}">
                            <option disabled @if(!$errors->has('degree') || (old('tab') && !old('degree') ) )  selected  @endif> Select your Degree </option>
                             <option value="Bacherlor's-Degree" @if(old('tab') == 'educations' && old('degree') ==  "Bacherlor's-Degree" ) selected @endif > Bacherlor's Degree</option>
                             <option value="Master's-Degree" @if(old('tab') == 'educations' && old('degree') ==  "Master's-Degree" ) selected @endif >Master's Degree </option>
                             <option value="MBA" @if(old('tab') == 'educations' && old('degree') ==  "MBA" ) selected @endif> MBA</option>
                             <option value="Doctorate's-Degree" @if(old('tab') == 'educations' && old('degree') ==  "Doctorate's-Degree" ) selected @endif > Doctorate's Degree</option>
                             <option value="Vocational" @if(old('tab') == 'educations' && old('degree') ==  "Vocational" ) selected @endif >Vocational</option>
                             <option value="Technical-Diploma" @if(old('tab') == 'educations' && old('degree') ==  "Technical-Diploma" ) selected @endif >Technical Diploma </option> 
                         </select>
                         
                         @if(old('tab') == 'educations'){!! $errors->first('degree', '<div class="invalid-feedback">:message</div>') !!}@endif
                        
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Major</label>
                        <input value="{{old('major')}}" type="text" name="major" class="form-control {{ $errors->has('major') &&old('tab') == 'educations'? 'is-invalid' : ''}}" placeholder="Major">
                        @if(old('tab') == 'educations'){!! $errors->first('major', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Place Name (University,institute..)</label>
                        <input value="{{old('place_name')}}" type="text" name="place_name" class="form-control {{ $errors->has('place_name') &&old('tab') == 'educations'? 'is-invalid' : ''}}" placeholder=" Place Name">
                        @if(old('tab') == 'educations'){!! $errors->first('place_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Faculty  Name (Computer Science ..)</label>
                        <input value="{{old('faculty')}}" type="text" name="faculty" class="form-control {{ $errors->has('faculty') && old('tab') == 'educations'? 'is-invalid' : ''}}" placeholder=" Faculty Name">
                        @if(old('tab') == 'educations'){!! $errors->first('faculty', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                     <div class="form-group col-md-6">
                        <label for="country1"><span class="text-danger">*</span> Country</label>
                        <select id="country1" name="country_id" data-target=".education-city-add" data-city="{{old('tab')=='educations' && old('model')  == '#addEduModal' ? old('city_id') :'' }}" class="country-select form-control p-0 {{ $errors->has('country_id') && old('model')  == '#addEduModal' && old('tab')=='educations'?'is-invalid' : ''}}">
                            <option disabled @if(! (old('tab')=='educations' && old('country_id') && old('model')  == '#addEduModal' ) ) selected @endif >Select your Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if( old('tab')=="educations" && old('country_id') == $country->id) selected @endif >{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=="educations" && old('model')  == '#addEduModal'){!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6 education-city-add " id="cities_holder">
                        <label><span class="text-danger">*</span> City</label>
                        <select name="city_id" disabled class="form-control p-0 {{ $errors->has('city_id') && old('tab')=='educations' && old('model')  == '#addEduModal' ?'is-invalid' : ''}} ">
                            <option selected="" value="1">Choose City</option>
                        </select>
                        @if(old('tab')=="educations" && old('model')  == '#addEduModal'){!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>


                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Start Year</label>
                        <input value="{{old('from_year')}}" type='text' name="from_year" class="form-control datepicker {{ $errors->has('from_year') &&old('tab') == 'educations'? 'is-invalid' : ''}}" data-language='en' />
                        @if(old('tab') == 'educations'){!! $errors->first('from_year', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> End Year</label>
                        <input value="{{old('to_year')}}" type='text' name="to_year" class="form-control datepicker {{ $errors->has('to_year') &&old('tab') == 'educations'? 'is-invalid' : ''}}" data-language='en' />
                        @if(old('tab') == 'educations'){!! $errors->first('to_year', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12">
                        <label>Notes (optional)</label>
                        <textarea value="{{old('notes')}}" name="notes" class="form-control {{ $errors->has('notes') &&old('tab') == 'educations'? 'is-invalid' : ''}}" rows="4">{{old('notes')}}</textarea>
                        @if(old('tab') == 'educations'){!! $errors->first('notes', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>


                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Add Education">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Edit your education modal -->
<!-- Edit your education modal -->
<div id="editEduModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Edit Education</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-row" >
                    @csrf
                    <input value="educations" name="tab"   type="hidden">
                    <input value="#editEduModal" name="model" type="hidden">
                    <input type="hidden" name="editbutton" value="">
                    <div class="form-group col-md-6">
                        <label for="Degree"><span class="text-danger">*</span> Degree Name</label>
                        <select id="Degree" name="degree" class="form-control p-0  {{ $errors->has('degree') &&old('tab') == 'educations'? 'is-invalid' : '' }}">
                            <option disabled selected> Select your Degree </option>
                             <option value="Bacherlor's-Degree"> Bacherlor's Degree</option>
                             <option value="Master's-Degree">Master's Degree </option>
                             <option value="MBA"> MBA</option>
                             <option value="Doctorate's-Degree"> Doctorate's Degree</option>
                             <option value="Vocational">Vocational</option>
                             <option value="Technical-Diploma">Technical Diploma </option> 
                         </select>
                         
                         @if(old('tab') == 'educations'){!! $errors->first('degree', '<div class="invalid-feedback">:message</div>') !!}@endif
                        
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Major</label>
                        <input value="{{old('major')}}" type="text" name="major" class="form-control {{ $errors->has('major') &&old('tab') == 'educations'? 'is-invalid' : ''}}" placeholder="Major">
                        @if(old('tab') == 'educations'){!! $errors->first('major', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Place Name (University,institute..)</label>
                        <input value="{{old('place_name')}}" type="text" name="place_name" class="form-control {{ $errors->has('place_name') &&old('tab') == 'educations'? 'is-invalid' : ''}}" placeholder=" Place Name">
                        @if(old('tab') == 'educations'){!! $errors->first('place_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Faculty  Name (Computer Science ..)</label>
                        <input value="{{old('faculty')}}" type="text" name="faculty" class="form-control {{ $errors->has('faculty') && old('tab') == 'educations'? 'is-invalid' : ''}}" placeholder=" Faculty Name">
                        @if(old('tab') == 'educations'){!! $errors->first('faculty', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                     <div class="form-group col-md-6">
                        <label for="country1"><span class="text-danger">*</span> Country</label>
                        <select id="country1" name="country_id" data-target=".education-city-edit" data-city="{{old('tab')=='educations' && old('model')  == '#editEduModal' ? old('city_id') :'' }}" class="country-select form-control p-0 {{ $errors->has('country_id') && old('model')  == '#editEduModal' && old('tab')=='educations'?'is-invalid' : ''}}">
                            <option disabled @if(! (old('tab')=='educations' && old('country_id') && old('model')  == '#addEduModal' ) ) selected @endif >Select your Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if( old('tab')=="educations" && old('country_id') == $country->id) selected @endif >{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('tab')=="educations" && old('model')  == '#editEduModal'){!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6 education-city-edit " id="cities_holder">
                        <label><span class="text-danger">*</span> City</label>
                        <select name="city_id" disabled class="form-control p-0 {{ $errors->has('city_id') && old('tab')=='educations' && old('model')  == '#editEduModal' ?'is-invalid' : ''}} ">
                            <option selected="" value="1">Choose City</option>
                        </select>
                        @if(old('tab')=="educations" && old('model')  == '#editEduModal'){!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>


                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Start Year</label>
                        <input value="{{old('from_year')}}" type='text' name="from_year" class="form-control datepicker {{ $errors->has('from_year') &&old('tab') == 'educations'? 'is-invalid' : ''}}" data-language='en' />
                        @if(old('tab') == 'educations'){!! $errors->first('from_year', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> End Year</label>
                        <input value="{{old('to_year')}}" type='text' name="to_year" class="form-control datepicker {{ $errors->has('to_year') &&old('tab') == 'educations'? 'is-invalid' : ''}}" data-language='en' />
                        @if(old('tab') == 'educations'){!! $errors->first('to_year', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-12">
                        <label>Notes (optional)</label>
                        <textarea value="{{old('notes')}}" name="notes" class="form-control {{ $errors->has('notes') &&old('tab') == 'educations'? 'is-invalid' : ''}}" rows="4">{{old('notes')}}</textarea>
                        @if(old('tab') == 'educations'){!! $errors->first('notes', '<div class="invalid-feedback">:message</div>') !!}@endif
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

            
            let  notes        = $("#editEduModal textarea[name='name']"),
                EditJobModel=$("#editEduModal"),
                FormEditCertModel = EditJobModel.find("form") ,
                to_year = $("#editEduModal input[name='to_year']"),
                from_year = $("#editEduModal input[name='from_year']"),
                faculty = $("#editEduModal input[name='faculty']"),
                country = $("#editEduModal select[name='country_id']"),
                degree = $("#editEduModal select[name='degree']"),
                place_name = $("#editEduModal input[name='place_name']"),
                major= $("#editEduModal input[name='major']"),
                editbutton  = $("#editEduModal input[name='editbutton']");
        
             
           // ====================
           $("body").on("click",".edit-education", function(e){
              //set value in form 
              e.preventDefault();
            
              var _elm = $(this);
              FormEditCertModel.prop('action', _elm.data("href"))
              notes.val(_elm.data("notes"))
              place_name.val(_elm.data("place_name"))
              to_year.val(_elm.data('to_year'))
              from_year.val(_elm.data('from_year'))
              faculty.val(_elm.data('faculty'))
              major.val(_elm.data('major'))
              
              editbutton.val(_elm.data('button'))
              country.data("city", _elm.data('city_id'))
              country.find(`option[value='${_elm.data("country_id")}']`).attr("selected",true)
                 .trigger('change')
                .siblings().removeAttr("selected");

             degree.find(`option[value="${_elm.data("degree")}"]`).attr("selected",true).siblings().removeAttr("selected")

            //   console.log( degree.find(`option[value="${_elm.data("degree")}"]`));s
              EditJobModel.modal("show")
              // =================


           })

            
        })


    </script>
@endpush