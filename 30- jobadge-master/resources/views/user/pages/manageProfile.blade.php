@extends('master')
@section('styles')
<link rel="stylesheet" href="{{asset('site/css/bootstrap-tagsinput.css')}}">
<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<style>
    #message {
    position: fixed;
    top: 22%;
    left: 10px;
    /* width: 120px; */
  
    }
    #inner-message {
        margin: 0 auto;
        text-align:center;
        padding:10px;
       
    }
   #diaspaly-error .invalid-feedback{
       display: block !important;
   }
</style>
@endsection
@section('body')
<div class="container text-center">
    @component('components.AlertComlateInfo')
    @endcomponent
</div>
<div class="container-blog-posts">
     
        <!-- <div class="progress my-5" style="width: 180px; height: 13px;margin: auto;">
            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ auth("user")->user()->getUserRate() }}%;" aria-valuenow="{{ auth("user")->user()->getUserRate()}}" aria-valuemin="0" aria-valuemax="100">{{ auth("user")->user()->getUserRate()}}%</div>
        </div> -->

        <section class="text-center mt-4">
            <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="200" height="200" xmlns="http://www.w3.org/2000/svg">
                <circle class="circle-chart__background" stroke="#bfbfbf" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                <circle class="circle-chart__circle" stroke="#828128" stroke-width="2" stroke-dasharray="{{ auth('user')->user()->getUserRate()}},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                <g class="circle-chart__info">
                    <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="8">{{ auth("user")->user()->getUserRate()}}%</text>
                    <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="2">{{ auth("user")->user()->getUserRate()}}% Completed!</text>
                </g>
            </svg>
        </section>
        
  
    <section class="comp-profile add-skills pt-0" id="tabs" >
        <div class="container">
            @include('layouts.message')
            <div class="row">
                <div class="col-md-12 part">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link {{!old('type')||old('type')=='add_target'||old('type')=='edit_target'||old('type')=='add_experience'||old('type')=='edit_experience'?'active':''}}" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="far fa-building"></i> Work Experince</a>

                            <a class="nav-item nav-link {{old('type')=='add_education'||old('type')=='edit_education'?'active':''}}" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-university"></i> Education</a>

                            <a class="nav-item nav-link {{old('type')=='add_language'?'active':''}}" id="nav-account-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-lightbulb"></i> Skills & Abilities</a>

                            <a class="nav-item nav-link {{old('type')=='add_certificate'||old('type')=='edit_certificate'?'active':''}}" id="nav-certi-tab" data-toggle="tab" href="#nav-certi" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-file-alt"></i> Certificates</a>

                            <a class="nav-item nav-link {{old('type')=='edit_refernces'||old('type')=='edit_refernces'?'active':''}}" id="nav-ref-tab" data-toggle="tab" href="#nav-ref" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-reply"></i> References </a>
                            
                            
                        </div>
                    </nav>

                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade {{!old('type')||old('type')=='add_target'||old('type')=='edit_target'||old('type')=='add_experience'||old('type')=='edit_experience'?'show active':''}}" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row px-3">
                                <div class="col-md-6">
                                    @foreach($user->work_experiences as $experience)
                                    <div class="col-md-12 part-body border rounded p-3 my-2">
                                        <h6 class="font-weight-bold m-0">{{$experience->title}} At {{$experience->company_name}}</h6>
                                        <small class="text-muted">{{$experience->displayStart()}} to @if($experience->till_present==1) Now @else {{$experience->displayEnd()}} @endif</small>
                                        <ico class="text-center">
                                            <i data-toggle="modal" data-target="#edit-experience-{{$experience->id}}" class="btn btn-info far fa-edit"></i>
                                            <a href="{{route('user.experience.delete',$experience->id)}}"><i class="btn btn-danger far fa-trash-alt"></i></a>
                                        </ico>
                                    </div>
                                    @include('user.modals.experience_edit')

                                    @endforeach

                                    @include('user.modals.experience_add')

                                
                                    <div class="col-sm-12 px-0">
                                        <button data-toggle="modal" data-target="#add-experience" class='btn btn-primary px-5'>Add Experience</button>
                                    </div>

                                
                                </div> 
                                <div class="col-md-6">
                                    <div class="my-2 job-target">
                                        <div class="form-group col-md-12 bg-white border rounded pb-3">
                                            <label class="font-weight-bold py-3 d-block">Target Job</label>
                                            {{--@if($user->target_job)
                                            <p class="badge-primary py-1 px-3 rounded d-inline-block">{{$user->target_job->title}} <button data-toggle="modal" data-target="#edit-target-{{$user->target_job->id}}" class="btn bg-transparent p-1"><i class="far fa-edit"></i></button></p>                                        
                                            @include('user.modals.target_edit')
                                            @endif--}}
                                            @foreach($user->target_job as $target_job)
                                            <p class="badge-primary py-1 px-3 rounded d-inline-block">{{$target_job->title}} <button data-toggle="modal" data-target="#edit-target-{{$target_job->id}}" class="btn bg-transparent p-1"><i class="far fa-edit"></i></button></p>                                        
                                            @include('user.modals.target_edit')
                                            @endforeach
                                        </div>
                                        {{--@if(!$user->target_job)--}}
                                        @include('user.modals.target_add')
                                        <button data-toggle="modal" data-target="#add-target" class='btn btn-primary px-5'>Add Target Job</button>
                                        {{--@endif--}}
                                    </div> 
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade {{old('type')=='add_education'||old('type')=='edit_education'?'show active':''}}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row px-3">
                                @foreach($user->educations as $education)
                                <div class=" col-md-6 part-body border rounded p-3 my-2">
                                    <h6 class="font-weight-bold m-0">{{$education->degree}} At {{$education->place_name}}</h6>
                                    <small class="text-muted">{{$education->displayStart()}} to {{$education->displayEnd()}}</small>
                                    <ico class="text-center">
                                        <i data-toggle="modal" data-target="#edit-education-{{$education->id}}" class="btn btn-info far fa-edit"></i>
                                        <a href="{{route('user.education.delete',$education->id)}}"><i class="btn btn-danger far fa-trash-alt"></i></a>
                                    </ico>
                                </div>
                                @include('user.modals.education_edit')
                                @endforeach
                                @include('user.modals.education_add')
                                <div class="col-sm-12 px-0">
                                    <button data-toggle="modal" data-target="#add-education" class='btn btn-primary px-5'>Add Education</button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade {{old('type')=='add_language'?'show active':''}}" id="nav-account" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-md-6 my-2">
                                    <div class="form-group col-md-12 bg-white border rounded langu-form">
                                        <label class="font-weight-bold py-3">Languages</label><br>
                                        @foreach($user->languages as $language)
                                        <p class="">{{$language->language}}: <span class="text-success">
                                                @if($language->rate==1)
                                                intermediate
                                                @elseif($language->rate==2)
                                                Good
                                                @elseif($language->rate==3)
                                                V.Good
                                                @elseif($language->rate==4)
                                                Excellent
                                                @endif
                                            </span>
                                            <a href="{{route('user.language.delete',$language->id)}}" class="close text-danger " data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </a>
                                        </p>
                                        @endforeach
                                        @include('user.modals.language_add')
                                    </div>

                                    <div class="col-sm-12 px-0">
                                        <button data-toggle="modal" data-target="#add-language" class='btn btn-success px-5'>Add Language</button>
                                    </div>
                                </div>

                                <div class="col-md-6 my-2 skills">
                                    <form id="skills-form" action="{{route('user.skills.post')}}" method="POST" class="form-row">
                                        {{ csrf_field() }}
                                        
                                        <div class="form-group col-md-12 bg-white border rounded pb-3 demo-tagsinput-area">
                                            <label class="font-weight-bold py-3 d-block">
                                                Skills
                                                <span  style="font-size: 16px;
                                                color: #9e9191;
                                                font-weight: 500;
                                                font-style: italic;
                                                padding-left: 5px;">( If you added or removed skills must click save, else will discard the change . )</span>
                                            </label>
                                           
                                            <input name="skills" placeholder="enter another skill" type="text" value="{{$user->getSkillsForEdit()}}" data-role="tagsinput" />
                                        </div>
                                        <input type="submit" value="save" class='btn btn-info px-5'> 
                                       
                                    </form>
                                </div>

                                {{-- <div class="col-md-6 my-2 job-target">
                                    <div class="form-group col-md-12 bg-white border rounded pb-3">
                                        <label class="font-weight-bold py-3 d-block">Traget Job</label>
                                        @if($user->target_job)
                                        <p class="badge-primary py-1 px-3 rounded d-inline-block">{{$user->target_job->title}} <button data-toggle="modal" data-target="#edit-target-{{$user->target_job->id}}" class="btn bg-transparent p-1"><i class="far fa-edit"></i></button></p>                                        
                                        @include('user.modals.target_edit')
                                        @endif
                                    </div>
                                    @if(!$user->target_job)
                                    @include('user.modals.target_add')
                                    <button data-toggle="modal" data-target="#add-target" class='btn btn-primary px-5'>Add Target Job</button>
                                    @endif
                                </div> --}}
                            </div>

                        </div>

                        <div class="tab-pane fade {{old('type')=='add_certificate'||old('type')=='edit_certificate'?'active show':''}}" id="nav-certi" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row px-3">
                                @foreach($user->certificates as $certificate)
                                <div class=" col-md-6 part-body border rounded p-3 my-2">
                                    <h6 class="font-weight-bold m-0">{{$certificate->name}} At {{$certificate->place_name}}</h6>
                                    <small class="text-muted">{{ $certificate->displayStart() }} to {{ $certificate->displayEnd() }}</small>
                                    <ico class="text-center">
                                        <i data-toggle="modal" data-target="#edit-certificate-{{$certificate->id}}" class="btn btn-info far fa-edit"></i>
                                        <a href="{{route('user.certificate.delete',$certificate->id)}}"><i class="btn btn-danger far fa-trash-alt"></i></a>
                                    </ico>
                                </div>
                                @include('user.modals.certificate_edit')
                                @endforeach
                                @include('user.modals.certificate_add')
                                <div class="col-sm-12 px-0">
                                    <button data-toggle="modal" data-target="#add-certificate" class='btn btn-primary px-5'>Add Certificate</button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade {{old('type')=='edit_refernces'||old('type')=='edit_refernces'?'active show':''}}" id="nav-ref" role="tabpanel" aria-labelledby="nav-ref-tab">
                            <form  enctype="multipart/form-data" method="POST" id="diaspaly-error" action="{{route('user.edit.references.post')}}">
                                @csrf
                                <input type="hidden" name="type" value="edit_refernces">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">* reference_1 name</label>
                                                <input type="text" value="{{$user->ref1_name ? $user->ref1_name : old('ref1_name') }}"
                                                      class="form-control {{ $errors->has('ref1_name') && old('type')=='edit_refernces' ? 'is-invalid' : ''}}"
                                                      name="ref1_name" maxlenght="200"
                                                      >
                                            </div>
                                            <div class="help-info">Max. Char: 200</div>
                                            
                                            @if(old('type')=="edit_refernces")
                                                {!! $errors->first('ref1_name', '<div class="invalid-feedback">:message</div>') !!}
                                            @endif
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">* reference_1 title</label>
                                                <input type="text" value="{{$user->ref1_title ? $user->ref1_title : old('ref1_title')}}"
                                                class="form-control {{ $errors->has('ref1_title') && old('type')=='edit_refernces' ? 'is-invalid' : ''}}"
                                                 name="ref1_title" maxlenght="200">
                                              
                                            </div>
                                            <div class="help-info">Max. Char: 200</div>
                                            @if(old('type')=="edit_refernces"){!! $errors->first('ref1_title', '<div class="invalid-feedback">:message</div>') !!}@endif
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">* reference_1 phone</label>
                                                <input type="text" value="{{$user->ref1_phone ? $user->ref1_phone : old('ref1_phone') }}" 
                                                 class="form-control {{ $errors->has('ref1_phone') && old('type')=='edit_refernces' ? 'is-invalid' : ''}}"
                                                 name="ref1_phone" maxlenght="200">
                                                
                                            </div>
                                            <div class="help-info">Max. Char: 200</div>
                                            @if(old('type')=="edit_refernces") {!! $errors->first('ref1_phone', '<div class="invalid-feedback">:message</div>') !!} @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">* reference_2 name</label>
                                                <input type="text" value="{{$user->ref2_name ? $user->ref2_name  : old('ref2_name') }}" 
                                                 class="form-control {{ $errors->has('ref2_name') && old('type')=='edit_refernces' ? 'is-invalid' : ''}}"
                                                 name="ref2_name" maxlenght="200">
                                            </div>
                                            <div class="help-info">Max. Char: 200</div>
                                            @if(old('type')=="edit_refernces"){!! $errors->first('ref2_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">* reference_2 title</label>
                                                <input type="text" value="{{$user->ref2_title ? $user->ref2_title : old('ref2_title') }}"
                                                class="form-control {{ $errors->has('ref2_title') && old('type')=='edit_refernces' ? 'is-invalid' : ''}}" 
                                                 name="ref2_title" maxlenght="200">
                                            </div>
                                            <div class="help-info">Max. Char: 200</div>
                                            @if(old('type')=="edit_refernces"){!! $errors->first('ref2_title', '<div class="invalid-feedback">:message</div>') !!}@endif

                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">* reference_2 phone</label>
                                                <input type="text" value="{{$user->ref2_phone ? $user->ref2_phone :old('ref2_phone')  }}"
                                                class="form-control {{ $errors->has('ref2_phone') && old('type')=='edit_refernces' ? 'is-invalid' : ''}}" 

                                                 name="ref2_phone" maxlenght="200">
                                            </div>
                                            <div class="help-info">Max. Char: 200</div>
                                            @if(old('type')=="edit_refernces"){!! $errors->first('ref2_phone', '<div class="invalid-feedback">:message</div>') !!}@endif

                                        </div>
                                        
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary waves-effect btn btn-block" type="submit">Edit</button>                   
                                  
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<!-- tags input -->
<script src="{{asset('site/js/bootstrap-tagsinput.min.js')}}"></script>
<!-- datepicker Js -->
<script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>

<!-- get cities -->
<script type="text/javascript"> 
   
    


    function getCities(country_id, cities_holder) {
        var country = country_id;
        var url = "{{route('user.countries.cities.get',':country')}}".replace(":country", country);
        $.ajax({
            url: url,
        }).done(function(response) {
            var cities = response.cities;
            var cities_select = '<label><span class="text-danger">*</span> Select your city</label><select name="city_id" class="form-control" required> <option disabled selected><span class="text-danger">*</span>please select your city</option>';
            $.each(cities, function(index, city) {
                cities_select = cities_select + '<option value="' + city.id + '">' + city.name_en + '</option>';
            });
            cities_select = cities_select + '</select>';
            $(cities_holder).html(cities_select);
        });
    }

    $('#country1').change(function() {
        getCities($(this).val(), '#cities_1');
    });

    $('#country2').change(function() {
        getCities($(this).val(), '#cities_2');
    });

    $('#country3').change(function() {
        getCities($(this).val(), '#cities_3');
    });

    $('#country4').change(function() {
        getCities($(this).val(), '#cities_4');
    });

    $('#country5').change(function() {
        getCities($(this).val(), '#cities_5');
    });

    $('#country6').change(function() {
        getCities($(this).val(), '#cities_6');
    });

    $(document).ready(function() {
        var dialog_type = "{{old('type')?old('type'):''}}";

        if (dialog_type == "add_experience") {
            $('#add-experience').modal('show');
        } else if (dialog_type == "add_education") {
            $("#add-education").modal('show');
        } else if (dialog_type == "add_target") {
            $("#add-target").modal('show');
        } else if (dialog_type == "add_certificate") {
            $("#add-certificate").modal('show');
        } else if (dialog_type == "edit_certificate") {
            $("#edit-certificate-{{old('modal')}}").modal('show');
        } else if (dialog_type == "edit_education") {
            $("#edit-education-{{old('modal')}}").modal('show');
        } else if (dialog_type == "edit_target") {
            $("#edit-target-{{old('modal')}}").modal('show');
        } else if (dialog_type == "edit_experience") {
            $("#edit-experience-{{old('modal')}}").modal('show');
        }else if (dialog_type == "add_language") {
            $("#add-language").modal('show');
        }
    });

    $('#skills-form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    // //    ==== Disable the input When Check Currntly work ====
    // //    ==== Disable the input When Check Currntly work ====
    // $('.currently-work').change(function() {
    //     if ($('.currently-work')[0].checked == true) {
    //         $('.end-date').prop('disabled', true);
    //     } else {
    //         $('.end-date').prop('disabled', false);
    //     }
    // })

    // let certificateEndDate = $(".endDateCertifcate");
    let allowEnd           = $(".allow-end")
    // console.log(certificateEndDate, allowEnd,'ss')
    allowEnd.each(disableEnableCerificaeEndDate);
    allowEnd.change(disableEnableCerificaeEndDate);
    function disableEnableCerificaeEndDate(){
        let _elment = $(this);
        let  certificateEndDate = $(_elment.data("input"))
        if(_elment.prop("checked") == true){
               
                certificateEndDate.prop("disabled",true)
                certificateEndDate.val('')
            }
            else{
                certificateEndDate.prop("disabled",false)

            }
    }
</script>
@endsection