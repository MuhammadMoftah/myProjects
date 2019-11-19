<?php include 'header.php'; ?>

<section class="single-project">
    <div class="container">
        <div class="inner">
            <div class="row">
                <div class="col-md-8 test">
                    <div class="title py-4">
                        <h1>Capital Gate - NEW CAIRO</h1>
                    </div>

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="images/proj1.jpeg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/proj2.jpeg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/proj3.jpeg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <p class="text-muted py-4">
                        Capital Gate
                        Capital Gate is an exclusive compound with a prime location in New Cairo. It offers luxurious fully finished apartments, penthouses, duplexes and many amenities. Capital Gate is also distinguished by its spacious greenery and water features.
                        The Project is located in the fifth settlemen New Cairo on the Mid-Ring Road that is linking Cairo-Suez Road with Cairo-Sokhn Road and its major strength lies behind being on the border between New Cairo and Madinaty and adjacent to the New Capital; and that is why the project was Called Capital Gate.
                        The project will be developed over 97.5 Acres and will consist of 2,706 fully finished residential units divided into 87 Apartment Buildings with remarkable and outstanding views, 75% of the total land area will be occupied by greeny and swimming pools between the buildings and all units are guaranteed to have their maximum privacy.
                    </p>


                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h4 class="font-weight-bold">Video:</h4>
                        <div class="embed-responsive embed-responsive-21by9 py-5">
                            <iframe class="embed-responsive-item py-2" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                        </div>
                    </div>


                    <div class="pt-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h4 class="font-weight-bold">Adress:</h4>
                        <p class="text-black-50">Cairo, Egypt</p>
                    </div>


                    <div class="pt-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h4 class="font-weight-bold">Location on map:</h4>
                        <div id="map2" class="rounded" style="width: 100%;height: 400px"></div>
                        <script>
                            // Initialize and add the map
                            function initMap() {
                                // The location of Uluru
                                var uluru = {
                                    lat: 30.044,
                                    lng: 31.340
                                };
                                // The map, centered at Uluru
                                var map = new google.maps.Map(
                                    document.getElementById('map2'), {
                                        zoom: 40,
                                        center: uluru
                                    });
                                // The marker, positioned at Uluru
                                var marker = new google.maps.Marker({
                                    position: uluru,
                                    map: map
                                });
                            }

                        </script>
                    </div>

                    <div class="pt-5 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h4 class="font-weight-bold">About Developer:</h4>
                        <img src="images/marasem.png" class="img-thumbnail" alt="" style="width:100px;">
                        <b>Al-Marasem</b>

                        <p class="text-black-50 py-2">When it comes to construction and development, Al Marasem Development is the first name to come in mind. Al Marasem Development is one of the leading companies in its field because of its professional and flawless execution and punctual completion of its numerous projects.

                            Al Marasem Development is an Egyptian international company that was established in 1997 in Cairo – Egypt. It excelled in delivering exceptional construction projects in a time effective manner. Al Marasem Development crafted many masterpieces ranging from airports, housing projects, hotels, commercial and entertainment buildings. It’s also infiltrating the real estate market in many prestigious locations in Cairo.

                            Al Marasem Development has two splendid compounds which are Capital Gate and Fifth Square.</p>
                    </div>

                    <div class="pt-5 ">
                        <h4 class="font-weight-bold">Share:</h4>
                        <div class="text-center social-login pb-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <a class="facebook" style="background-color:#005ebf">
                                <fa><i aria-hidden="true" class="fab fa-facebook-f"></i></fa>
                            </a>
                            <a class="google" style="background-color:#bf0000">
                                <fa><i aria-hidden="true" class="fab fa-google"></i></fa>
                            </a>
                            <a class="twitter" style="background-color:#55acee">
                                <fa><i aria-hidden="true" class="fab fa-twitter"></i></fa>
                            </a>
                            <a class="linked" style="background-color:#0077b5">
                                <fa><i aria-hidden="true" class="fab fa-linkedin-in"></i></fa>
                            </a>
                            <a class="pinterest" style="background-color:#BD091D">
                                <fa><i class="fab fa-pinterest-p"></i></fa>
                            </a>
                            <a class="messenger" style="background-color:#55acee">
                                <fa><i class="fab fa-facebook-messenger"></i></fa>
                            </a>
                            <a class="reddit" style="background-color:#FF4006">
                                <fa><i class="fab fa-reddit-alien"></i></fa>
                            </a>
                            <a class="whatsapp" style="background-color:#25D366">
                                <fa><i class="fab fa-whatsapp"></i></fa>
                            </a>
                            <a class="telegram" style="background-color:#0088CC">
                                <fa><i class="fab fa-telegram-plane"></i></fa>
                            </a>
                            <a class="tumblr" style="background-color:#36465D">
                                <fa><i class="fab fa-tumblr"></i></fa>
                            </a>
                            <a class="mix" style="background-color:#EB4924">
                                <fa><i class="fab fa-mix"></i></fa>
                            </a>
                            <a class="vk" style="background-color:#4C75A3">
                                <fa><i class="fab fa-vk"></i></fa>
                            </a>
                            <a class="xing" style="background-color:#006567">
                                <fa><i class="fab fa-xing"></i></fa>
                            </a>
                            <a class="chain bg-secondary">
                                <fa><i class="fas fa-link"></i></fa>
                            </a>
                            <a class="check bg-secondary">
                                <fa><i class="fas fa-check"></i></fa>
                            </a>
                            <a class="check bg-danger">
                                <fa><i class="fas fa-print"></i></fa>
                            </a>
                        </div>

                    </div>
                </div>



                <div class="col-md-4  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="title py-4">
                        <h1>Features</h1>
                    </div>

                    <ul class="features list-unstyled">
                        <li><i class="fas fa-check my-2"></i> <b>Community</b></li>
                        <li><i class="fas fa-check my-2"></i> <b>Garden picnic</b></li>
                        <li><i class="fas fa-check my-2"></i> <b>Lifestyle</b></li>
                        <li><i class="fas fa-check my-2"></i> <b>Designing the future</b></li>
                        <li><i class="fas fa-check my-2"></i> <b>Capital Gate New Cairo payment </b></li>
                    </ul>

                    <div class="title py-1">
                        <h1>Plan</h1>
                    </div>
                    <b>0% down payment rest till 4 years 10 % discount 5% down payment then after 3 months 5% down payment rest till 6 years 10% down payment then after 3 months 10% then 10% on delivery rest till 8 years equal installm</b>

                    <button class="btn d-block mx-auto my-4 wow fadeInUp text-white" data-wow-duration="1s" data-wow-delay="0.3s" style="background-color: rgb(120, 18, 178);" data-toggle="modal" data-target="#exampleModal">
                        Request A Call
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title w-100" id="exampleModalLabel">Request A Call</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="exampleInputUser1">Username</label>
                                            <input type="text" class="form-control" id="exampleInputUser1" placeholder="Enter Username here">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email here">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPhone1">Phone</label>
                                            <input type="text" class="form-control" id="exampleInputPhone1" placeholder="Enter Phone here">
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success w-25 mx-auto">Send</button>
                                    <button type="button" class="btn btn-danger w-25  mx-auto" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="contact">
                <div class="title pt-5 pb-3">
                    <h1>Contact</h1>
                </div>
                <form action="">
                    <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <label for="exampleInputUser1">Username</label>
                        <input type="text" class="form-control" id="exampleInputUser1" placeholder="Enter Username here">
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email here">
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <label for="exampleInputPhone1">Phone</label>
                        <input type="text" class="form-control" id="exampleInputPhone1" placeholder="Enter Phone here">
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-25 mx-auto wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">Send</button>
                </form>
            </div>

            <div class="related-projects">
                <div class="title pt-5">
                    <h1>Related Projects</h1>
                </div>

                <div class="swiper-container py-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href=""><img src="images/proj2.jpeg" alt=""></a>
                        </div>

                        <div class="swiper-slide">
                            <a href=""><img src="images/proj3.jpeg" alt=""></a>
                        </div>

                        <div class="swiper-slide">
                            <a href=""><img src="images/proj5.jpeg" alt=""></a>
                        </div>

                        <div class="swiper-slide">
                            <a href=""><img src="images/proj6.jpeg" alt=""></a>
                        </div>
                        
                        <div class="swiper-slide">
                            <a href=""><img src="images/proj7.jpeg" alt=""></a>
                        </div>
                        
                        <div class="swiper-slide">
                            <a href=""><img src="images/proj1.jpeg" alt=""></a>
                        </div>

                        <div class="swiper-slide">
                            <a href=""><img src="images/proj4.PNG" alt=""></a>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="images/footer.jpg" alt="">
</section>
<?php include 'footer.php'; ?>
