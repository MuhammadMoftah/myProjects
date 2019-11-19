<?php include "header.php"; ?>


<!-- Masthead -->
<header class="masthead" style="background: linear-gradient(to bottom, rgba(92, 77, 66, .8) 0, rgba(92, 77, 66, .8) 100%), url(./images/family2.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold">
                    Welcome To Family Wealth
                </h1>
                <hr class="divider my-4" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 font-weight-light mb-5">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam quasi nesciunt impedit, officia eius labore voluptatum obcaecati saepe. Perspiciatis tempore ipsum, eius, aut expedita fuga perferendis ut nemo. Possimus, quas.
                </p>
                <a class="btn btn-main btn-xl js-scroll-trigger" href="#services">Find Out More</a>
            </div>
        </div>
    </div>
</header>


<section class="page-section" id="services">
    <div class="container">
        <h2 class="text-center mt-0">Which Service Wanna Explore!</h2>
        <hr class="divider my-4">
        <div class="row">
            <a class="col-lg-4 col-md-6 text-center" href='gold-index.php'>
                <div class="mt-5">
                    <img src="icons/icon-gold3.png" class=" mb-4" alt="">
                    <h3 class="h4 mb-2">Gold Services</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>

            <a class="col-lg-4 col-md-6 text-center" href='blog.php'>
                <div class="mt-5">
                    <img src="images/user1.jpg" class=" mb-4" alt="">
                    <h3 class="h4 mb-2">Dr. Samy Blog</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>

            <a class="col-lg-4 col-md-6 text-center" href='gold-index.php'>
                <div class="mt-5">
                    <img src="icons/icon-silver3.png" class="mb-4" alt="">
                    <h3 class="h4 mb-2">Silver Services</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- About Plans -->
<section class="page-section bg-main" id="about" style="background: linear-gradient(to bottom, rgba(92, 77, 66, .8) 0, rgba(92, 77, 66, .8) 100%), url(./images/family3.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0 text-shadow">About Us General</h2>
                <hr class="divider light my-4" />
                <p class="text-white-50 mb-5">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos laboriosam voluptas exercitationem, suscipit eaque odio unde autem dolor. Ex ducimus iste earum beatae eos harum aliquam quo velit sapiente!
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 p-3">
                <div class="part text-center">
                    <h3 class="text-white mb-2 text-shadow">Our Vision</h3>
                    <p class="text-white-50 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae perspiciatis, consequuntur fugit similique nesciunt eius nam veniam consectetur deleniti nulla nisi. Libero excepturi, expedita, neque deserunt deleniti sed. Numquam, tempora.</p>
                </div>
            </div>
            <div class="col-md-6 p-3">
                <div class="part text-center">
                    <h3 class="text-white mb-2 text-shadow">Our Mission</h3>
                    <p class="text-white-50 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae perspiciatis, consequuntur fugit similique nesciunt eius nam veniam consectetur deleniti nulla nisi. Libero excepturi, expedita, neque deserunt deleniti sed. Numquam, tempora.</p>
                </div>
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


<?php include "footer.php"; ?>


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
