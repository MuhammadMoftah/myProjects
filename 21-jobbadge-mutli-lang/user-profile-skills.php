<?php include 'header.php';?>

<!--===== Join Us =====-->
<!--===== Join Us =====-->
<div class="container-blog-posts">
    <section class="comp-profile add-skills" id="tabs">
        <div class="container">
            <div class="row">

                <div class="col-md-12 part">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="far fa-building"></i> Work Experince</a>

                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-university"></i> Education</a>

                            <a class="nav-item nav-link" id="nav-account-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-lightbulb"></i> Skills & Abilities</a>

                            <a class="nav-item nav-link" id="nav-certi-tab" data-toggle="tab" href="#nav-certi" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-file-alt"></i> Certificates</a>

                        </div>
                    </nav>

                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row px-3">
                                <div class=" col-md-6 part-body border rounded p-3 my-2">
                                    <h6 class="font-weight-bold m-0">Frontend Developer At CompanyName</h6>
                                    <small class="text-muted">April 2009 to March 2011 - 2 Years</small>
                                    <ico class="text-center">
                                        <i data-toggle="modal" data-target=".work-modal" class="btn btn-info far fa-edit"></i>
                                        <i title="Delete CV" class="btn btn-danger far fa-trash-alt"></i>
                                    </ico>
                                </div>

                                <div class=" col-md-6 part-body border rounded p-3 my-2">
                                    <h6 class="font-weight-bold m-0">Frontend Developer At CompanyName</h6>
                                    <small class="text-muted">April 2009 to March 2011 - 2 Years</small>
                                    <ico class="text-center">
                                        <i data-toggle="modal" data-target=".work-modal" class="btn btn-info far fa-edit"></i>
                                        <i title="Delete CV" class="btn btn-danger far fa-trash-alt"></i>
                                    </ico>
                                </div>


                                <div class=" col-md-6 part-body border rounded p-3 my-2">
                                    <h6 class="font-weight-bold m-0">Frontend Developer At CompanyName</h6>
                                    <small class="text-muted">April 2009 to March 2011 - 2 Years</small>
                                    <ico class="text-center">
                                        <i data-toggle="modal" data-target=".work-modal" class="btn btn-info far fa-edit"></i>
                                        <i title="Delete CV" class="btn btn-danger far fa-trash-alt"></i>
                                    </ico>
                                </div>

                                <div class=" col-md-6 part-body border rounded p-3 my-2">
                                    <h6 class="font-weight-bold m-0">Frontend Developer At CompanyName</h6>
                                    <small class="text-muted">April 2009 to March 2011 - 2 Years</small>
                                    <ico class="text-center">
                                        <i data-toggle="modal" data-target=".work-modal" class="btn btn-info far fa-edit"></i>
                                        <i title="Delete CV" class="btn btn-danger far fa-trash-alt"></i>
                                    </ico>
                                </div>

                                <div class="col-sm-12 px-0">
                                    <button data-toggle="modal" data-target=".work-modal" class='btn btn-primary px-5'>Add Experince</button>
                                </div>

                                <!-- work experince Modal-->
                                <div class="modal fade work-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <form class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Job Title</label>
                                                        <input type="text" class="form-control" placeholder="Job Title">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Company Name</label>
                                                        <input type="text" class="form-control" placeholder="Company Name">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Start From</label>
                                                        <input type='text' class='form-control datepicker-here' data-language='en' />
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label" for="customCheck1">I Currently work here</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>End Date</label>
                                                        <input type='text' class='form-control datepicker-here' data-language='en' />
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Reporting to</label>
                                                        <input type="text" class="form-control" placeholder="Company Name">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputState">Industry</label>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>M3lesh 1</option>
                                                            <option>M3lesh 2</option>
                                                            <option>M3lesh 3</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputState">Country</label>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>Haha</option>
                                                            <option>He5o</option>
                                                            <option>2edo</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Description</label>
                                                        <textarea class="form-control" rows="4"></textarea>
                                                    </div>

                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row px-3">
                                <div class=" col-md-6 part-body border rounded p-3 my-2">
                                    <h6 class="font-weight-bold m-0">Computer Eng. At ModernAcademy</h6>
                                    <small class="text-muted">April 2009 to March 2011 - 5 Years</small>
                                    <ico class="text-center">
                                        <i data-toggle="modal" data-target=".edu-modal" class="btn btn-info far fa-edit"></i>
                                        <i title="Delete CV" class="btn btn-danger far fa-trash-alt"></i>
                                    </ico>
                                </div>

                                <div class=" col-md-6 part-body border rounded p-3 my-2">
                                    <h6 class="font-weight-bold m-0">Computer Eng. At ModernAcademy</h6>
                                    <small class="text-muted">April 2009 to March 2011 - 5 Years</small>
                                    <ico class="text-center">
                                        <i data-toggle="modal" data-target=".edu-modal" class="btn btn-info far fa-edit"></i>
                                        <i title="Delete CV" class="btn btn-danger far fa-trash-alt"></i>
                                    </ico>
                                </div>

                                <div class="col-sm-12 px-0">
                                    <button data-toggle="modal" data-target=".edu-modal" class='btn btn-primary px-5'>Add Education</button>
                                </div>

                                <!-- Education Modal-->
                                <div class="modal fade edu-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <form class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Degree Display Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Job Title">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputState">Degree Level <span class="text-danger">*</span></label>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>Bechalor</option>
                                                            <option>Master</option>
                                                            <option>He5o</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputState">Country <span class="text-danger">*</span></label>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>Egypt</option>
                                                            <option>2om-aldenia hhh</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>University/Institution <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Job Title">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Study <small class="text-muted">(Select with Ctrl)</small></label>
                                                        <select multiple class="form-control">
                                                            <option>Computer Engneering</option>
                                                            <option>Computer Science</option>
                                                            <option>IT / Help Desk</option>
                                                            <option>Computer Engneering</option>
                                                            <option>Computer Science</option>
                                                            <option>IT / Help Desk</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputState">Degree<span class="text-danger">*</span></label>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>Excellent</option>
                                                            <option>Very Good</option>
                                                            <option>Good</option>
                                                            <option>Normal</option>
                                                            <option>Wese5 hhh</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Start Year</label>
                                                        <input type='text' class='form-control datepicker-here' data-language='en' />
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label" for="customCheck1">I Currently Study here</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>End Year</label>
                                                        <input type='text' class='form-control datepicker-here' data-language='en' />
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Studied Subjects</label>
                                                        <textarea class="form-control" rows="4"></textarea>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>

                                        </div>
                                    </div>
                                </div> <!-- End modal-->
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-md-6 my-2">
                                    <form action="" class="form-row langu-form">
                                        <div class="form-group col-md-12 bg-white border rounded">
                                            <label class="font-weight-bold py-3">Languages</label> <br>
                                            <p class="">Arabic:
                                                <span class="text-success">Native</span>
                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </p>
                                            <p class="">English: <span class="text-success">Very Good</span>
                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </p>
                                        </div>
                                    </form>

                                    <div class="col-sm-12 px-0">
                                        <button data-toggle="modal" data-target="#myModal" class='btn btn-success px-5'>Add Language</button>
                                    </div>
                                </div>

                                <div class="col-md-6 my-2 skills">
                                    <form action="" class="form-row" id="skills-form">
                                        <div class="form-group col-md-12 bg-white border rounded pb-3">
                                            <label class="font-weight-bold py-3 d-block">Skills</label>
                                            <div class="bs-example">
                                                <input type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" />
                                            </div>
                                        </div>
                                        <input type="submit" class='btn btn-info px-5' value="Add Skill">
                                    </form>
                                </div>

                                <div class="col-md-6 my-2 job-target">
                                    <form action="" class="form-row">
                                        <div class="form-group col-md-12 bg-white border rounded pb-3">
                                            <label class="font-weight-bold py-3 d-block">Jobs Target</label>
                                            <p class="badge-primary py-1 px-3 rounded d-inline-block">Frontend Developer <button class="btn bg-transparent p-1"><i class="far fa-edit"></i></button></p>
                                        </div>
                                    </form>
                                    <button data-toggle="modal" data-target="#add-job-target" class='btn btn-primary px-5'>Add Job Target</button>

                                </div>
                            </div>

                            <!-- Language Modal-->
                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Language</label>
                                                    <select class="form-control">
                                                        <option selected>Language</option>
                                                        <option>Arabic</option>
                                                        <option>English</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Degree</label>
                                                    <select class="form-control">
                                                        <option selected>Excellent</option>
                                                        <option>Very Good</option>
                                                        <option>Good</option>
                                                        <option>Normal</option>
                                                        <option>Wese5 hhh</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Add Language</button>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- End modal-->

                            <!-- Job Target Modal-->
                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="add-job-target">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Job Target</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label>Job Title</label>
                                                    <input type="text" class="form-control" placeholder="Job Title">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Category</label>
                                                    <select class="form-control">
                                                        <option selected>Choose Category</option>
                                                        <option>IT / Software</option>
                                                        <option>Hardware</option>
                                                        <option>Sales</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Country</label>
                                                    <select class="form-control">
                                                        <option selected>Choose Country</option>
                                                        <option>Egypt</option>
                                                        <option>Oman</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>City</label>
                                                    <select class="form-control">
                                                        <option selected>Choose City</option>
                                                        <option>Cairo</option>
                                                        <option>Alex</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Industry</label>
                                                    <select class="form-control">
                                                        <option selected>Choose Industry</option>
                                                        <option>Architectural</option>
                                                        <option>Design Services</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Job Type</label>
                                                    <select class="form-control">
                                                        <option selected>Choose Job Type</option>
                                                        <option>Full time</option>
                                                        <option>Freelance</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Salary From</label>
                                                    <input type="text" class="form-control" placeholder="Job Title">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Salary To</label>
                                                    <input type="text" class="form-control" placeholder="Job Title">
                                                </div>

                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Add Jobs Target</button>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- End modal-->


                        </div>

                        <div class="tab-pane fade" id="nav-certi" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row px-3">
                                <div class=" col-md-6 part-body border rounded p-3 my-2">
                                    <h6 class="font-weight-bold m-0">Computer Eng. At ModernAcademy</h6>
                                    <small class="text-muted">April 2009 to March 2011 - 5 Years</small>
                                    <ico class="text-center">
                                        <i data-toggle="modal" data-target=".crif-modal" class="btn btn-info far fa-edit"></i>
                                        <i title="Delete CV" class="btn btn-danger far fa-trash-alt"></i>
                                    </ico>
                                </div>

                                <div class=" col-md-6 part-body border rounded p-3 my-2">
                                    <h6 class="font-weight-bold m-0">Computer Eng. At ModernAcademy</h6>
                                    <small class="text-muted">April 2009 to March 2011 - 5 Years</small>
                                    <ico class="text-center">
                                        <i data-toggle="modal" data-target=".crif-modal" class="btn btn-info far fa-edit"></i>
                                        <i title="Delete CV" class="btn btn-danger far fa-trash-alt"></i>
                                    </ico>
                                </div>

                                <div class="col-sm-12 px-0">
                                    <button data-toggle="modal" data-target=".crif-modal" class='btn btn-primary px-5'>Add Education</button>
                                </div>

                                <!-- Certificates Modal-->
                                <div class="modal fade crif-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <form class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Degree Display Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Job Title">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputState">Degree Level <span class="text-danger">*</span></label>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>Bechalor</option>
                                                            <option>Master</option>
                                                            <option>He5o</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputState">Country <span class="text-danger">*</span></label>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>Egypt</option>
                                                            <option>2om-aldenia hhh</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>University/Institution <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Job Title">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Study <small class="text-muted">(Select with Ctrl)</small></label>
                                                        <select multiple class="form-control">
                                                            <option>Computer Engneering</option>
                                                            <option>Computer Science</option>
                                                            <option>IT / Help Desk</option>
                                                            <option>Computer Engneering</option>
                                                            <option>Computer Science</option>
                                                            <option>IT / Help Desk</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputState">Degree<span class="text-danger">*</span></label>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>Excellent</option>
                                                            <option>Very Good</option>
                                                            <option>Good</option>
                                                            <option>Normal</option>
                                                            <option>Wese5 hhh</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Start Year</label>
                                                        <input type='text' class='form-control datepicker-here' data-language='en' />
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label" for="customCheck1">I Currently Study here</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>End Year</label>
                                                        <input type='text' class='form-control datepicker-here' data-language='en' />
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Studied Subjects</label>
                                                        <textarea class="form-control" rows="4"></textarea>
                                                    </div>

                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>

                                        </div>
                                    </div>
                                </div> <!-- End modal-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php include 'footer.php';?>
