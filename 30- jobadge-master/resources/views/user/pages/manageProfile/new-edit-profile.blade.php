@extends('master')
@section('styles')
<link rel="stylesheet" href="{{asset('site/css/bootstrap-tagsinput.css')}}">   
<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
<link href="{{asset('site/css/BsMultiSelect.min.css')}}" rel="stylesheet" />

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <style>
        .invalid-feedback{
            padding-top: 6px;
            display:inline-block;
        }
        .tabs .tab:not(.active){
            display: none
        }

        .add-skills .bootstrap-tagsinput input{
        padding: 5px;
    }
    .add-skills .bootstrap-tagsinput span.tag{
        background-color: #d3d3d3;
        color: black;
        font-weight: bold;
        padding: 4px 10px;
        letter-spacing: 1px;
    }
    .add-skills .bootstrap-tagsinput span.tag span:hover{
        cursor: pointer;
        color: #ec5b5b;
    }
    .langu-form p {
        width: max-content;
        border: 1.5px solid #a4a4a4;
        padding: 5px 10px;
        border-radius: 10px;
    }

    /* change design */
    .new-profile-page .user-side-menu .user-info .img{
        width: 70px;
        height: 70px;
        /* margin: 8px auto 5px auto; */
        margin:13px 0;
    }
    .dashboardcode-bsmultiselect ul.dropdown-menu {
        max-height: 400px;
        overflow: scroll;
    }
    /* #addRefModal .invalid-feedback{
       display: block !important;
   } */
    </style>
