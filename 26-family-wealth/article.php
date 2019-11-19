<?php include "gold-header.php"; ?>

<!-- Masthead -->
<header class="masthead cover" style="background: linear-gradient(to bottom, rgba(92, 77, 66, .8) 0, rgba(92, 77, 66, .8) 100%), url(./images/family9.jpg);background-position: 40% 30% !important">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-white font-weight-bold text-shadow">
                    Article
                </h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>


<!--==== Explore ===-->
<!--==== Explore ===-->
<section class="page-section blog">
    <div class="container">
        <h2 class=" mt-0 text-center">Explore The Articles</h2>
        <hr class="divider my-4"/>
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <!-- Single Blog -->
                <div class="single-blog">
                    <div class="blog-img" style="background-image:url(./images/family2.jpg);">
                        <div class="post-category">
                            <a href="javascript:void(0)">Article</a>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-title">
                            <h4><a href="" data-toggle='modal' data-target='#BlogModal'>Article Title</a></h4>
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
            <div class="col-lg-4 col-md-6">
                <!-- Single Blog -->
                <div class="single-blog">
                    <div class="blog-img" style="background-image:url(./images/family2.jpg);">
                        <div class="post-category">
                            <a href="javascript:void(0)">Article</a>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-title">
                            <h4><a href="" data-toggle='modal' data-target='#BlogModal'>Article Title</a></h4>
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
            <div class="col-lg-4 col-md-6">
                <!-- Single Blog -->
                <div class="single-blog">
                    <div class="blog-img" style="background-image:url(./images/family2.jpg);">
                        <div class="post-category">
                            <a href="javascript:void(0)">Article</a>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-title">
                            <h4><a href="" data-toggle='modal' data-target='#BlogModal'>Article Title</a></h4>
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
                <h4 class="modal-title">Article Title</h4>
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
