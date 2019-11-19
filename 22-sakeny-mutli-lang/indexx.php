<?php include 'header.php'; ?>
<?php include 'search.php'; ?>

<!--===== Google Maps =====-->
<!--===== Google Maps =====-->
<div class="container">
    <div id="map" style="width: 100%;height: 600px"></div>
</div>
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
            document.getElementById('map'), {
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


<!--    ===== Ad Area =====-->
<!--    ===== Ad Area =====-->
<section class="ad-area py-5 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
    <div class="container">
        <a href=""><img src="images/ad.jpeg" class="rounded" alt=""></a>
    </div>
</section>



<!--    ===== Latest Ads =====-->
<!--    ===== Latest Ads =====-->
<section class="latest-ad py-5">
    <div class="container">
        <div class="title">
            <h1>Latest Ads</h1>
        </div>

        <div class="row py-2">
            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a class="card">
                    <span class="sale bg-danger">For Sale</span>
                    <img class="card-img-top" src="images/proj1.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <p class="text-secondary text-center m-0">شقه بالتقسيط المريح تشطيب عالي بكمبوند اشجار سيتي</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Cairo</small>
                        <small class="text-muted float-right"><span class="text-success font-weight-bold">270,000</span> EGP</small>
                    </div>
                </a>
            </div>

            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a class="card">
                    <span class="sale bg-secondary">For Rent</span>
                    <img class="card-img-top" src="images/proj1.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <p class="text-secondary text-center m-0">شقه بالتقسيط المريح تشطيب عالي بكمبوند اشجار سيتي</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Cairo</small>
                        <small class="text-muted float-right"><span class="text-success font-weight-bold">270,000</span> EGP</small>
                    </div>
                </a>
            </div>

            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a class="card">
                    <span class="sale bg-danger">For Sale</span>
                    <img class="card-img-top" src="images/proj1.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <p class="text-secondary text-center m-0">شقه بالتقسيط المريح تشطيب عالي بكمبوند اشجار سيتي</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Cairo</small>
                        <small class="text-muted float-right"><span class="text-success font-weight-bold">270,000</span> EGP</small>
                    </div>
                </a>
            </div>

            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a class="card">
                    <span class="sale bg-secondary">For Rent</span>
                    <img class="card-img-top" src="images/proj1.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <p class="text-secondary text-center m-0">شقه بالتقسيط المريح تشطيب عالي بكمبوند اشجار سيتي</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Cairo</small>
                        <small class="text-muted float-right"><span class="text-success font-weight-bold">270,000</span> EGP</small>
                    </div>
                </a>
            </div>

            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a class="card">
                    <span class="sale bg-danger">For Sale</span>
                    <img class="card-img-top" src="images/proj1.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <p class="text-secondary text-center m-0">شقه بالتقسيط المريح تشطيب عالي بكمبوند اشجار سيتي</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Cairo</small>
                        <small class="text-muted float-right"><span class="text-success font-weight-bold">270,000</span> EGP</small>
                    </div>
                </a>
            </div>

            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a class="card">
                    <span class="sale bg-secondary">For Rent</span>
                    <img class="card-img-top" src="images/proj1.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <p class="text-secondary text-center m-0">شقه بالتقسيط المريح تشطيب عالي بكمبوند اشجار سيتي</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Cairo</small>
                        <small class="text-muted float-right"><span class="text-success font-weight-bold">270,000</span> EGP</small>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>


<!--===== Small Ad =====-->
<!--===== Small Ad =====-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center my-2">
                <a href=""> <img src="images/e3lan.jpg" class="img-fluid rounded" alt=""></a>
            </div>

            <div class="col-md-4 text-center my-2">
                <a href=""> <img src="images/e3lan.jpg" class="img-fluid rounded" alt=""></a>
            </div>

            <div class="col-md-4 text-center my-2">
                <a href=""> <img src="images/e3lan.jpg" class="img-fluid rounded" alt=""></a>
            </div>
        </div>
    </div>
</section>


<!--    ===== Projects =====-->
<!--    ===== Projects =====-->
<section class="projects py-5">
    <div class="container">
        <div class="title">
            <h1>Our Projects</h1>
        </div>

        <div class="row">
            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a class="card">
                    <img class="card-img-top" src="images/proj4.PNG" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title text-dark m-0">LAKEVIEW RESIDENCE - NEW CAIRO</h6>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Cairo</small>
                    </div>
                </a>
            </div>

            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a class="card">
                    <img class="card-img-top" src="images/proj4.PNG" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title text-dark m-0">LAKEVIEW RESIDENCE - NEW CAIRO</h6>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Cairo</small>
                    </div>
                </a>
            </div>

            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a class="card">
                    <img class="card-img-top" src="images/proj4.PNG" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title text-dark m-0">LAKEVIEW RESIDENCE - NEW CAIRO</h6>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Cairo</small>
                    </div>
                </a>
            </div>

            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a class="card">
                    <img class="card-img-top" src="images/proj4.PNG" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title text-dark m-0">LAKEVIEW RESIDENCE - NEW CAIRO</h6>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Cairo</small>
                    </div>
                </a>
            </div>

            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a class="card">
                    <img class="card-img-top" src="images/proj4.PNG" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title text-dark m-0">LAKEVIEW RESIDENCE - NEW CAIRO</h6>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Cairo</small>
                    </div>
                </a>
            </div>

            <div class="col-md-4 my-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <a class="card">
                    <img class="card-img-top" src="images/proj4.PNG" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title text-dark m-0">LAKEVIEW RESIDENCE - NEW CAIRO</h6>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Cairo</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<!--===== Long Ad =====-->
<!--===== Long Ad =====-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center my-5">
                <a href=""> <img src="images/long-e3lan.jpg" class="img-fluid rounded" alt="" style="max-height:400px"></a>
            </div>
        </div>
    </div>
</section>



<!--=====Our Companies =====-->
<!--=====Our Companies =====-->
<section class="companies py-5">
    <div class="container">
        <div class="title">
            <h1>Partners</h1>
        </div>
        <div class="swiper-container py-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="images/comp1.jpeg" alt=""></div>
                <div class="swiper-slide"><img src="images/comp2.jpeg" alt=""></div>
                <div class="swiper-slide"><img src="images/comp1.jpeg" alt=""></div>
                <div class="swiper-slide"><img src="images/comp2.jpeg" alt=""></div>
                <div class="swiper-slide"><img src="images/comp1.jpeg" alt=""></div>
                <div class="swiper-slide"><img src="images/comp2.jpeg" alt=""></div>
                <div class="swiper-slide"><img src="images/comp1.jpeg" alt=""></div>
                <div class="swiper-slide"><img src="images/comp2.jpeg" alt=""></div>
                <div class="swiper-slide"><img src="images/comp1.jpeg" alt=""></div>
                <div class="swiper-slide"><img src="images/comp2.jpeg" alt=""></div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>


<?php include 'footer.php'; ?>
