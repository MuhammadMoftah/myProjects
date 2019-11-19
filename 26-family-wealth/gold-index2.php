<?php include "gold-header.php"; ?>
<!-- Flickity Slider CSS -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<link href='./css/fullcalendar.min.css' rel='stylesheet' />
<link href='./css/fullcalendar.print.min.css' rel='stylesheet' media='print' />


<!-- Masthead -->
<header class="masthead cover" style="background: linear-gradient(to bottom, rgba(92, 77, 66, .8) 0, rgba(92, 77, 66, .8) 100%), url(./images/family1.jpg);background-position: 40% 20% !important">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-white font-weight-bold text-shadow animated fadeInDown delay-1s">
                    Welcome To Our Gold Services
                </h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>


<!--=== Fixed Nav===-->
<!--=== Fixed Nav===-->
<section class="fixed-nav">
    <a href="#About" data-toggle="tooltip" data-placement="left" title="About"></a>
    <a href="#Services" data-toggle="tooltip" data-placement="left" title="Services"></a>
    <a href="#Team" data-toggle="tooltip" data-placement="left" title=" Team"></a>
    <a href="#Partners" data-toggle="tooltip" data-placement="left" title="Partners"></a>
</section>

<!-- About Plans -->
<section class="page-section" id="About">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h2 class="mt-0 text-shadow">About Us Gold</h2>
                        <hr class="divider ligh my-4" />
                        <p class=" mb-4">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos laboriosam voluptas exercitationem, suscipit eaque odio unde autem dolor. Ex ducimus iste earum beatae eos harum aliquam quo velit sapiente! <br> <br>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos laboriosam voluptas exercitationem, suscipit eaque odio unde autem dolor. Ex ducimus iste earum beatae eos harum aliquam quo velit sapiente! <br> <br>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos laboriosam voluptas exercitationem, suscipit eaque odio unde autem dolor. Ex ducimus iste earum beatae eos harum aliquam quo velit sapiente!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="calendar" id="calendar"></div>
            </div>

        </div>
    </div>
</section>

<!--==== Explore ===-->
<!--==== Explore ===-->
<!--
<section class="page-section services-details" id="Services">
    <div class="container text-center">
        <h2 class=" mt-0">Explore Our Services</h2>
        <hr class="divider my-4" />
        <div class="row justify-content-center main-carousel" data-flickity='{ "wrapAround": "true"'>
            <a class="col-lg-4 col-md-6 text-center carousel-cell" data-toggle="modal" data-target="#myModal">
                <div class="my-3">
                    <i class="fas fa-cog fa-6x mb-4"></i>
                    <h3 class="h4 mb-2">Service Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>

            <a class="col-lg-4 col-md-6 text-center carousel-cell" data-toggle="modal" data-target="#myModal">
                <div class="my-3">
                    <i class="fas fa-cog fa-6x mb-4"></i>
                    <h3 class="h4 mb-2">Service Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>

            <a class="col-lg-4 col-md-6 text-center carousel-cell" data-toggle="modal" data-target="#myModal">
                <div class="my-3">
                    <i class="fas fa-cog fa-6x mb-4"></i>
                    <h3 class="h4 mb-2">Service Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>

            <a class="col-lg-4 col-md-6 text-center carousel-cell" data-toggle="modal" data-target="#myModal">
                <div class="my-3">
                    <i class="fas fa-cog fa-6x mb-4"></i>
                    <h3 class="h4 mb-2">Service Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>

            <a class="col-lg-4 col-md-6 text-center carousel-cell" data-toggle="modal" data-target="#myModal">
                <div class="my-3">
                    <i class="fas fa-cog fa-6x mb-4"></i>
                    <h3 class="h4 mb-2">Service Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>

            <a class="col-lg-4 col-md-6 text-center carousel-cell" data-toggle="modal" data-target="#myModal">
                <div class="my-3">
                    <i class="fas fa-cog fa-6x mb-4"></i>
                    <h3 class="h4 mb-2">Service Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>
        </div>
    </div>
</section>
-->

