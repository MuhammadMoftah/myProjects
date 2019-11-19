<?php include 'header.php'; ?>
<!-- CSS -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

<div class="showrooms select-design">
    <div class="container head">
        <div class="row p-0 bg-white border-bottom">
            <div class="col-md-12  p-0">
                <section class="cover" style="background-image:url(./images/cover.jpg);"></section>
            </div>
            <div class="col-lg-2 col-12 text-center">
                <div class="img" style="background-image:url(./images/male1.jpg)"></div>
            </div>
            <div class="col-lg-10 col-12 comp-contact" style="padding: 0px 31px 0 24px;">
                <h5 class="mb-1 d-inline-block mt-2">Muhammad Moftah</h5>
                <div class="d-inline-block float-lg-right">
                    <div class="stars d-inline-block mx-3 mt-1">
                        <p class="text-muted d-inline-block">15k Followers</p>
                        .
                        <p class="text-muted d-inline-block">15k Following</p>

                    </div>
                    <button class="btn btn-info w-auto" id="edit-profile">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>


    <section class="trending ">
        <div class="container product-content ">
            <div class="row bg-white mb-3 px-4">
                <div class="col-lg-12 d-flex justify-content-between mt-3 px-3">
                    <div class="d-flex flex-column">
                        <h4 class="block my-4">Start A New Design</h4>
                        <input href="" class="btn main-btn2" value="Upload A Photo">
                        <p class="my-4">Or Choose From Any of the Following Options:</p>
                    </div>
                </div>

                <div class="col-12 my-4">
                    <h6>Design Room From Scratch</h6>
                    <div class="main-carousel">
                        <a class="carousel-cell">
                            <img src="images/proj1.png" alt="">
                            <span class="text-muted">Wood Floor 1</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj2.png" alt="">
                            <span class="text-muted">Wood Floor 2</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj3.png" alt="">
                            <span class="text-muted">Wood Floor 3</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj4.png" alt="">
                            <span class="text-muted">Wood Floor 3</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj1.png" alt="">
                            <span class="text-muted">Wood Floor 1</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj2.png" alt="">
                            <span class="text-muted">Wood Floor 2</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj3.png" alt="">
                            <span class="text-muted">Wood Floor 3</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj4.png" alt="">
                            <span class="text-muted">Wood Floor 3</span>
                        </a>
                    </div>
                </div>

                <div class="col-12 my-4">
                    <h6>Design a Mood</h6>
                    <div class="main-carousel ">
                        <a class="carousel-cell">
                            <img src="images/proj1.png" alt="">
                            <span class="text-muted">Wood Floor 1</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj2.png" alt="">
                            <span class="text-muted">Wood Floor 2</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj3.png" alt="">
                            <span class="text-muted">Wood Floor 3</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj4.png" alt="">
                            <span class="text-muted">Wood Floor 3</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj1.png" alt="">
                            <span class="text-muted">Wood Floor 1</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj2.png" alt="">
                            <span class="text-muted">Wood Floor 2</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj3.png" alt="">
                            <span class="text-muted">Wood Floor 3</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj4.png" alt="">
                            <span class="text-muted">Wood Floor 3</span>
                        </a>
                    </div>
                </div>

                <div class="col-12 my-4">
                    <h6>Design a Plan</h6>
                    <div class="main-carousel">
                        <a class="carousel-cell">
                            <img src="images/proj1.png" alt="">
                            <span class="text-muted">Wood Floor 1</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj2.png" alt="">
                            <span class="text-muted">Wood Floor 2</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj3.png" alt="">
                            <span class="text-muted">Wood Floor 3</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj4.png" alt="">
                            <span class="text-muted">Wood Floor 3</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj1.png" alt="">
                            <span class="text-muted">Wood Floor 1</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj2.png" alt="">
                            <span class="text-muted">Wood Floor 2</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj3.png" alt="">
                            <span class="text-muted">Wood Floor 3</span>
                        </a>
                        <a class="carousel-cell">
                            <img src="images/proj4.png" alt="">
                            <span class="text-muted">Wood Floor 3</span>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </section>
</div>
<!--End Showrooms-->






<?php include 'footer.php'; ?>


<script>
    //    === Make div square ===
    $('.trending .product-content .part').outerHeight($('.trending .product-content .part').outerWidth());
    $(window).on('resize', function() {
        $('.trending .product-content .part').outerHeight($('.trending .product-content .part').outerWidth());
    })

</script>

<!-- JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script>
    $('.main-carousel').flickity({
        pageDots: false,
        wrapAround: true
    });

</script>
