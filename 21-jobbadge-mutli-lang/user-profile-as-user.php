<?php include 'header.php';?>

<!--===== Join Us =====-->
<!--===== Join Us =====-->
<div class="container-blog-posts">
    <section class="comp-profile" id="tabs">
        <div class="container">
            <div class="row">

                <div class="col-md-4 part">
                    <div class="profile">
                        <div class="card">
                            <img src="images/customer/customer2.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title text-center">Muhammad Moftah</h5>
                                <h6 class="text-center text-info">Frontend Developer</h6>
                                <p class="card-text text-left p-2">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Follow</a> 
                                <a href="#" class="btn btn-primary disabled">Followed</a>
                                <br><br>
                                <h5 class="card-title text-center">Contact Me</h5>
                                <div class=" social-login pb-5">
                                    <a class="facebook">
                                        <fa name="facebook"><i aria-hidden="true" class="fab fa-facebook-f"></i></fa>
                                    </a>
                                    <a class="google">
                                        <fa name="google"><i aria-hidden="true" class="fab fa-google"></i></fa>
                                    </a>
                                    <a class="twitter">
                                        <fa name="twitter"><i aria-hidden="true" class="fab fa-twitter"></i></fa>
                                    </a>
                                    <a class="linked">
                                        <fa name="linkedin"><i aria-hidden="true" class="fab fa-linkedin-in"></i></fa>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 part">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active w-25" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-info-circle"></i> Info</a>

                            <a class="nav-item nav-link w-25" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-edit"></i> Edit</a>

                            <a class="nav-item nav-link w-25" id="nav-account-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-cog"></i> Account</a>

                            <a class="nav-item nav-link w-25" id="nav-saved-tab" data-toggle="tab" href="#nav-saved" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-save"></i> Jobs</a>
                        </div>
                    </nav>

                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="" class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompany">Company Name</label>
                                    <input type="name" class="form-control" id="exampleInputCompany" disabled placeholder="Old Company Name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompEmail">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputCompEmail" aria-describedby="emailHelp" placeholder="email@mail.com" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompCity">City</label>
                                    <input type="name" class="form-control" id="exampleInputCompCity" placeholder="Cairo" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompCountry">Country</label>
                                    <input type="name" class="form-control" id="exampleInputCompCountry" placeholder="Egypt" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompPhone">Phone</label>
                                    <input type="name" class="form-control" id="exampleInputCompPhone" placeholder="0123456789" disabled>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Show CV</label>
                                    <a class="btn btn-secondary form-control" target="_blank" href="cv.pdf"> Show Cv</a>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="" class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompany">User Name</label>
                                    <input type="name" class="form-control" id="exampleInputCompany" placeholder="Old Company Name">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="jobTitle">Job Title</label>
                                    <input type="name" class="form-control" id="jobTitle" placeholder="Job Title">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompEmail">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputCompEmail" aria-describedby="emailHelp" placeholder="email@mail.com">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompCity">City</label>
                                    <input type="name" class="form-control" id="exampleInputCompCity" placeholder="Cairo">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompCountry">Country</label>
                                    <input type="name" class="form-control" id="exampleInputCompCountry" placeholder="Egypt">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCompPhone">Phone</label>
                                    <input type="name" class="form-control" id="exampleInputCompPhone" placeholder="0123456789">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="CompWebsite">Website</label>
                                    <input type="name" class="form-control" id="CompWebsite" placeholder="Copmany Website">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCity">City</label>
                                    <input type="name" class="form-control" id="exampleInputCity" placeholder="Enter your city">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputCountry">Country</label>
                                    <input type="name" class="form-control" id="exampleInputCountry" placeholder="Enter your country">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputPhone">Phone</label>
                                    <input type="name" class="form-control" id="exampleInputPhone" placeholder="Enter your Phone">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleAddress">Address</label>
                                    <input type="name" class="form-control" id="exampleAddress" placeholder="Enter your Adress">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="compDescribtion">Describe yourself with skills</label>
                                    <textarea class="form-control" id="compDescribtion" rows="5"></textarea>
                                </div>

                          
                                <div class="form-group col-md-6"> Upload CV
                                    <input type="file" class="custom-file-input" id="compFiles">
                                    <label style="width: 90%;top:32px" class="custom-file-label text-danger" for="compFiles">PDF CV</label>
                                </div>

                                <div class="form-group col-md-6"> Profile Picture
                                    <input type="file" class="custom-file-input" id="partnersLogo">
                                    <label style="width: 90%;top:32px" class="custom-file-label" for="partnersLogo">Profile Picture</label>
                                </div>

                                <div class="form-group col-md-12">Social Media
                                    <div class="form-row">
                                        <input type="text" class="form-control m-1 col-md-5" placeholder="Facebook">
                                        <input type="text" class="form-control m-1 col-md-5" placeholder="Twitter">
                                        <input type="text" class="form-control m-1 col-md-5" placeholder="linkdin">
                                        <input type="text" class="form-control m-1 col-md-5" placeholder="Gmail">
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-info w-25 my-1" value="Save">
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="" class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Change Your Password</label>
                                    <input type="password" class="form-control m-1" placeholder="Old Password">
                                    <input type="password" class="form-control m-1" placeholder="New Password">
                                    <input type="password" class="form-control m-1" placeholder="Confirm Password">
                                    <input type="submit" class="form-control btn btn-info m-1" value="Change">
                                </div>

                                <div class="form-group  pt-3 border-top text-center col-md-12">
                                    <div class="btn btn-danger" id="userDelete"> Delete My Account </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="nav-saved" role="tabpanel" aria-labelledby="nav-saved-tab">
                            <div class="container-post-jobs p-0">
                                <div class="container">
                                    <div class="post-job-list-view">
                                        <div class="list-view-item">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-md-6">
                                                    <div class="item-post-job">
                                                        <img src="images\logo\logo4.png" alt="" class="item-logo">
                                                        <div class="item-post">
                                                            <h4 class="post-name"><a href="job-details.php">Front End Developer</a></h4>
                                                            <span class="post-date">2 days ago</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="row no-gutters">
                                                        <div class="col-12 col-md-5">
                                                            <div class="item-position">
                                                                <span class="icon icon-pin"></span>
                                                                <span class="position-text">Cairo</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-4">
                                                            <div class="item-time-type">
                                                                <span class="icon icon-tag-black-shape"></span>
                                                                <span class="type-text">FULL TIME</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-3 text-sm-center text-md-right">
                                                            <a href="job-details.php" class="button-outline"><span>Edit</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list-view-item">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-md-6">
                                                    <div class="item-post-job">
                                                        <img src="images\logo\logo4.png" alt="" class="item-logo">
                                                        <div class="item-post">
                                                            <h4 class="post-name"><a href="job-details.php">Front End Developer</a></h4>
                                                            <span class="post-date">2 days ago</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="row no-gutters">
                                                        <div class="col-12 col-md-5">
                                                            <div class="item-position">
                                                                <span class="icon icon-pin"></span>
                                                                <span class="position-text">Cairo</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-4">
                                                            <div class="item-time-type">
                                                                <span class="icon icon-tag-black-shape"></span>
                                                                <span class="type-text">FULL TIME</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-3 text-sm-center text-md-right">
                                                            <a href="job-details.php" class="button-outline"><span>Edit</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list-view-item">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-md-6">
                                                    <div class="item-post-job">
                                                        <img src="images\logo\logo4.png" alt="" class="item-logo">
                                                        <div class="item-post">
                                                            <h4 class="post-name"><a href="job-details.php">Front End Developer</a></h4>
                                                            <span class="post-date">2 days ago</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="row no-gutters">
                                                        <div class="col-12 col-md-5">
                                                            <div class="item-position">
                                                                <span class="icon icon-pin"></span>
                                                                <span class="position-text">Cairo</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-4">
                                                            <div class="item-time-type">
                                                                <span class="icon icon-tag-black-shape"></span>
                                                                <span class="type-text">FULL TIME</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-3 text-sm-center text-md-right">
                                                            <a href="job-details.php" class="button-outline"><span>Edit</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


<?php include 'footer.php';?>
