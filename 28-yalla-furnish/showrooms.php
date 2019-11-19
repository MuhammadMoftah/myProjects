<?php include 'header.php'; ?>
<div class="showrooms">
    <div class="container head">
        <div class="row p-0 bg-white border-bottom">
            <div class="col-md-12  p-0">
                <section class="cover" style="background-image:url(./images/cover.jpg);"></section>
            </div>
            <div class="col-lg-2 col-12 text-center">
                <div class="img" style="background-image:url(./images/comp-logo.png)"></div>
            </div>
            <div class="col-lg-10 col-12 comp-contact" style="
    padding: 0px 31px 0 24px;">
                <h5 class=" d-inline-block mb-2 mt-1 font-weight-bold">
                    Company Name
                    <div class="stars d-inline-block mx-3 mt-1">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="far fa-star text-warning"></i>
                    </div>
                </h5>


                <div class="d-inline-block float-lg-right">
                    <p class="text-muted d-inline-block">15k Followers</p>
                    <button class="btn btn-info disabled">Followed</button>
                    <button class="btn btn-info" data-toggle="modal" data-target="#msgModal">Message</button>
                </div>
            </div>
        </div>
    </div>


    <section class="trending">
        <div class="container">
            <div class="row bg-white mb-3 px-4">
                <div class="col-lg-2">
                    <div class="awards">
                        <div class="part text-center">
                            <img src="images/badge1.png" alt="" title="Recommended 2018">
                            <!--                            <small class="d-block">Recommended <br> 2018</small>-->
                        </div>
                        <div class="part text-center">
                            <img src="images/badge2.png" alt="" title="Best Services">
                            <!--                            <small class="d-block">Top <br> Products <br> 2018</small>-->
                        </div>
                        <div class="part text-center">
                            <img src="images/badge3.png" alt="" title="Recommended 2018">
                            <!--                            <small class="d-block">Best <br> Services <br> 2018</small>-->
                        </div>
                        <div class="part text-center">
                            <img src="images/badge1.png" alt="" title="Best Services">
                            <!--                            <small class="d-block">Recommented <br> 2018</small>-->
                        </div>

                        <div class="part text-center">
                            <img src="images/badge1.png" alt="" title="Recommended 2018">
                            <!--                            <small class="d-block">Recommented <br> 2018</small>-->
                        </div>

                        <div class="part text-center">
                            <img src="images/badge1.png" alt="" title="Best Services">
                            <!--                            <small class="d-block">Recommented <br> 2018</small>-->
                        </div>
                        <button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#wardsModal"> All Awards (15)</button>
                    </div>

                    <div class="showroom-nav">
                        <select class="form-control p-0 my-2" id="product">
                            <option>All Products</option>
                            <option>Bathrooms</option>
                            <option>Bedrooms</option>
                            <option>Sofas</option>
                            <option>Storage</option>
                        </select>

                        <button class="btn main-btn btn-block my-2" id="offers">Yalla Offers
                            <img src="images/offers.png" alt="">
                        </button>
                        <button class="btn main-btn2 btn-block my-2" id="reviews">Reviews</button>
                        <button class="btn main-btn2 btn-block my-2" id="info">Information</button>
                        <button class="btn main-btn2 btn-block my-2" id="events">Events</button>
                    </div>
                </div>

                <div class="col-lg-10">

                    <div class="row" id="product-content">
                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <div class="img" style="background-image: url(./images/big-proj1.jpg);"></div>
                                <div class="card-body card-footer d-flex flex-column justify-content-between">
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

                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <div class="img" style="background-image: url(./images/big-proj1.jpg);"></div>
                                <div class="card-body card-footer d-flex flex-column justify-content-between">
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


                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <div class="img" style="background-image: url(./images/big-proj1.jpg);"></div>
                                <div class="card-body card-footer d-flex flex-column justify-content-between">
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

                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <div class="img" style="background-image: url(./images/big-proj1.jpg);"></div>
                                <div class="card-body card-footer d-flex flex-column justify-content-between">
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

                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <div class="img" style="background-image: url(./images/big-proj1.jpg);"></div>
                                <div class="card-body card-footer d-flex flex-column justify-content-between">
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

                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <div class="img" style="background-image: url(./images/big-proj1.jpg);"></div>
                                <div class="card-body card-footer d-flex flex-column justify-content-between">
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
                    </div>

                    <div class="row vendors offers product-content" id="offers-content" style="display:none">
                    
                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <img src="images/proj3.png" class="card-img-top" alt="">
                                <aside class="overlay text-center">
                                    <h2 class="h1">20% OFF</h2>
                                    <p>Lattice Storage Unite</p>
                                    <date>Valid Until 30 Dec 2018</date>
                                </aside>
                                <div class="card-footer">
                                    <h6 class="card-title mb-1">Product Name</h6>
                                    <h6 class="card-title">Vendor Name</h6>
                                    <div class="social mt-2">
                                        <a href="" class="small main-link2">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <img src="images/proj3.png" class="card-img-top" alt="">
                                <aside class="overlay text-center">
                                    <h2 class="h1">20% OFF</h2>
                                    <p>Lattice Storage Unite</p>
                                    <date>Valid Until 30 Dec 2018</date>
                                </aside>
                                <div class="card-footer">
                                    <h6 class="card-title mb-1">Product Name</h6>
                                    <h6 class="card-title">Vendor Name</h6>
                                    <div class="social mt-2">
                                        <a href="" class="small main-link2">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <img src="images/proj3.png" class="card-img-top" alt="">
                                <aside class="overlay text-center">
                                    <h2 class="h1">20% OFF</h2>
                                    <p>Lattice Storage Unite</p>
                                    <date>Valid Until 30 Dec 2018</date>
                                </aside>
                                <div class="card-footer">
                                    <h6 class="card-title mb-1">Product Name</h6>
                                    <h6 class="card-title">Vendor Name</h6>
                                    <div class="social mt-2">
                                        <a href="" class="small main-link2">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <img src="images/proj3.png" class="card-img-top" alt="">
                                <aside class="overlay text-center">
                                    <h2 class="h1">20% OFF</h2>
                                    <p>Lattice Storage Unite</p>
                                    <date>Valid Until 30 Dec 2018</date>
                                </aside>
                                <div class="card-footer">
                                    <h6 class="card-title mb-1">Product Name</h6>
                                    <h6 class="card-title">Vendor Name</h6>
                                    <div class="social mt-2">
                                        <a href="" class="small main-link2">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <img src="images/proj3.png" class="card-img-top" alt="">
                                <aside class="overlay text-center">
                                    <h2 class="h1">20% OFF</h2>
                                    <p>Lattice Storage Unite</p>
                                    <date>Valid Until 30 Dec 2018</date>
                                </aside>
                                <div class="card-footer">
                                    <h6 class="card-title mb-1">Product Name</h6>
                                    <h6 class="card-title">Vendor Name</h6>
                                    <div class="social mt-2">
                                        <a href="" class="small main-link2">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <img src="images/proj3.png" class="card-img-top" alt="">
                                <aside class="overlay text-center">
                                    <h2 class="h1">20% OFF</h2>
                                    <p>Lattice Storage Unite</p>
                                    <date>Valid Until 30 Dec 2018</date>
                                </aside>
                                <div class="card-footer">
                                    <h6 class="card-title mb-1">Product Name</h6>
                                    <h6 class="card-title">Vendor Name</h6>
                                    <div class="social mt-2">
                                        <a href="" class="small main-link2">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row reviews-content" id="reviews-content" style="display:none;">
                        <form class="review-box col-xl-8 border rounded ml-2 my-2">
                            <div class="d-flex justify-content-between align-items-center py-4">
                                <div class="stars d-block" style="font-size:25px;">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                </div>
                                <b>Whats your Review About This Brand?</b>
                            </div>

                            <div class="d-flex mycheckbox justify-content-between pb-4">
                                <input type="checkbox" id="cb1">
                                <label for="cb1" class="main-btn2">Custome Services</label>

                                <input type="checkbox" id="cb2">
                                <label for="cb2" class="main-btn2">Sales Attitude</label>

                                <input type="checkbox" id="cb3">
                                <label for="cb3" class="main-btn2">Prices</label>

                                <input type="checkbox" id="cb4">
                                <label for="cb4" class="main-btn2">Quality</label>

                                <input type="checkbox" id="cb5">
                                <label for="cb5" class="main-btn2">Other</label>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="" id="" cols="30" rows="6" placeholder="Please Tell Us More." style="resize:none"></textarea>
                            </div>
                            <div class="form-group text-right">
                                <input class="btn main-btn" type="submit" value="Submit">
                            </div>
                        </form>

                        <div class="topics col-xl-8 ml-2 px-0">
                            <div class="lunched-post bg-white">
                                <div class="card my-2">
                                    <div class="card-header px-1 pt-2 bg-white border-0">
                                        <img src="images/female1.jpg" alt="" class="d-inline-block mr-2">
                                        <p class="font-weight-bold d-inline-block user-name">Amira Ali | </p>
                                        <a href="" style="color: var(--clr1);">Follow</a>
                                        <p class="small text-muted d-inline-block"> Highly Recommend Caracol</p>

                                        <div class="stars p-3 float-right">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 pb-3">
                                        <p class="card-text pb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                                    </div>

                                    <div class="card-footer text-muted p-2 bg-white">
                                        <button class="btn p-1 mr-2" style="color: #939393;"><i class="fas fa-thumbs-up"></i> Like</button>
                                        <button class="btn p-1 mr-2" style="color: #939393;"><i class="fas fa-heart"></i> Save</button>
                                        <button class="btn p-1 mr-2" style="color: #939393;"><i class="fas fa-reply"></i> Reply</button>
                                        <p class="text-info float-right p-2">April 30, 2018</p>
                                    </div>

                                    <div class="card-footer p- bg-white">
                                        <div class="card comment my-3">
                                            <div class="card-header p-1 border-0">
                                                <img src="images/female2.jpg" alt="" class="d-inline-block mr-2">
                                                <p class="font-weight-bold d-inline-block user-name">Mai Ahmed | </p>
                                                <a href="" style="color: var(--clr1);">Follow</a>
                                                <p class="text-muted float-right m-3">25 Nov 2018 <a class="fas fa-flag text-secondary" data-toggle="modal" data-target="#reportModal"></a></p>
                                            </div>
                                            <div class="card-header border-0 pl-5 py-3 bg-transparent">
                                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                                            </div>

                                            <div class="card-footer pl-5 border-0 text-muted p-2">
                                                <input type="text" class="form-control my-2" placeholder="Add Reply ...">
                                                <button class="btn p-1 mr-2" style="color: var(--clr1);"><i class="fas fa-thumbs-up"></i> Liked</button>
                                                <button class="btn p-1 mr-2" style="color: #939393;"><i class="fas fa-reply"></i> Reply</button>
                                                <p class="text-info float-right p-2">10 Likes | 3 Replies</p>
                                            </div>
                                        </div> <!-- end Comment -->

                                        <div class="card comment my-3">
                                            <div class="card-header p-1 border-0">
                                                <img src="images/female2.jpg" alt="" class="d-inline-block mr-2">
                                                <p class="font-weight-bold d-inline-block user-name">Mai Ahmed | </p>
                                                <a href="" style="color: var(--clr1);">Follow</a>
                                                <p class="text-muted float-right m-3">25 Nov 2018 <a class="fas fa-flag text-secondary" data-toggle="modal" data-target="#reportModal"></a></p>
                                            </div>
                                            <div class="card-header border-0 pl-5 py-3 bg-transparent">
                                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                                            </div>

                                            <div class="card-footer pl-5 border-0 text-muted p-2">
                                                <input type="text" class="form-control my-2" placeholder="Add Reply ...">
                                                <button class="btn p-1 mr-2" style="color: var(--clr1);"><i class="fas fa-thumbs-up"></i> Liked</button>
                                                <button class="btn p-1 mr-2" style="color: #939393;"><i class="fas fa-reply"></i> Reply</button>
                                                <p class="text-info float-right p-2">10 Likes | 3 Replies</p>
                                            </div>
                                        </div> <!-- end Comment -->

                                        <a href="" class="main-link2 pb-3 d-block">Load More Replies</a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row border-bottom pb-4 mb-5" id="info-content" style="display:none">
                        <div class="col-md-12 border-bottom py-3 px-2">
                            <h5>About</h5>
                            <p class="py-2 text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, vel facilis sed atque. Saepe quae, hic consequatur. Ea fugit, quisquam, vitae officia optio vel, ullam, obcaecati qui sit ex veniam? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, vel facilis sed atque. Saepe quae, hic consequatur. Ea fugit, quisquam, vitae officia optio vel, ullam, obcaecati qui sit ex veniam?</p>

                            <p class="py-2 text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis.
                                Ea fugit, quisquam, vitae officia optio vel, ullam, obcaecati qui sit ex veniam? Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="col-md-12 py-3 px-2">
                            <h5>Branches</h5>
                        </div>

                        <div class="col-lg-4 col-md-6 px-2">
                            <div class="card">
                                <div class="maps" id="googleMap"></div>
                                <div class="card-footer">
                                    <p class="text-secondary">
                                        <i class="fas fa-map-marked-alt"></i>
                                        5A Ghernata St, Roxi-Heliopolis
                                    </p>
                                    <p class="text-secondary">
                                        <i class="far fa-clock"></i>
                                        11:00 AM - 10PX
                                    </p>
                                    <p class="text-secondary">
                                        <i class="fas fa-mobile-alt"></i>
                                        11:00 AM - 10PX
                                    </p>
                                </div>
                            </div>

                            <script>
                                function myMap() {
                                    var mapProp = {
                                        center: new google.maps.LatLng(51.508742, -0.120850),
                                        zoom: 5,
                                    };
                                    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                                }

                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDN20kC8MqPDJpEtZy2fwsANW5JZ2Ti6gg&callback=myMap"></script>
                        </div>

                        <div class="col-lg-4 col-md-6 px-2">
                            <div class="card">
                                <div class="maps" id="googleMap2"></div>
                                <div class="card-footer">
                                    <p class="text-secondary">
                                        <i class="fas fa-map-marked-alt"></i>
                                        5A Ghernata St, Roxi-Heliopolis
                                    </p>
                                    <p class="text-secondary">
                                        <i class="far fa-clock"></i>
                                        11:00 AM - 10PX
                                    </p>
                                    <p class="text-secondary">
                                        <i class="fas fa-mobile-alt"></i>
                                        11:00 AM - 10PX
                                    </p>
                                </div>
                            </div>

                            <script>
                                function myMap() {
                                    var mapProp = {
                                        center: new google.maps.LatLng(51.508742, -0.120850),
                                        zoom: 5,
                                    };
                                    var map = new google.maps.Map(document.getElementById("googleMap2"), mapProp);
                                }

                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDN20kC8MqPDJpEtZy2fwsANW5JZ2Ti6gg&callback=myMap"></script>
                        </div>

                        <div class="col-lg-4 col-md-6 px-2">
                            <div class="card">
                                <div class="maps" id="googleMap3"></div>
                                <div class="card-footer">
                                    <p class="text-secondary">
                                        <i class="fas fa-map-marked-alt"></i>
                                        5A Ghernata St, Roxi-Heliopolis
                                    </p>
                                    <p class="text-secondary">
                                        <i class="far fa-clock"></i>
                                        11:00 AM - 10PX
                                    </p>
                                    <p class="text-secondary">
                                        <i class="fas fa-mobile-alt"></i>
                                        11:00 AM - 10PX
                                    </p>
                                </div>
                            </div>

                            <script>
                                function myMap() {
                                    var mapProp = {
                                        center: new google.maps.LatLng(51.508742, -0.120850),
                                        zoom: 5,
                                    };
                                    var map = new google.maps.Map(document.getElementById("googleMap3"), mapProp);
                                }

                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDN20kC8MqPDJpEtZy2fwsANW5JZ2Ti6gg&callback=myMap"></script>
                        </div>

                        <div class="col-md-12 border-top mt-4 py-3">
                            <h5>Caracol on Social Network</h5>
                            <div class="container pt-2">
                                <div class="row social-links">
                                    <div class="col-lg px-0 my-1">
                                        <a href="">
                                            <i class="fas fa-globe"></i> Website
                                        </a>
                                    </div>

                                    <div class="col-lg px-0 my-1">
                                        <a href="">
                                            <i class="fab fa-facebook-f "></i> Facebook
                                        </a>
                                    </div>

                                    <div class="col-lg px-0 my-1">
                                        <a href="">
                                            <i class="fab fa-instagram "></i> Instagram
                                        </a>
                                    </div>

                                    <div class="col-lg px-0 my-1">
                                        <a href="">
                                            <i class="fab fa-youtube"></i> Youtube
                                        </a>
                                    </div>

                                    <div class="col-lg px-0 my-1">
                                        <a href="">
                                            <i class="fab fa-twitter"></i> Twitter
                                        </a>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row" id="events-content" style="display:none">
                        Events-content
                    </div>

                </div>


            </div>
        </div>
    </section>


    <!-- The Wards Modal -->
    <div class="modal fade awardsmodal" id="wardsModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">All Wards</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body p-0 pb-3">
                    <div class="awards" style="box-shadow:none">
                        <div class="part text-center">
                            <img src="images/badge1.png" alt="">
                            <small class="d-block">Recommended 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="images/badge2.png" alt="">
                            <small class="d-block">Top Products 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="images/badge3.png" alt="">
                            <small class="d-block">Best Services 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="images/badge1.png" alt="">
                            <small class="d-block">Recommented 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="images/badge2.png" alt="">
                            <small class="d-block">Top Products 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="images/badge3.png" alt="">
                            <small class="d-block">Best Services 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="images/badge2.png" alt="">
                            <small class="d-block">Top Products 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="images/badge3.png" alt="">
                            <small class="d-block">Best Services 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="images/badge1.png" alt="">
                            <small class="d-block">Recommented 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="images/badge2.png" alt="">
                            <small class="d-block">Top Products 2018</small>
                        </div>
                        <div class="part text-center my-1">
                            <img src="images/badge3.png" alt="">
                            <small class="d-block">Best Services 2018</small>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal-->

    <!-- The Message Modal -->
    <div class="modal fade" id="msgModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Send Message</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body p-3 pb-3">
                    <form action="">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Subject</label>
                                <input type="text" class="form-control mt-1" id="formGroupExampleInput" placeholder="Write Subject Here">
                            </div>
                            <label for="exampleFormControlTextarea1">Message</label>
                            <textarea class="form-control mt-1" id="exampleFormControlTextarea1" rows="4" placeholder="Your Message ...."></textarea>


                            <div class="form-group mt-2">
                                <p>Upload Image</p>
                                <div class="col-md-12 mt-1">
                                    <label for="profileImg" class="uploadimg">
                                        <div class="close-overlay">
                                            <span class="btn btn-danger fas fa-trash-alt"></span>
                                        </div>
                                        <img src="images/add-image.png" style="width:100px; height: 100px; border-radius:5%;" id="profileImage" alt="">
                                    </label>

                                    <input type="file" style="display:none" id="profileImg" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>

                            <button type="submit" class="btn main-btn mt-3">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal-->

</div>
<!--End Showrooms-->




<?php include 'footer.php'; ?>


<script>
    //    === Make div square ===
    $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
    $(window).on('resize', function() {
        $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
    })

    
    //    === Make div square ===
    $('.trending .product-content .part').outerHeight($('.trending .product-content .part').outerWidth());
    $(window).on('resize', function() {
        $('.trending .product-content .part').outerHeight($('.trending .product-content .part').outerWidth());
    })
</script>