<section class="page-section services " id="Services">
    <div class="container text-center">
        <h2 class=" mt-0">Explore Our Services</h2>
        <hr class="divider my-4" />

        <div class="carousel" data-flickity='{"pageDots": false, "initialIndex": 1}'>
            <div class="text-center part" data-toggle="modal" data-target="#myModal">
                <div class="my-3">
                    <i class="fas fa-cog fa-6x mb-4"></i>
                    <h3 class="h4 mb-2">Service Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </div>

            <div class="text-center part" data-toggle="modal" data-target="#myModal">
                <div class="my-3">
                    <i class="fas fa-cog fa-6x mb-4"></i>
                    <h3 class="h4 mb-2">Service Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </div>

            <div class="text-center part" data-toggle="modal" data-target="#myModal">
                <div class="my-3">
                    <i class="fas fa-cog fa-6x mb-4"></i>
                    <h3 class="h4 mb-2">Service Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </div>

            <div class="text-center part" data-toggle="modal" data-target="#myModal">
                <div class="my-3">
                    <i class="fas fa-cog fa-6x mb-4"></i>
                    <h3 class="h4 mb-2">Service Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </div>

            <div class="text-center part" data-toggle="modal" data-target="#myModal">
                <div class="my-3">
                    <i class="fas fa-cog fa-6x mb-4"></i>
                    <h3 class="h4 mb-2">Service Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Service Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Service Name</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <img src="images/family1.jpg" class="w-100" alt="">
                <p class="text-muted py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis delectus mollitia explicabo maxime numquam animi tempore, architecto, eligendi iusto porro nulla pariatur, quibusdam laudantium doloribus eaque dicta, aspernatur recusandae beatae.</p>

                <p class="text-muted py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis delectus mollitia explicabo maxime numquam animi tempore, architecto, eligendi iusto porro nulla pariatur, quibusdam laudantium doloribus eaque dicta, aspernatur recusandae beatae.</p>

                <p class="text-muted py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis delectus mollitia explicabo maxime numquam animi tempore, architecto, eligendi iusto porro nulla pariatur, quibusdam laudantium doloribus eaque dicta, aspernatur recusandae beatae.</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!--==== Explore ===-->
<!--==== Explore ===-->
<section class="page-section blog">
    <div class="container">
        <h2 class=" mt-0 text-center">Latest Blogs</h2>
        <hr class="divider my-4" />
        <div class="row">

            <div class="col-lg-4 col-md-6 my-3">
                <!-- Single Blog -->
                <div class="single-blog">
                    <div class="blog-img" style="background-image:url(./images/family2.jpg);">
                        <div class="post-category">
                            <a  href="javascript:void(0)">Event</a>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-title">
                            <h4><a href="" data-toggle='modal' data-target='#BlogModal'>Event Title</a></h4>
                            <div class="meta">
                                <ul>
                                    <li>04 June 2018</li>
                                </ul>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.</p>
                        <a data-toggle='modal' data-target='#BlogModal' class="box_btn rounded">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
            <!-- Single Blog -->
                <div class="single-blog">
                    <div class="blog-img" style="background-image:url(./images/family2.jpg);">
                        <div class="post-category">
                            <a href="javascript:void(0)">Event</a>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-title">
                            <h4><a href="" data-toggle='modal' data-target='#BlogModal'>Event Title</a></h4>
                            <div class="meta">
                                <ul>
                                    <li>23 June 2018</li>
                                </ul>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.</p>
                        <a data-toggle='modal' data-target='#BlogModal' class="box_btn rounded">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <!-- Single Blog -->
                <div class="single-blog">
                    <div class="blog-img" style="background-image:url(./images/family2.jpg);">
                        <div class="post-category">
                            <a  href="javascript:void(0)">Event</a>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-title">
                            <h4><a href="" data-toggle='modal' data-target='#BlogModal'>Event Title</a></h4>
                            <div class="meta">
                                <ul>
                                    <li>31 July 2018</li>
                                </ul>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque.</p>
                        <a data-toggle='modal' data-target='#BlogModal' class="box_btn rounded">read more</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Blog Modal -->
<div class="modal fade" id="BlogModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Event Name</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <img src="images/family1.jpg" class="w-100" alt="">
                <p class="text-muted py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis delectus mollitia explicabo maxime numquam animi tempore, architecto, eligendi iusto porro nulla pariatur, quibusdam laudantium doloribus eaque dicta, aspernatur recusandae beatae.</p>

                <p class="text-muted py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis delectus mollitia explicabo maxime numquam animi tempore, architecto, eligendi iusto porro nulla pariatur, quibusdam laudantium doloribus eaque dicta, aspernatur recusandae beatae.</p>

                <p class="text-muted py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis delectus mollitia explicabo maxime numquam animi tempore, architecto, eligendi iusto porro nulla pariatur, quibusdam laudantium doloribus eaque dicta, aspernatur recusandae beatae.</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<!--=== Our Team ===-->
