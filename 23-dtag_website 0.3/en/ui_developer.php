<?php include "header-en.php" ?>


<div class="head2 text-center">
    <div class="overlay">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index">Home</a></li>
                    <li class="breadcrumb-item"><a href="careers">Careers</a></li>

                    <li class="breadcrumb-item active" aria-current="page">UI/UX DESIGNER</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="career_details">
    <div class="container">


        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="title">
                    <h3>Job Application</h3>
                    <div class="nw_title_line wow fadeIn animated" style="margin-bottom: 10px;"></div>
                </div>

                <form name="cvform" enctype="multipart/form-data" method="post" action="send_cv_en.php">

                    <input type="text" placeholder="First Name" class="form-control" name="firstname">
                    <input type="text" placeholder="Second Name" class="form-control" name="lastname">

                    <input type="email" placeholder="Email Address" class="form-control" name="email">
                    <input type="tel" placeholder="Phone Numbers" class="form-control" name="phone">
                    <input type="file" class="form-control" title="Upload CV" name="cv" name="cv[]">
                    <input type="text" placeholder="Linkedin Profile" class="form-control" name="linkedin">
                    <input type="text" placeholder="Address" class="form-control" name="address">
                    <input type="text" placeholder="Website" class="form-control" name="website">
                    <input type="submit" value="Send">
                </form>


            </div>
            <div class="col-md-8 col-xs-12">
                <div class="title">
                    <h3>Job Details</h3>
                    <div class="nw_title_line wow fadeIn animated" style="margin-bottom: 10px;"></div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="career">
                            <div class="media">
                                <img class="align-self-start mr-3" src="../images/images.jpg">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-md-8 col-xs-12">
                                            <h5 class="mt-0">UI/UX DESIGNER</h5>
                                        </div>

                                    </div>

                                    <p><i class="fa fa-bookmark"></i> Full Time</p>
                                    <p><i class="fa fa-calendar"></i> 2018-02-21</p>

                                </div>
                            </div>
                            <div class="description">
                                <h3>Job Description:</h3>
                                <p>Our team is rapidly growing and we're looking for a UI/UX DESIGNER to support website and design requests.</p>
                                <p><span>Experience Needed: </span> More than 1 year</p>
                                <p><span>Vacancies: </span> 2</p>
                                <p><span>Salary: </span> Negotiable</p>
                                <h3 style="margin-top: 20px;">Job Requirements:</h3>
                                <div class="desc">
                                    <ul>
                                        <li>1- Proven work experience as a UI/UX Designer </li>
                                        <li>2- Portfolio of design projects</li>
                                        <li>3- Knowledge of wireframe tools </li>
                                        <li>4- HTML , CSS, JavaScript, Jquery and Bootstrap </li>
                                        <li>5- knowledge of design software like Adobe Illustrator and Photoshop , XD is a plus</li>
                                        <li>6- Angular 4, ionic knowledge is a plus</li>
                                        <li>7- please sned your cv with sample of your previous projects</li>

                                    </ul>
                                </div>
                                <h3 style="margin-top: 20px;">More Information:</h3>
                                <p><i class="fas fa-map-marker-alt"></i> <span>Address:</span> 18 Shek Ali Mahmoud st, Mhkma square , Heliopolis, Egypt</p>
                                <p><i class="fas fa-phone"></i> <span>Phone Number:</span> 00201064474117</p>
                                <p><i class="fas fa-envelope"></i> <span>Email Address:</span> info@d-tag.net</p>

                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>




    </div>

</section>


<?php include "footer-en.php" ?>
