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
                    <a href="{{url('new-edit-profile')}}">Initial information</a>
                    <a href="{{url('new-edit-profile/job')}}">Target job</a>
                    <a class="active" href="{{url('new-edit-profile/exp')}}">Work experince</a>
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
                        <a href="{{url('new-edit-profile')}}">Initial information</a>
                        <a href="{{url('new-edit-profile/job')}}">Target job</a>
                        <a class="active" href="{{url('new-edit-profile/exp')}}">Work experince</a>
                        <a href="{{url('new-edit-profile/edu')}}">Education</a>
                        <a href="{{url('new-edit-profile/skills')}}">Skills & Languages</a>
                        <a href="{{url('new-edit-profile/certi')}}">Certificates</a>
                        <a href="{{url('new-edit-profile/ref')}}">Refernces</a>
                    </nav>
                </aside>
            </nav>
                
    
            <div class="col-lg-8 mb-3">
               <main class="user-details bg-white rounded p-3">

                    <!-- ==== Show if no Experince Added ==== -->
                    <div class="card mb-1">
                        <div class="card-body text-center pb-1">
                                <strong class="text-muted">You have no work experince yet.</strong>
                                <p>Add work experinces to reach your <strong>DREAM JOB!</strong></p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header py-0 d-flex justify-content-between align-items-center flex-column flex-sm-row">
                            <hgroup class="py-3">
                                <div>
                                    <span>Worked as</span>
                                    <strong class="text-capitalize">Frontend</strong> 
                                    at
                                    <strong class="text-capitalize">Minvotech </strong>
                                </div>
                                <div>
                                    <i class="far fa-clock mr-2 text-muted text-center" style="width: 15px;"></i>
                                    <strong class="text-capitalize">Mar, 2018</strong> 
                                    to
                                    <strong class="text-capitalize">Feb, 2020 </strong>
                                </div>  

                                <div>
                                    <i class="fas fa-map-marker-alt mr-2 text-muted text-center" style="width: 15px;""></i>
                                    <span class="text-muted">Cairo, Egypt</span>
                                </div>
                            </hgroup>
                            
                            <aside class="mb-2 mb-sm-0">
                                <a href="javascript:void(0)" class="btn btn-info btn-sm" title="Edit" data-toggle="modal" data-target="#editExpModal"><i class="fas fa-user-edit"></i></a> 
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteInfoModal" title="Delete"><i class="far fa-trash-alt"></i></a> 
                            </aside>
                        </div>

                        <div class="card-body added-info">
                            <div class="row">
                                <div class="col-12 my-2">
                                    <strong class="d-block h5 font-weight-bold">My role</strong>
                                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis explicabo quae sunt expedita excepturi odit numquam cum repellendus tempora? Odio omnis voluptas recusandae veritatis sed ab debitis sequi voluptate quo.</p>
                                </div>

                                <div class="col-12 my-2">
                                    <strong class="d-block h5 font-weight-bold">My achievements</strong>
                                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis explicabo quae sunt expedita excepturi odit numquam cum repellendus tempora? Odio omnis voluptas recusandae veritatis sed ab debitis sequi voluptate quo.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button class="btn btn-main2 mt-4 btn-sm" data-toggle="modal" data-target="#addExpModal"> <i class="fas fa-plus mr-2"></i>  Add Experince</button>

               </main>
            </div>
        </div>
    </div>
</section>



