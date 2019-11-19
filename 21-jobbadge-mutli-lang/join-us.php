<?php include 'header.php';?>

<!--===== Join Us =====-->
<!--===== Join Us =====-->
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title"><span>JOIN US</span></h2>
        </div>
    </div>


    <section id="tabs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-briefcase"></i> Job Seeker</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-building"></i> Company</a>
                        </div>
                    </nav>

                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="" class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputName">First Name</label>
                                    <input type="name" class="form-control" id="exampleInputName" placeholder="Enter your Username">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputLastName">Last Name</label>
                                    <input type="name" class="form-control" id="exampleInputLastName" placeholder="Enter your Last">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>

                                <div class="form-group col-md-6 d-block">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control is-valid mb-2" id="exampleInputPassword1" placeholder="Password">
                                    <div class="valid-feedback mb-3">
                                        Strong Password !
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputPassword2">Confirm Password</label>

                                    <input type="password" class="form-control is-invalid" id="exampleInputPassword2" placeholder="Conform Password">
                                    <div class="invalid-feedback mb-3">
                                        invalid Password !
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Gendar</label>

                                    <select class="form-control p-0">
                                        <option>Gendar</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="exampleInputCity">City</label>
                                    <input type="name" class="form-control" id="exampleInputCity" placeholder="Enter your city">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="exampleInputCountry">Country</label>
                                    <input type="name" class="form-control" id="exampleInputCountry" placeholder="Enter your country">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="exampleInputPhone">Phone</label>
                                    <input type="name" class="form-control" id="exampleInputPhone" placeholder="Enter your Phone">
                                </div>

                                <div class="custom-control custom-checkbox mb-3 was-validated ml-4 col-md-12">
                                    <input type="checkbox" class="custom-control-input" id="customControlValidation1" required="">
                                    <label class="custom-control-label" for="customControlValidation1">I have read <a href="terms.php" class="text-primary">Terms &amp; Conditions </a></label>
                                    <div class="invalid-feedback">Example invalid feedback text</div>
                                </div>


                                <input class="col-md-4 mx-auto btn btn-primary form-control mt-3" type="submit" value="Join us">
                            </form>
                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="" class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompany">Company Name</label>
                                    <input type="name" class="form-control" id="exampleInputCompany" placeholder="Enter you Username">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompEmail">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputCompEmail" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>

                                <div class="form-group col-md-6 d-block">
                                    <label for="compPass1">Password</label>
                                    <input type="password" class="form-control is-valid mb-2" id="compPass1" placeholder="Password">
                                    <div class="valid-feedback mb-3">
                                        Strong Password !
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="compPass2">Confirm Password</label>

                                    <input type="password" class="form-control is-invalid" id="compPass2" placeholder="Conform Password">
                                    <div class="invalid-feedback mb-3">
                                        invalid Password !
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="exampleInputCompCity">City</label>
                                    <input type="name" class="form-control" id="exampleInputCompCity" placeholder="Enter your city">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="exampleInputCompCountry">Country</label>
                                    <input type="name" class="form-control" id="exampleInputCompCountry" placeholder="Enter you country">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="exampleInputCompPhone">Phone</label>
                                    <input type="name" class="form-control" id="exampleInputCompPhone" placeholder="Enter you Phone">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="exampleInputCompEmp">Employess number</label>
                                    <input type="name" class="form-control" id="exampleInputCompEmp" placeholder="4:20 for example">
                                </div>

                                <div class="form-group col-md-6"> Upload Company Logo
                                    <input type="file" class="custom-file-input" id="CRlogo">
                                    <label style="width: 90%;top:32px" class="custom-file-label" for="CRlogo">Choose file</label>
                                </div>

                                <div class="custom-control custom-checkbox mb-3 was-validated ml-4 col-md-12">
                                    <input type="checkbox" class="custom-control-input" id="customControlValidation1" required="">
                                    <label class="custom-control-label" for="customControlValidation1">I have read <a href="terms.php" class="text-primary">Terms &amp; Conditions </a></label>
                                    <div class="invalid-feedback">Example invalid feedback text</div>
                                </div>


                                <input class="col-md-4 mx-auto btn btn-primary form-control mt-3" type="submit" value="Join us">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


<?php include 'footer.php';?>
