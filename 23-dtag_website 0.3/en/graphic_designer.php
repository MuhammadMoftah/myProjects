<?php include "header-en.php" ?>

<div class="head2 text-center">
    <div class="overlay">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">Home</a></li>
                    <li class="breadcrumb-item"><a href="careers">Careers</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Graphic Designer</li>
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
                                <img class="align-self-start mr-3" src="../images/655926676-612x612.jpg">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-md-8 col-xs-12">
                                            <h5 class="mt-0">Graphic Designer</h5>
                                        </div>

                                    </div>

                                    <p><i class="fa fa-bookmark"></i> Full Time</p>
                                    <p><i class="fa fa-calendar"></i> 2018-04-22</p>

                                </div>
                            </div>
                            <div class="description">
                                <p><span>Experience Needed:</span> More Than 2 Years </p>
                                <p><span>Vacancies:</span> 2</p>
                                <p><span>Salary: </span> Negotiable </p>
                                <h3 style="margin-top: 20px;">Job Description:</h3>
                                <div class="desc">
                                    <ul>
                                        <li>1- Design Graphical Responsive User Interface keeping in mind UX</li>
                                        <li>2- Responsible for designing the user interface and overall customer experience for our websites and applications.</li>
                                        <li>3- This includes overall navigation flow, layout of specific pages, and creation of individual graphic elements. </li>
                                        <li>4- Create determine the layout, mock-up, colors, font type, logos, pictures and other visual, verbal aspects of a website and mobile app. </li>
                                        <li>5- Responsible for creating the look and feel of web and Mobile applications.</li>
                                        <li>6- Identify emerging markets and market shifts while being fully aware of new products and competition status</li>

                                    </ul>
                                </div>
                                <h3 style="margin-top: 20px">Job Requirements </h3>
                                <div class="desc">
                                    <ul>
                                        <li>1- Minimum 2 years of experience as a web and graphic designer in the following areas: web design, mobile Application design.</li>
                                        <li>2- Very Good experience of these technologies Illustrator / Adobe Photoshop.</li>
                                        <li>3- Experience in the User Interface, Responsive Programming, Browsers Compatibility. </li>
                                        <li>4- Motion graphic is a plus </li>
                                        <li>5- Editing (video & audio) is a plus .</li>
                                        <li>6- CV to info@d-tag.net</li>

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