<!-- Add new experince Modal -->
<!-- Add new experince Modal  -->
<div id="addExpModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Add new experince</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-row" >
                    <div class="form-group col-md-6">
                        <label for="firstname">Job title</label>
                        <input type="text" name="" class="form-control " id="" placeholder=" Job title">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">Company name</label>
                        <input value="" type="text" name="company_name" class="form-control " id="" placeholder="Company name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Reporting"> Reporting to (Optional)</label>
                        <select id="Reporting" name="" class="form-control p-0 ">
                            <option disabled="" selected=""> Reporting to </option>
                            <option value="2">one</option>
                            <option value="3">two</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Industry"> Industry</label>
                        <select id="Industry" name="" class="form-control p-0 ">
                            <option disabled="" selected=""> Select Industry </option>
                            <option value="2">one</option>
                            <option value="3">two</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country1">Country</label>
                        <select id="country1" name="country_id" class="form-control p-0 ">
                            <option selected="" value="1">Choose Country</option>
                            <option value="2">Egypt</option>
                            <option value="3">tunisie</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6" id="cities_holder">
                        <label>City</label>
                        <select name="city_id" class="form-control p-0 ">
                            <option selected="" value="1">Choose City</option>
                            <option value="1">alexandria</option>
                            <option selected="" value="2">cairo</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="JobDescription">Job Description</label>
                        <textarea class="form-control" name="" id="JobDescription" rows="3"></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="Achievments">Achievments (Optional)</label>
                        <textarea class="form-control" name="" id="Achievments" rows="3"></textarea>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-6" id="cities_holder">
                                <label class="d-block">Date Started</label>
                                <select name="city_id" class="form-control p-0 d-inline-block mr-3" style="width: 40%;">
                                    <option selected value="1">Year</option>
                                    <option value="1">one</option>
                                    <option value="2">two</option>
                                </select>
                                <select name="" class="form-control p-0 d-inline-block" style="width: 40%;">
                                    <option selected value="1">Month</option>
                                    <option value="1">one</option>
                                    <option value="2">two</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6" id="cities_holder">
                                <label class="d-block">Ended Date</label>
                                <select name="city_id" class="form-control p-0 d-inline-block mr-3 end-date" style="width: 40%;">
                                    <option selected value="1">Year</option>
                                    <option value="1">one</option>
                                    <option value="2">two</option>
                                </select>

                                <select name="city_id" class="form-control p-0 d-inline-block end-date" style="width: 40%;">
                                    <option selected value="1">Month</option>
                                    <option value="1">one</option>
                                    <option value="2">to</option>
                                </select>
                            </div>

                            <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                                <input type="checkbox" name="subscription" class="custom-control-input currently-work" id="subscription">
                                <label class="custom-control-label" for="subscription">Currently work here</label>
                            </div>

                            <script>
                                //    ==== Disable the input When Check Currntly work ====
                                //    ==== Disable the input When Check Currntly work ====
                                $('.currently-work').change(function() {
                                    if ($('.currently-work')[0].checked == true) {
                                        $('.end-date').prop('disabled', true);
                                    } else {
                                        $('.end-date').prop('disabled', false);
                                    }
                                })
                            </script>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Add Experince">
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
                <h5 class="modal-title font-weight-bold w-100 ">Edit your experince details</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-row" >
                    <div class="form-group col-md-6">
                        <label for="firstname">Job title</label>
                        <input value="Old Value" type="text" name="" class="form-control " id="" placeholder=" Job title">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">Company name</label>
                        <input value="Old Value" type="text" name="company_name" class="form-control " id="" placeholder="Company name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Reporting"> Reporting to (Optional)</label>
                        <select id="Reporting" name="" class="form-control p-0 ">
                            <option disabled="" selected=""> Reporting to </option>
                            <option value="2">one</option>
                            <option value="3">two</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Industry"> Industry</label>
                        <select id="Industry" name="" class="form-control p-0 ">
                            <option disabled="" selected=""> Select Industry </option>
                            <option value="2">one</option>
                            <option value="3">two</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country1">Country</label>
                        <select id="country1" name="country_id" class="form-control p-0 ">
                            <option selected="" value="1">Choose Country</option>
                            <option value="2">Egypt</option>
                            <option value="3">tunisie</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6" id="cities_holder">
                        <label>City</label>
                        <select name="city_id" class="form-control p-0 ">
                            <option selected="" value="1">Choose City</option>
                            <option value="1">alexandria</option>
                            <option selected="" value="2">cairo</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="JobDescription">Job Description</label>
                        <textarea class="form-control" name="" id="JobDescription" rows="3"  value="Old Value"></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="Achievments">Achievments (Optional)</label>
                        <textarea class="form-control" name="" id="Achievments" rows="3" value="Old Value"></textarea>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-6" id="cities_holder">
                                <label class="d-block">Date Started</label>
                                <select name="city_id" class="form-control p-0 d-inline-block mr-3" style="width: 40%;">
                                    <option selected value="1">Year</option>
                                    <option value="1">one</option>
                                    <option value="2">two</option>
                                </select>
                                <select name="" class="form-control p-0 d-inline-block" style="width: 40%;">
                                    <option selected value="1">Month</option>
                                    <option value="1">one</option>
                                    <option value="2">two</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6" id="cities_holder">
                                <label class="d-block">Ended Date</label>
                                <select name="city_id" class="form-control p-0 d-inline-block mr-3 end-date" style="width: 40%;">
                                    <option selected value="1">Year</option>
                                    <option value="1">one</option>
                                    <option value="2">two</option>
                                </select>

                                <select name="city_id" class="form-control p-0 d-inline-block end-date" style="width: 40%;">
                                    <option selected value="1">Month</option>
                                    <option value="1">one</option>
                                    <option value="2">to</option>
                                </select>
                            </div>

                            <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                                <input type="checkbox" name="subscription" class="custom-control-input currently-work" id="subscription">
                                <label class="custom-control-label" for="subscription">Currently work here</label>
                            </div>

                            <script>
                                //    ==== Disable the input When Check Currntly work ====
                                $('.currently-work').change(function() {
                                    if ($('.currently-work')[0].checked == true) {
                                        $('.end-date').prop('disabled', true);
                                    } else {
                                        $('.end-date').prop('disabled', false);
                                    }
                                })
                            </script>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Done">
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