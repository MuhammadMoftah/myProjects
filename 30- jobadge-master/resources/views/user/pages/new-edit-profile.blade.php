@extends('master')
@section('body')
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
                    <a class="active" href="{{url('new-edit-profile')}}">Initial information</a>
                    <a href="{{url('new-edit-profile/job')}}">Target job</a>
                    <a href="{{url('new-edit-profile/exp')}}">Work experince</a>
                    <a href="{{url('new-edit-profile/edu')}}">Education</a>
                    <a href="{{url('new-edit-profile/skills')}}">Skills & Languages</a>
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
                        <a class="active" href="{{url('new-edit-profile')}}">Initial information</a>
                        <a href="{{url('new-edit-profile/job')}}">Target job</a>
                        <a href="{{url('new-edit-profile/exp')}}">Work experince</a>
                        <a href="{{url('new-edit-profile/edu')}}">Education</a>
                        <a href="{{url('new-edit-profile/skills')}}">Skills & Languages</a>
                        <a href="{{url('new-edit-profile/certi')}}">Certificates</a>
                        <a href="{{url('new-edit-profile/ref')}}">Refernces</a>
                    </nav>
                </aside>
            </nav>
                
    
            <div class="col-lg-8 mb-3">
               <main class="user-details initial-info bg-white rounded p-3">
                    <div class="card">
                        <div class="card-header py-0 d-flex justify-content-between align-items-center flex-column flex-sm-row">
                            <hgroup class="py-3">
                                <strong>Muhammad Moftah</strong> 
                                |
                                <span>Frontend Developer</span>
                            </hgroup>
                            
                            <aside class="mb-2 mb-sm-0">
                                <a href="javascript:void(0)" class="btn btn-info btn-sm" title="Edit" data-toggle="modal" data-target="#initialInfoModal"><i class="fas fa-user-edit"></i></a> 
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteInfoModal" title="Delete"><i class="far fa-trash-alt"></i></a> 
                            </aside>
                        </div>

                        <div class="card-body added-info">
                            <div class="row">
                                <div class="col-md-6 my-2">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span class="text-muted">Cairo, Egypt</span>
                                </div>

                                <div class="col-md-6 my-2">
                                    <img src="{{asset('site/images/icon/age-icon.png')}}" width="26px" alt="" style="margin-right:5px;">
                                    <span class="text-muted">26 Years</span>
                                </div>

                                <div class="col-md-6 my-2">
                                    <i class="fas fa-envelope"></i>
                                    <span class="text-muted text-lowercase">mohamed.moftah@minvotech.com</span>
                                </div>

                                <div class="col-md-6 my-2">
                                    <i class="fas fa-phone fa-rotate-90"></i>
                                    <span class="text-muted">0123456789</span>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <button class="btn btn-sm bg-main text-white mr-2">Show CV</button>
                                    <button class="btn btn-sm bg-main text-white mr-2">Watch Video CV</button>
                                </div>
                            </div>
                        </div>

                    </div>
               </main> 
            </div>
        </div>
    </div>
</section>



<!-- Initial Information Modal -->
<!-- Initial Information Modal -->
<div id="initialInfoModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Fill your initial information to increase your profile Percentage</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-row" >
                    <input value="edit_p" name="type" type="hidden">
                    <input type="hidden" name="" value="">
                    <div class="form-group col-md-6">
                        <label for="firstname">* First Name</label>
                        <input value="Muhammad" type="text" name="first_name" class="form-control " id="firstname" placeholder="First name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">* Last name</label>
                        <input value="Moftah" type="text" name="last_name" class="form-control " id="lastname" placeholder="Last name">
                        
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">* Email address</label>
                        <input value="mohamed.moftah@minvotech.com" type="email" name="email" class="form-control " id="email" aria-describedby="emailHelp" placeholder="Email address">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">* Phone</label>
                        <input value="0123456789" type="text" name="phone" class="form-control " id="phone" placeholder="Phone">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nationality">* Nationality</label>
                        <select id="nationality" name="nationality_id" class="form-control p-0 ">
                            <option disabled="" selected="">please select your nationality</option>
                            <option value="2">egyptian</option>
                            <option value="3">algerian</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country1">* Country</label>
                        <select id="country1" name="country_id" class="form-control p-0 ">
                            <option selected="" value="1">Egypt</option>
                            <option value="3">tunisie</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6" id="cities_holder">
                        <label>* City</label>
                        <select name="city_id" class="form-control p-0 ">
                            <option value="1">alexandria</option>
                            <option selected="" value="2">cairo</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">* Job Title</label>
                        <input value="Frontend" type="text" name="title" class="form-control " id="title" placeholder="Title">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="age">* Birth Date</label>
                        <input value="" type="text" name="birth_date" class="form-control  " id="Birth_Date" placeholder="Birth Date" data-language="en" data-format="y-m-d" data-dtp="dtp_BHc8T">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="gender">* Gender</label>
                        <select id="gender" name="gender" class="form-control p-0 ">
                            <option disabled="" selected="">Select your Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">   *  Upload CV (.pdf, .doc)
                        <input type="file" name="cv" class="custom-file-input " id="cv">
                        <label style="width: 90%;top:32px" class="custom-file-label" for="cv">.PDF,.DOC CV</label>
                    </div>

                    <div class="form-group col-md-6"> Profile Picture (.jpg,png,jpeg,gif)
                        <input type="file" class="custom-file-input " name="image" id="image">
                        <label style="width: 90%;top:32px" class="custom-file-label" for="image">.jpg .png .jpeg Picture</label>
                    </div>

                    <div class="form-group col-md-6"> Video Cv (.mp4)
                        <input type="file" class="custom-file-input " name="video_cv" id="video">
                        <label style="width: 90%;top:32px" class="custom-file-label" for="video">.mp4 Video Cv</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                        <input type="checkbox" name="subscription" class="custom-control-input" id="subscription">
                        <label class="custom-control-label" for="subscription">Subscription</label>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Save Changes">
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Delete Modal -->
<!-- Delete Modal -->
<div id="DeleteInfoModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #1C1C1C;">
            <div class="modal-body p-4">
                <form action="" method="POST" class="form-row text-center" >
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
@endsection