@endsection
@section('body')
<section class="new-profile-page my-3">
    <div class="container">
       
        <div class="row">
            <div class="col-sm-12">
                @include('layouts.message')
            </div>
            <aside class="col-lg-3 bg-white rounded mb-3 pb-4 user-side-menu  d-none d-lg-block">
                <hgroup class="user-info ">
                    <div class="row">
                        <div class="col-sm-4 pr-0">
                            <figure class="img" style="background-image:url('{{$user->getUserImage()}}')"></figure>
                        </div>
                        <div class="col-md-8 d-flex flex-column justify-content-center">
                            <p class="m-0 ">{{$user->first_name}} {{$user->last_name}}</p>
                            <p class="m-0 text-muted" >{{$user->title}}</p>
                        </div>
                    </div>
                   
                    <button  class="btn btn-light invite-facebook btn-block d-flex justify-content-between align-items-baseline border border" style=""> invite Friend <i class="fas fa-user-plus"></i></button>
                    <div class="progress my-4" style="height: 20px;">
                        <div class="progress-bar" role="progressbar" style="background-color:var(--clr2);width:  {{$user->getUserRate()}}%;" aria-valuenow=" {{$user->getUserRate()}}" aria-valuemin="0" aria-valuemax="100"> {{$user->getUserRate()}}%</div>
                    </div>
                    @if(!auth('user')->user()->full_register)    
                     <a class="main-link mb-5" href="javascript:void(0);"> Complete  profile to apply on jobs</a>
                    @endif
                </hgroup>

                <nav class="sections-links mt-4">
                    <a data-target="info"  class="@if(!request()->get('tab') || request()->get('tab') == 'info'  ) active  @endif" href="{{ route('user.new-edit-profile2',['tab'=>'info'])}}">Initial information</a>
                    <a data-target="jobs"  class="@if( request()->get('tab') == 'jobs'  ) active  @endif" href="{{ route('user.new-edit-profile2',['tab'=>'jobs'])}}">Target job</a>
                    <a data-target="works" class="@if( request()->get('tab') == 'works'  ) active  @endif" href="{{ route('user.new-edit-profile2',['tab'=>'works'])}}">Work Experience</a>
                    <a data-target="educations" class="@if( request()->get('tab') == 'educations'  ) active  @endif"  href="{{ route('user.new-edit-profile2',['tab'=>'educations'])}}">Education</a>
                    <a data-target="skills" class="@if( request()->get('tab') == 'skills'  ) active  @endif"  href="{{ route('user.new-edit-profile2',['tab'=>'skills'])}}">Skills & Languages</a>
                    <a data-target="certs" class="@if( request()->get('tab') == 'certs'  ) active  @endif" href="{{ route('user.new-edit-profile2',['tab'=>'certs'])}}">Certificates</a>
                    <a data-target="refs" class="@if( request()->get('tab') == 'refs'  ) active  @endif" href="{{ route('user.new-edit-profile2',['tab'=>'refs'])}} ">References</a>
                    {{-- <a data-target="account" class="@if( request()->get('tab') == 'account'  ) active  @endif" href="{{ route('user.new-edit-profile2',['tab'=>'account'])}} ">Account</a> --}}
                </nav>


                <hgroup class="user-info text-center mt-3">
                    <address class=" d-flex justify-content-between">
                        <span>Share Profile</span>
                        <div class="social-links">
                            <a target="_blank" href="{{route('user.profile.share','twitter')}}"><i class="fab fa-twitter-square"></i></a>
                            <a target="_blank"  href="{{route('user.profile.share','facebook')}}"><i class="fab fa-facebook-square"></i></a>
                            <a target="_blank"  href="{{route('user.profile.share','linkedin')}}"><i class="fab fa-linkedin"></i></a>
                            {{-- <a href="{{route('user.profile.share','tumblr')}}"><i class="fab fa-instagram"></i></a> --}}
                        </div>
                    </address>
                </hgroup>
                
            </aside>

            <!-- ==== Same Side Bar but Fixed ==== -->
            <!-- ==== Same Side Bar but Fixed ==== -->
            <nav class="nav-container user-side-menu fixed-user-side-menu shadow border d-block d-lg-none hide-nav">
                <button class="toggle-sidemenu btn btn-secondary" onclick="$('.fixed-user-side-menu').toggleClass('hide-nav')">
                    <i class="fas fa-align-justify"></i>
                </button>

                <aside class="bg-white p-2 ">
                    <hgroup class="user-info text-center">
                        <div class="row">
                            <div class="col-sm-12">
                                <figure class="img" style="background-image:url('{{$user->getUserImage()}}')"></figure>
                            </div>
                            <div class="col-sm-12 text-center">
                                <p class="m-3  ">{{$user->first_name}} {{$user->last_name}}</p>
                                <p class="m-3 text-center text-muted" >{{$user->title}}</p>
                            </div>
                        </div>
                       
                        <button  class="btn   btn-light btn-block d-flex justify-content-between align-items-baseline border border" style=""> invite Friend <i class="fas fa-user-plus"></i></button>
                        <div class="progress my-4" style="height: 20px;">
                            <div class="progress-bar" role="progressbar" style="background-color:var(--clr2);width:  {{$user->getUserRate()}}%;" aria-valuenow=" {{$user->getUserRate()}}" aria-valuemin="0" aria-valuemax="100"> {{$user->getUserRate()}}%</div>
                        </div>
                        @if(!auth('user')->user()->full_register)    
                         <a class="main-link mb-5" href="javascript:void(0);"> Complete  profile to apply on jobs</a>
                        @endif
                    </hgroup>
    
                    <nav class="sections-links mt-4">
                        <a data-target="info"  class="@if(!request()->get('tab') || request()->get('tab') == 'info'  ) active  @endif" href="{{ route('user.new-edit-profile2',['tab'=>'info'])}}">Initial information</a>
                    <a data-target="jobs"  class="@if( request()->get('tab') == 'jobs'  ) active  @endif" href="{{ route('user.new-edit-profile2',['tab'=>'jobs'])}}">Target job</a>
                    <a data-target="works" class="@if( request()->get('tab') == 'works'  ) active  @endif" href="{{ route('user.new-edit-profile2',['tab'=>'works'])}}">Work Experience</a>
                    <a data-target="educations" class="@if( request()->get('tab') == 'educations'  ) active  @endif"  href="{{ route('user.new-edit-profile2',['tab'=>'educations'])}}">Education</a>
                    <a data-target="skills" class="@if( request()->get('tab') == 'skills'  ) active  @endif"  href="{{ route('user.new-edit-profile2',['tab'=>'skills'])}}">Skills & Languages</a>
                    <a data-target="certs" class="@if( request()->get('tab') == 'certs'  ) active  @endif" href="{{ route('user.new-edit-profile2',['tab'=>'certs'])}}">Certificates</a>
                    <a data-target="refs" class="@if( request()->get('tab') == 'refs'  ) active  @endif" href="{{ route('user.new-edit-profile2',['tab'=>'refs'])}} ">References</a>
                    {{-- <a data-target="account" class="@if( request()->get('tab') == 'account'  ) active  @endif" href="{{ route('user.new-edit-profile2',['tab'=>'account'])}} ">Account</a> --}}
                    </nav>



                    <hgroup class="user-info text-center mt-3">
                        <address class=" d-flex justify-content-between">
                            <span>Share Profile</span>
                            <div class="social-links">
                                <a target="_blank" href="{{route('user.profile.share','twitter')}}"><i class="fab fa-twitter-square"></i></a>
                                <a target="_blank" href="{{route('user.profile.share','facebook')}}"><i class="fab fa-facebook-square"></i></a>
                                <a target="_blank" href="{{route('user.profile.share','linkedin')}}"><i class="fab fa-linkedin"></i></a>
                                {{-- <a href="{{route('user.profile.share','tumblr')}}"><i class="fab fa-instagram"></i></a> --}}
                            </div>
                        </address>
                    </hgroup>

                </aside>
            </nav>
                
    
            <div class="col-lg-8 mb-3">
                <div class="tabs">
                    {{-- info --}}
                    <div class="div tab @if(!request()->get('tab') || request()->get('tab') == 'info'  ) active  @endif " id="info">
                        @include('user.pages.manageProfile.tabs.info')
                    </div>
                    {{-- job --}}
                    <div class="div tab  @if( request()->get('tab') == 'jobs'  ) active  @endif" id="jobs">
                        @include('user.pages.manageProfile.tabs.job')
                    </div>

                    {{-- works --}}
                    <div class="div tab @if( request()->get('tab') == 'works'  ) active  @endif " id="works">
                        @include('user.pages.manageProfile.tabs.works')
                    </div>

                    {{-- works --}}
                    <div class="div tab @if( request()->get('tab') == 'educations'  ) active  @endif " id="educations">
                        @include('user.pages.manageProfile.tabs.education')
                    </div>

                    {{-- works --}}
                    <div class="div tab @if( request()->get('tab') == 'skills'  ) active  @endif " id="skills">
                        @include('user.pages.manageProfile.tabs.skills')
                    </div>

                     {{-- works --}}
                     <div class="div tab @if( request()->get('tab') == 'certs'  ) active  @endif " id="certs">
                        @include('user.pages.manageProfile.tabs.certf')
                    </div>

                     {{-- works --}}
                     <div class="div tab @if( request()->get('tab') == 'refs'  ) active  @endif " id="refs">
                        @include('user.pages.manageProfile.tabs.refers')
                    </div>

                    {{-- works --}}
                    {{-- <div class="div tab @if( request()->get('tab') == 'account'  ) active  @endif " id="account">
                        @include('user.pages.manageProfile.tabs.account')
                    </div> --}}
                    
                    
                </div>

            </div>
        </div>
    </div>
