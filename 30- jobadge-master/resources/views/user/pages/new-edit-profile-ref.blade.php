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
                    <a href="{{url('new-edit-profile/exp')}}">Work experince</a>
                    <a href="{{url('new-edit-profile/edu')}}">Education</a>
                    <a href="{{url('new-edit-profile/skills')}}">Skills & Languages</a>
                    <a href="{{url('new-edit-profile/certi')}}">Certificates</a>
                    <a class="active" href="{{url('new-edit-profile/ref')}}">Refernces</a>
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
                        <a href="{{url('new-edit-profile/skills')}}">Skills & Languages</a>
                        <a href="{{url('new-edit-profile/certi')}}">Certificates</a>
                        <a class="active" href="{{url('new-edit-profile/ref')}}">Refernces</a>
                    </nav>
                </aside>
            </nav>
                
    
            <div class="col-lg-8 mb-3">
               <main class="user-details bg-white rounded p-3">

                    <!-- ==== Show if no Experince Added ==== -->
                    <div class="card mb-1">
                        <div class="card-body text-center">
                            <strong class="text-muted">You have no  reference  yet.</strong>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body py-0 d-flex justify-content-between align-items-center flex-column flex-sm-row">
                            <hgroup class="py-3">
                                <div>
                                    <strong class="text-capitalize">Dr Muhammad Moftah</strong> 
                                </div>
                                <div class="text-muted">
                                    <strong class="text-capitalize">Team leader</strong> 
                                    at
                                    <strong class="text-capitalize">Minvotech </strong>
                                </div>
                                <div class="text-muted">
                                    <i class="fa fa-phone fa-rotate-90 mr-2 text-muted text-center" style="width: 15px;"></i>
                                    <span>0123456789</span>
                                </div> 
                                
                            </hgroup>
                            
                            <aside class="mb-2 mb-sm-0">
                                <a href="javascript:void(0)" class="btn btn-info btn-sm" title="Edit" data-toggle="modal" data-target="#editCertiModal"><i class="fas fa-user-edit"></i></a> 
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteInfoModal" title="Delete"><i class="far fa-trash-alt"></i></a> 
                            </aside>
                        </div>

                    </div>

                    <button class="btn btn-main2 mt-4 btn-sm" data-toggle="modal" data-target="#addRefModal"> <i class="fas fa-plus mr-2"></i>  Add reference </button>

               </main>
            </div>
        </div>
    </div>
</section>



<!-- Add new reference  Modal -->
<!-- Add new reference  Modal  -->
<div id="addRefModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Add new Reference</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-row" >
                    <div class="form-group col-md-6">
                        <label for="lastname">Reference name</label>
                        <input value="" type="text" name="company_name" class="form-control " id="" placeholder="Reference name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="firstname">Reference title</label>
                        <input type="text" name="" class="form-control " id="" placeholder="Reference title">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">Company name</label>
                        <input value="" type="text" name="company_name" class="form-control " id="" placeholder="Company name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">Reference number</label>
                        <input value="" type="number" name="" class="form-control " id="" placeholder="Reference name">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Add Reference">
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Edit your reference  details -->
<!-- Edit your reference  details -->
<div id="editCertiModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Add new Reference</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-row" >
                    <div class="form-group col-md-6">
                        <label for="lastname">Reference name</label>
                        <input value="" type="text" name="company_name" class="form-control " id="" placeholder="Reference name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="firstname">Reference title</label>
                        <input type="text" name="" class="form-control " id="" placeholder="Reference title">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">Company name</label>
                        <input value="" type="text" name="company_name" class="form-control " id="" placeholder="Company name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">Reference number</label>
                        <input value="" type="number" name="" class="form-control " id="" placeholder="Reference name">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Edit Reference">
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