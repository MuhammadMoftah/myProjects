<?php include 'header.php'; ?>
<section class="one-product showrooms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 p-0">
                <div id="product-slider" class="carousel slide" data-ride="carousel" data-interval="false">
                    <a href="" class="back-btn text-white">
                        <i class="fas fa-backspace"></i>
                    </a>
                    <ol class="carousel-indicators">
                        <li style="background-image: url('images/slide1.jpg');" data-target="#product-slider" data-slide-to="0" class="active"></li>
                        <li style="background-image: url('images/slide2.jpg');" data-target="#product-slider" data-slide-to="1"></li>
                        <li style="background-image: url('images/slide3.jpg');" data-target="#product-slider" data-slide-to="2"></li>
                        <li style="background-image: url('images/big-proj4.jpg');" data-target="#product-slider" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/slide1.jpg" class="d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/slide2.jpg" class="d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/slide3.jpg" class="d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/big-proj4.jpg" class="d-block" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-slider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#product-slider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="orders text-center p-1 bg-white">
                    <button class="btn btn-outline-info my-1" data-toggle="modal" data-target="#ShareModal"><i class="fas fa-share-square"></i> Share </button>
                    <button class="btn btn-outline-info my-1" data-toggle="modal" data-target="#SaveModal"><i class="fas fa-heart"></i> Save </button>
                    <button class="btn btn-outline-info my-1"><i class="fas fa-sync-alt"></i> Compare </button>
                    <button class="btn btn-outline-info my-1"><i class="fas fa-play"></i> Start Design </button>
                </div>

                <!-- The Save Modal -->
                <div class="modal fade savemodal" id="SaveModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Save Item</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body ">
                                <div class="row product-content trending">
                                    <div class="col-md-5 px-2">
                                        <div class="part card" style="height: 287.325px;">
                                            <div class="img" style="background-image: url(./images/big-proj1.jpg);"></div>
                                            <div class="card-body  d-flex flex-column justify-content-between">
                                                <h5 class="card-title">Red Room</h5>
                                                <p class="card-text text-info m-0">
                                                    Antique
                                                </p>
                                                <p class="small text-muted">3000EGP</p>
                                                <div class="social">
                                                    <div class="stars d-block">
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <i class="far fa-star text-warning"></i>
                                                    </div>
                                                    <div>
                                                        <div class="likes d-inline-block">
                                                            <i class="fas fa-heart"></i>
                                                            <span class="small">28</span>
                                                        </div>
                                                        <div class="comments d-inline-block">
                                                            <i class="fas fa-comment-dots"></i>
                                                            <span class="small">124</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7 p-2">
                                        <div class="form-group">
                                            <select name="" id="" data-style="btn-white" class="selectpicker form-control ">
                                                <option value="">One</option>
                                                <option value="">Two</option>
                                                <option value="">Three</option>
                                                <option data-content="
                                                <div class='d-flex justify-content-between border-top py-1'>
                                                    <span>Creat New Board</span>
                                                    <span class='btn btn-info py-0'> Create</span>
                                                </div>">
                                                </option>
                                            </select>
                                            <textarea class="mt-3 form-control" name="" id="" cols="20" rows="9"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <input class="btn main-btn" type="submit" value="Save">
                                <button type="button" class="btn main-btn2" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!--End SaveModal-->

                <!-- The Share Modal -->
                <div class="modal fade sharemodal" id="ShareModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Share With</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body ">
                                <div class="row product-content trending">
                                    <div class="col-12 d-flex shareicons justify-content-between text-center border-bottom pb-3">
                                        <a href=""><i style="background-color:#3b5998;" class="fab fa-facebook-f"></i></a>
                                        <a href=""><i style="background-color:#00acee;" class="fab fa-twitter"></i></a>
                                        <a href=""><i style="background-color:#0077b5;" class="fab fa-linkedin-in"></i></a>
                                        <a href=""><i style="background-color:#CD2228;" class="fab fa-pinterest-p"></i></a>
                                        <a href=""><i style="background-color:#128c7e;" class="fab fa-whatsapp"></i></a>
                                    </div>
                                    <div class="privateshare w-100 py-2 px-3 border-bottom">
                                        <h4>Share in Private Message</h4>
                                        <div class="form-group has-search">
                                            <span class="fa fa-search form-control-feedback"></span>
                                            <input type="text" class="form-control" placeholder="Search">
                                        </div>
                                    </div>

                                    <div class="sharemail w-100 py-2 px-3">
                                        <h4>Send in mail</h4>
                                        <form action="" class="border p-3">
                                            <div class="form-group">
                                                <label for="email">To:</label>
                                                <input type="email" class="form-control" id="email" placeholder="Enter Receipt Email here">
                                            </div>

                                            <div class="form-group">
                                                <label for="subject">Subject:</label>
                                                <input type="text" class="form-control" id="subject" placeholder="Product Name">
                                            </div>

                                            <div class="form-group">
                                                <label for="message">Message:</label>
                                                <textarea style="resize:none" rows="6" class="form-control" id="messsage" placeholder="Your Message"></textarea>
                                            </div>
                                            <div class="form-group text-right">
                                                <button type="button" class="btn main-btn2" data-dismiss="modal">Cancel</button>
                                                <input class="btn main-btn" type="submit" value="Send">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End ShareModal-->

            </div>

            <div class="col-lg-4 px-4" style="max-height:700px;overflow-y:scroll">
                <div class="company-info px-0">
                    <div class="d-inline-block">
                        <img src="images/comp-logo.png" class="d-inline" alt="">
                    </div>
                    <div class="d-inline-block">
                        <h6 class="mb-1">Company Name</h6>
                        <div class="stars">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="far fa-star text-warning"></i>
                        </div>
                        <small>15k Followers</small>
                    </div>

                    <div class="d-inline-block float-right">
                        <button class="btn btn-info d-block">Follow</button>
                        <button class="btn btn-info d-block">Message</button>
                    </div>
                </div>

                <div class="product-details p-2">
                    <p class="font-weight-bold">ATS-SOFA-02A</p>
                    <span><a href="">Sofa</a> | <a href="">Living Room</a> | <a href="">Modern</a></span>

                    <p class="font-weight-bold mt-4">Available in</p>
                    <span><a href="">Octobar Branch</a> | <a href="">Maadi Branch</a> | <a href="">Zamalek Branch</a></span>

                    <aside class="row mt-4 offer-details">
                        <hgroup class="col-lg-5">
                            <h6 class="mb-0">7,225</h6>
                            <span class="font-weight-bold">Was 8,500</span>
                        </hgroup>
                        <hgroup class="col-lg-7">
                            <h6 style="margin-left: -5px;" class="mb-0">15% OFF</h6>
                            <span class="font-weight-bold">You will save: 1,275</span>
                        </hgroup>
                    </aside>

                    <aside class="offer-timer my-4">
                        <hgroup>
                            <h6 class="m-0 font-weight-bold">Offer Expires in</h6>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span id="days"></span>
                                    <p>Days</p>
                                </div>

                                <span>:</span>

                                <div>
                                    <span id="hours"></span>
                                    <br>Hours
                                </div>

                                <span>:</span>

                                <div>

                                    <span id="minutes"></span>
                                    <br>Minutes
                                </div>

                                <span>:</span>

                                <div>
                                    <span id="seconds"></span>
                                    <br>Seconds
                                </div>
                            </div>
                        </hgroup>
                        <h6 class="main-link2 mt-2 font-weight-bold text-center">Valid Until: 30 May 2019</h6>
                    </aside>

                    <p class=" mt-3"><span class="font-weight-bold">Product Specification:</span></p>
                    <p class=" mt-1"><span class="font-weight-bold">Size:</span> W180 / H90 / 100CM</p>
                    <p class=" mt-1"><span class="font-weight-bold">Style: </span>Modern</p>
                    <p class=" mt-1"><span class="font-weight-bold">Color: </span>Beige</p>
                    <p class=" mt-1"><span class="font-weight-bold">Material: </span>Leather</p>
                    <p class=" mt-1"><span class="font-weight-bold">Guarantee: </span>1 Year</p>
                    <p class=" mt-1"><span class="font-weight-bold">Other: </span></p>
                </div>

                <div class="product-details p-2">
                    <p class=" mt-1"><span class="font-weight-bold">Description: </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio fugit consequuntur sit deserunt, voluptatibus eum suscipit atque quis earum accusantium veritatis ratione impedit, rerum sint nihil officia magni tempore nulla.</p>
                </div>

                <div class="related-products p-2">
                    <p class=" mb-2">Related Products </p>
                    <div class="row  px-2">
                        <div class="col-3 px-1" style="backgroun">
                            <a href="" class="img"></a>
                        </div>

                        <div class="col-3 px-1">
                            <a href="" class="img"></a>
                        </div>

                        <div class="col-3 px-1">
                            <a href="" class="img"></a>
                        </div>

                        <div class="col-3 px-1">
                            <a href="" class="img"></a>
                        </div>
                    </div>
                    <div class="row  px-2">
                        <div class="col-3 px-1" style="backgroun">
                            <a href="" class="img"></a>
                        </div>

                        <div class="col-3 px-1">
                            <a href="" class="img"></a>
                        </div>

                        <div class="col-3 px-1">
                            <a href="" class="img"></a>
                        </div>

                        <div class="col-3 px-1">
                            <a href="" class="img"></a>
                        </div>
                    </div>
                </div>
                <div class="product-feeds py-2 ">
                    <div class="like-comment d-flex justify-content-between">
                        <button class="btn btn-info"><i class="fas fa-thumbs-up"></i> Like</button>
                        <button class="btn btn-info">Comment</button>
                    </div>
                    <p class="text-info p-2">45 Likes . 37 Saves . 7 Comments </p>

                    <div class="comments">
                        <div class="card my-2">
                            <div class="card-header p-1">
                                <img src="images/female1.jpg" alt="" class="d-inline-block mr-2">
                                <p class="font-weight-bold d-inline-block">Amira Ali | <a href="" style="color: var(--clr1);">Follow</a></p>
                                <p class="text-muted float-right m-3">25 Nov 2018</p>
                            </div>
                            <div class="card-body p-2 py-3">
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                            </div>
                            <div class="card-footer text-muted p-2 ">
                                <button class="btn btn-outline-secondary p-1"><i class="fas fa-thumbs-up"></i> Like</button>
                                <button class="btn btn-success p-1 mx-2"><i class="fas fa-reply"></i> Reply</button>
                                <p class="text-muted float-right p-2">10 Likes | 3 Replies</p>
                            </div>
                        </div>

                        <div class="card my-2">
                            <div class="card-header p-1">
                                <img src="images/female2.jpg" alt="" class="d-inline-block mr-2">
                                <p class="font-weight-bold d-inline-block">Mai Ahmed | <a href="" style="color: var(--clr1);">Follow</a></p>
                                <p class="text-muted float-right m-3">25 Nov 2018</p>
                            </div>
                            <div class="card-body p-2 py-3">
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                            </div>
                            <div class="card-footer text-muted p-2 ">
                                <button class="btn main-btn p-1"><i class="fas fa-thumbs-up"></i> Liked</button>
                                <button class="btn btn-success p-1 mx-2"><i class="fas fa-reply"></i> Reply</button>
                                <p class="text-muted float-right p-2">10 Likes | 3 Replies</p>
                            </div>
                        </div>
                    </div>
                    <!--end-comments-->

                    <div class="mycomment mt-3">
                        <img src="images/male1.jpg" alt="">
                        <input class="btn-block form-control" type="text" placeholder="Write Comment ...">

                        <div class="choosefile">
                            <label for="uploadimg"><i class="far fa-images"></i></label>
                            <input class="d-none" type="file" id="uploadimg">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<style>
    header,
    footer {
        /*        display: none;*/
    }

    body {
        background-color: #fff;
    }

</style>
<?php include 'footer.php'; ?>
<script>
    //    === Make div square ===
    $('.one-product .related-products .img').outerHeight($('.one-product .related-products .img').outerWidth());
    $(window).on('resize', function() {
        $('.one-product .related-products .img').outerHeight($('.one-product .related-products .img').outerWidth());
    })
    
    
//=== Countdown Timer ===
//=== Countdown Timer ===
const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;

let countDown = new Date('Sep 30, 2019 00:00:00').getTime(),
    x = setInterval(function () {

        let now = new Date().getTime(),
            distance = countDown - now;
        document.getElementById('days').innerText = Math.floor(distance / (day)),
            document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
            document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
            document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

        //do something later when date is reached
        //if (distance < 0) {
        //  clearInterval(x);
        //  'IT'S MY BIRTHDAY!;
        //}
    }, second)
</script>
