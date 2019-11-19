<?php include "gold-header.php"; ?>

<!-- Masthead -->
<header class="masthead cover" style="background: linear-gradient(to bottom, rgba(92, 77, 66, .8) 0, rgba(92, 77, 66, .8) 100%), url(./images/family6.jpg);background-position: 40% 50% !important">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-white font-weight-bold text-shadow">
                    Contact Us
                </h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>


<!--==== Explore ===-->
<!--==== Explore ===-->
<section class="page-section contact-us">
    <div class="container">
        <h2 class=" mt-0 text-center">Feel Free To Contact Us</h2>
        <hr class="divider my-4" />
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/best-wordpress-themes/">sl skin wordpress</a>
                    </div>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 500px;
                            width: 100%;
                            border-radius: 10px
                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 500px;
                            width: 100%;
                            border-radius: 10px
                        }

                    </style>
                </div>
            </div>

            <div class="col-md-6 mt-5">
                <form class="form-row" action="">
                    <div class="form-group col-12">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>

                    <div class="form-group col-12">
                        <label for="exampleInputName1">Your Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>

                    <div class="form-group col-12">
                        <label for="exampleInputSubject1">Subject</label>
                        <input type="text" class="form-control" id="exampleInputSubject1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>

                    <div class="form-group col-12">
                        <label for="exampleFormControlTextarea1">Your Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" style="resize:none"></textarea>
                    </div>
                    
                    <div class="form-group col-12">
                        <input type="submit" value="Send" class="btn btn-main px-5">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</section>

<!--    ==== Contact Us ====-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Let's Get In Touch!</h2>
                <hr class="divider my-4">
                <p class="text-muted mb-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos laboriosam voluptas exercitationem, suscipit eaque odio unde autem dolor. Ex ducimus iste earum beatae eos harum aliquam quo velit sapiente!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                <div>+1 (202) 555-0149</div>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                <a class="d-block" href="mailto:email@email.com">email@email.com</a>
            </div>
        </div>
    </div>
</section>


<?php include "gold-footer.php"; ?>


<script>
    //Move on Click
    $("a ").click(function() {
        let x = $(this).attr('href');
        $("html, body").animate({
                scrollTop: $(x).offset().top - 70
            },
            1000
        );
    });

</script>