<!--=== Our Team ===-->
<section id="Team" class="page-section our-team" style="background: linear-gradient(to bottom, rgba(92, 77, 66, .8) 0, rgba(92, 77, 66, .8) 100%), url(./images/family8.jpg);background-attachment: fixed !important">
    <div class="container">
        <h2 class="text-center text-white text-shadow mt-0">Meet Our Team!</h2>
        <hr class="divider light my-4">
        <div class="row">
            <div class="team-slider slider col-12 py-5">
                <div class="slide text-center text-white">
                    <img src="images/user1.jpg">
                    <p class="font-weight-bold">Muhammad Moftah</p>
                    <p class="small">Frontend Developer</p>
                </div>

                <div class="slide text-center text-white">
                    <img src="images/user2.jpg">
                    <p class="font-weight-bold">Basel Ali</p>
                    <p class="small">Backend Developer</p>
                </div>

                <div class="slide text-center text-white">
                    <img src="images/user3.jpg">
                    <p class="font-weight-bold">Ahmed Osman</p>
                    <p class="small">CEO</p>
                </div>

                <div class="slide text-center text-white">
                    <img src="images/user4.jpg">
                    <p class="font-weight-bold">Dabour</p>
                    <p class="small">Scrum Master</p>
                </div>

                <div class="slide text-center text-white">
                    <img src="images/user1.jpg">
                    <p class="font-weight-bold">Muhammad Moftah</p>
                    <p class="small">Frontend Developer</p>
                </div>

                <div class="slide text-center text-white">
                    <img src="images/user2.jpg">
                    <p class="font-weight-bold">Basel Ali</p>
                    <p class="small">Backend Developer</p>
                </div>

                <div class="slide text-center text-white">
                    <img src="images/user3.jpg">
                    <p class="font-weight-bold">Ahmed Osman</p>
                    <p class="small">CEO</p>
                </div>

            </div>
        </div>
    </div>
</section>


<!--=== Our-partners ===-->
<!--=== Our-partners ===-->
<section class="page-section our-partners" id="Partners">
    <div class="container">

        <h2 class="text-center mt-0">Our Partners!</h2>
        <hr class="divider my-4">
        <div class="row">
            <div class="customer-logos slider col-12 py-5">
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg">
                </div>
                <div class="slide">
                    <img src="https://image.freepik.com/free-vector/retro-label-on-rustic-background_82147503374.jpg">
                </div>
            </div>
        </div>
    </div>
</section>


<!--=== Video Section ===-->
<!--
<section class="page-section bg-dark text-white" id="Video">
    <div class="container text-center">
        <h2 class="mb-4">Watch our Gold Video!</h2>
        <a data-toggle="modal" data-target="#VideoModal" data class="btn btn-light btn-xl" href="javascript:void(0)">Watch Now</a>
    </div>
</section>
-->

<!-- Video Modal -->
<div class="modal fade" id="VideoModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Video Name</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <video width="100%" style="max-height:400px;" controls="controls">
                    <source src="" type="video/mp4">
                    <source src="" type="video/ogg">
                </video>
            </div>
        </div>
    </div>
</div>

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
<script src='./js/jquery-3.1.1.js'></script>
    <script src='./js/moment.min.js'></script>
    <script src='./js/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                defaultDate: '2019-01-12',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [{
                        title: 'All Day Event',
                        start: '2019-01-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2019-01-07',
                        end: '2019-01-10'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2019-01-09T16:00:00'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2019-01-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2019-01-11',
                        end: '2019-01-13'
                    },
                    {
                        title: 'Meeting',
                        start: '2019-01-12T10:30:00',
                        end: '2019-01-12T12:30:00'
                    },
                    {
                        title: 'Lunch',
                        start: '2019-01-12T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2019-01-12T14:30:00'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2019-01-12T17:30:00'
                    },
                    {
                        title: 'Dinner',
                        start: '2019-01-12T20:00:00'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2019-01-13T07:00:00'
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2019-01-28'
                    }
                ]
            });

        });

    </script>
<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>

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

<!-- Flickity Slider -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<!--Calendar Plugin-->
