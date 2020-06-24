@extends('master')
@section('body')
<link rel="stylesheet" href="{{asset('site/css/bootstrap-tagsinput.css')}}">
<style>
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
</style>

<section class="new-profile-page my-5">
    <div class="container">
        <div class="row">
            <aside class="col-lg-3 bg-white rounded mb-3 pb-4 user-side-menu  d-none d-lg-block">
                <hgroup class="user-info text-center">
                    <figure class="img" style="background-image:url('{{asset('site/images/user-avatar.jpg')}}')"></figure>
                    <p class="m-0  font-weight-bold">Muhammad Moftah</p>
                    <p class="text-muted">Frontend Developer</p>
                    <address class=" d-flex justify-content-between">
                        <span>Share Profile</span>
                        <div class="social-links">
                            <a href="javascript:void(0)"><i class="fab fa-twitter-square"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-facebook-square"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-linkedin"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </div>
                    </address>
                    <button class="btn btn-light btn-block d-flex justify-content-between align-items-baseline border border" style=""> invite Friend <i class="fas fa-user-plus"></i></button>
                    <div class="progress my-4" style="height: 20px;">
                        <div class="progress-bar" role="progressbar" style="background-color:var(--clr2);width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                    </div>
                    <a class="main-link mb-5" href="javascript:void(0);"> Complete your profile to apply on jobs</a>
                </hgroup>

                <nav class="sections-links mt-4">
                    <a href="{{url('new-edit-profile')}}">Initial information</a>
                    <a href="{{url('new-edit-profile/job')}}">Target job</a>
                    <a href="{{url('new-edit-profile/exp')}}">Work experince</a>
                    <a href="{{url('new-edit-profile/edu')}}">Education</a>
                    <a class="active" href="{{url('new-edit-profile/skills')}}">Skills & Languages</a>
                    <a href="{{url('new-edit-profile/certi')}}">Certificates</a>
                    <a href="{{url('new-edit-profile/ref')}}">Refernces</a>
                </nav>
            </aside>

            <!-- ==== Same Side Bar but Fixed ==== -->
            <!-- ==== Same Side Bar but Fixed ==== -->
            <nav class="nav-container user-side-menu fixed-user-side-menu shadow border d-block d-lg-none hide-nav">
                <button class="toggle-sidemenu btn btn-secondary" onclick="$('.fixed-user-side-menu').toggleClass('hide-nav')">
                    <i class="fas fa-align-justify"></i>
                </button>

                <aside class="bg-white p-2 ">
                    <hgroup class="user-info text-center">
                        <figure class="img" style="background-image:url('{{asset('site/images/user-avatar.jpg')}}')"></figure>
                        <p class="m-0  font-weight-bold">Muhammad Moftah</p>
                        <p class="text-muted">Frontend Developer</p>
                        <address class=" d-flex justify-content-between">
                            <span>Share Profile</span>
                            <div class="social-links">
                                <a href="javascript:void(0)"><i class="fab fa-twitter-square"></i></a>
                                <a href="javascript:void(0)"><i class="fab fa-facebook-square"></i></a>
                                <a href="javascript:void(0)"><i class="fab fa-linkedin"></i></a>
                                <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                            </div>
                        </address>
                        <button class="btn btn-light btn-block d-flex justify-content-between align-items-baseline border border" style=""> invite Friend <i class="fas fa-user-plus"></i></button>
                        <div class="progress my-4" style="height: 20px;">
                            <div class="progress-bar" role="progressbar" style="background-color:var(--clr2);width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                        <a class="main-link mb-5" href="javascript:void(0);"> Complete your profile to apply on jobs</a>
                    </hgroup>
    
                    <nav class="sections-links mt-4">
                        <a href="{{url('new-edit-profile')}}">Initial information</a>
                        <a href="{{url('new-edit-profile/job')}}">Target job</a>
                        <a href="{{url('new-edit-profile/exp')}}">Work experince</a>
                        <a href="{{url('new-edit-profile/edu')}}">Education</a>
                        <a class="active" href="{{url('new-edit-profile/skills')}}">Skills & Languages</a>
                        <a href="{{url('new-edit-profile/certi')}}">Certificates</a>
                        <a href="{{url('new-edit-profile/ref')}}">Refernces</a>
                    </nav>
                </aside>
            </nav>
                
    
            <div class="col-lg-8 mb-3">
               <main class="user-details bg-white rounded p-3">

                    <form id="skills-form" class="add-skills bg-white border rounded mb-2 pb-3" action="" method="POST" class="form-row">
                        
                        <div class="form-group col-md-12  demo-tagsinput-area">
                            <label class="font-weight-bold py-3 d-block">
                                Skills
                                <span  style="font-size: 16px;
                                color: #9e9191;
                                font-weight: 500;
                                font-style: italic;
                                padding-left: 5px;">( If you added or removed skills must click save, else will discard the change . )</span>
                            </label>
                            
                            <input name="skills" class="" placeholder="Enter another skill" type="text" value="" data-role="tagsinput" />
                        </div>

                        <div class="col-12">
                            <input type="submit" value="save" class='btn btn-main2 btn-sm'> 
                        </div>
                    </form>

                    <div class="form-group bg-white border rounded langu-form">
                        <div class="col-12">
                            <label class="font-weight-bold py-3 d-block">Languages</label>
                            
                            <p class="d-inline-block mr-2">English: 
                                <span class="text-success"> Excellent </span>
                                <a href="http://127.0.0.1:8000/user/language/delete/6" class="close text-danger pl-2" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </a>
                            </p>

                            <p class="d-inline-block mr-2">Arabic: 
                                <span class="text-success"> Excellent </span>
                                <a href="http://127.0.0.1:8000/user/language/delete/6" class="close text-danger pl-2" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </a>
                            </p>
                        </div>
                       
                        <div class="col-12 pb-3">
                            <button class="btn btn-main2 mt-2 btn-sm" data-toggle="modal" data-target="#addLanguModal"> <i class="fas fa-plus mr-2"></i> Add language</button>
                        </div>
                                       
                    </div>

               </main>
            </div>
        </div>
    </div>
</section>



<!-- Add new language -->
<!-- Add new language -->
<div id="addLanguModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Add Language</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-row" >
                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span> Language</label>
                        <input value="English" type="text" name="language" class="form-control " placeholder="Enter your language">
                    </div>
    
                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span> Rate</label>
                        <select name="rate" class="form-control ">
                            <option selected="" value="4">Excellent</option>
                            <option value="3">Very Good</option>
                            <option value="2">Good</option>
                            <option value="1">intermediate</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-main2 my-1" value="Add language">
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('scripts')
<script src="{{asset('site/js/bootstrap-tagsinput.min.js')}}"></script>

<script>
    $('#skills-form').on('keyup keypress', function(e) {    
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
</script>
@endsection