</section>


<!-- Delete Modal -->
<!-- Delete Modal -->
<div id="generalDeleteModel" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #1C1C1C;">
            <div class="modal-body p-4">
                <form action="" method="GET" class="form-row text-center" >
                   
                    <div class="col-12 form-group mb-3">
                        <strong class="h4 text-white"> Are you sure you want to delete this?</strong>
                    </div>

                    <div class="form-group col-md-12 mb-0">
                        <button class="btn btn-main mx-2" type="button" data-dismiss="modal"> No </button>
                        <button class="btn btn-main mx-2" type="submit">Yes</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stack('models')





    
@endsection

@section('scripts')
    <!-- datepicker Js -->
    <script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>
    {{--  --}}
    <script src="{{asset('site/js/bootstrap-tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="https://connect.facebook.net/en_US/all.js"></script>
    <script src="{{asset('site/js/BsMultiSelect.min.js')}}"></script>

        <script>
          $(document).ready(function(){
                 // general file
            var deletModel        = $("#generalDeleteModel")
            var FormDeleteModel   = deletModel.find("form") 
            var CachingUrlParmat   = new Map();
            // handel tabs
            $('#skills-form').on('keyup keypress', function(e) {    
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            
            $('.currently-work').change(function(event) {
                
                // if (this.checked == true) {
                   
                //     $('.end-date').prop('disabled', true);
                // } else {
                //     $('.end-date').prop('disabled', false);
                // }

            })
            $("body").on("change",".currently-work2",function(){
                var endDate = $(`${$(this).data('end')} .end-date `)
                
                if (this.checked == true) {
                    endDate.prop('disabled', true);
                    endDate.val("")
                   
                } else {
                    endDate.prop('disabled', false);
                }
                
            })

           

            // handle tabs =====================
            $(".sections-links").on("click","a",function(e){
               
                e.preventDefault();

                var _elm = $(this)
                hadleTabs(_elm)
               
            })

            function hadleTabs(_elm){
                if(!_elm)
                {
                    return 
                }
                _elm.siblings().removeClass("active")
                _elm.addClass("active")
                handleHideTab(_elm);
                $(".tab").removeClass("active");
                $(`#${_elm.data('target')}`).addClass("active").fadeIn(400) 
                if(_elm.data('target'))
                  handleUrl(_elm.data('target'))
            }

            function handleHideTab(_elm){
                var  _hiden = $(`*[data-target="${_elm.data('target') }"] `).not(".active")
               
                _hiden.siblings().removeClass("active")
                _hiden.addClass("active")
            }

            hadleTabs($(".sections-links a.active"))

            // ====================================

           // facebook
            FB.init({
                appId: '1074007959473341',
                status: true, // check login status
                cookie: true, // enable cookies to allow the server to access the session
                xfbml: true // parse XFBML
            });

            $(".invite-facebook").click(function () {
            
                var receiverUserIds = FB.ui({
                        method: 'send',
                        link: "{{route('user.register.get')}}"
                    },
                    function(status) {

                    }
                );
            })
            // handle the country  change 
            $("body").on("change",".country-select",function() {
                var _elm    = $(this) ;
                getCities(_elm);
            });

            // function getCitites
            function getCities(_elm){
                var apppend = $(_elm.data("target"));
                var citySelect    = _elm.data("city");
                apppend = apppend.find("select")
               
                apppend.prop('disabled', 'disabled');
                var country = _elm.val();
                if(country){
                    var url = "{{route('user.countries.cities.get',':country')}}".replace(":country", country);
                    $.ajax({
                        url: url,
                    }).done(function(response) {
                        var cities = response.cities;
                        var cities_select = ` <option disabled ${citySelect  ? "" :"selected" }>*please select your city</option>`;
                        if(cities.length == 0 )
                        cities_select = ` <option disabled selected >*please select your city</option>`;
                        $.each(cities, function(index, city) {
                            cities_select = cities_select + '<option value="' + city.id + '"'+ `${city.id == citySelect  ?  "selected" : '' }` + '>' + city.name_en + '</option>';
                        });
                        cities_select = cities_select ;
                        apppend.html(cities_select);
                        apppend.prop('disabled', false);
                    });
                }
            }

            // handle redirect back
            @if(old("tabBack"))
              var baacktab = "{{ old('tabBack')}}"
              $(`*[data-target="${ baacktab }"] `).click()
            @endif  
            // handle error model 
            @if(old('tab') && old('model'))
              var tab               = "{{old('tab')}}"
              var model             =  "{{old('model')}}"
              var editbuttonHire    = "{{old('editbutton')}}";
              var editbuttonHireElm        = $(`#${tab} button${editbuttonHire} `);

              
             
              var countryold    = $(`${model} select[name='country_id']`).first();
              if(countryold){
                getCities(countryold);
              }
            //   console.log(tab, model);
              $(`*[data-target="${ tab }"] `).click()
              if(editbuttonHire && editbuttonHireElm.length > 0 ){ 
               
                setTimeout(function(){
                    editbuttonHireElm.click()    
                },1000)
                 
              }else{
                
                $(model).modal("show")
              }
            
            @endif

           
            // general delte
            $("body").on("click", ".deleted-general" , function(event){ 
                
                FormDeleteModel.prop('action', $(this).attr("href"))
                // console.log(FormDeleteModel.prop("action"))
            })
            deletModel.on('hidden.bs.modal', function(e) {
                FormDeleteModel.prop('action', "")
            })

            
            //handel error mesag when the hide model
            $('.modal').on('hidden.bs.modal', function (e) {
                // remove message 
                
                if(this.id != 'generalDeleteModel'){
                    $(".is-invalid").removeClass("is-invalid")
                    $(".invalid-feedback").remove();
                }
                    
            })


            // handle link  for tab
             function handleUrl(tab){
                var  url = CachingUrlParmat.get(tab)
                if(!url){
                      url = window.location.href;
                    var  hashIndex = url.indexOf("#")|0;
                    
                    if (hashIndex === -1) hashIndex = url.length|0;
                    var urls = url.substring(0, hashIndex).split('?');
                    
                    if(urls.length > 1){
                    let parmars = urls[1].split("&") 
                        let outPara = {};
                    ///===================
                    for(k in parmars){
                            var keyVal = parmars[k];
                            keyVal = keyVal.split('=');
                            var ekey = keyVal[0];
                            var evalue = '';
                            if(keyVal.length>1){
                                evalue = keyVal[1];
                            }
                            if(evalue)
                                outPara[ekey] = evalue;
                        }
                        // =================
                        outPara["tab"]  = tab
                        url = new URLSearchParams(outPara).toString()
                        console.log(url,outPara)
                        url = urls[0] + "?" + url
                        

                    
                    }else{
                        url += `?tab=${tab}`
                    }
                    CachingUrlParmat.set(tab,url)
                }
                console.log(CachingUrlParmat,url)

                window.history.pushState("","", url);
            }

            // open to complate info
            @if(session()->has("comeRegister") ) 

                $(".initialInfoModalButton").click();
        
            @endif

            })
            
        </script>
        
    @stack('tabsScripts')    
@endsection

