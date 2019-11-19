
<?php include 'header.php'; ?>
<div class="showrooms topics">

    <section class="trending">
        <div class="container">
            <div class="row pt-3 mb-3 border-bottom">
                <div class="col-lg-2 "></div>
                <div class="col-lg-10 d-flex justify-content-between">
                    <div class="page-buttons">
                        <button class="btn active">Discussion</button>
                        <button class="btn">Sell & Buy used furniture</button>
                    </div>
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2 px-0">
                    <nav class="showrooms-filter">

                        <!-- Links -->
                        <ul class="navbar-nav bg-white rounded p-3">
                            <li class="nav-item">
                                <a class="nav-link" href="#">All Locations</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Cairo
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item live" href="#">Ma'ady</a>
                                    <a class="dropdown-item" href="#">Ain Shams</a>
                                    <a class="dropdown-item" href="#">El-Zmalek</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Alexandria
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Link 1</a>
                                    <a class="dropdown-item" href="#">Link 2</a>
                                    <a class="dropdown-item" href="#">Link 3</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Asuan
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Link 1</a>
                                    <a class="dropdown-item" href="#">Link 2</a>
                                    <a class="dropdown-item" href="#">Link 3</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Cairo
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Ma'ady</a>
                                    <a class="dropdown-item" href="#">Ain Shams</a>
                                    <a class="dropdown-item" href="#">El-Zmalek</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Alexandria
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Link 1</a>
                                    <a class="dropdown-item" href="#">Link 2</a>
                                    <a class="dropdown-item" href="#">Link 3</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Asuan
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Link 1</a>
                                    <a class="dropdown-item" href="#">Link 2</a>
                                    <a class="dropdown-item" href="#">Link 3</a>
                                </div>
                            </li>
                        </ul>

                        <!-- Links -->
                        <ul class="navbar-nav  bg-white rounded p-3 mt-3">
                            <li class="nav-item">
                                <a class="nav-link" href="#">All Styles</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Classic <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Modern</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Ultra Modern</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Classic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Modern</a>
                            </li>
                        </ul>

                    </nav>
                </div>


                <!--==== Topics ====-->
                <!--==== Topics ====-->
                <div class="col-lg-6 ">
                    <div class="post d-flex justify-content-between align-items-center p-1">
                        <figure class="img mr-2" style="background-image:url(./images/male1.jpg)"></figure>
                        <h6 class="mx-1">HussamElRa</h6>
                        <input style="" class="form-control form-control-" type="text" placeholder="Write Something, Start Discussion" data-toggle="modal" data-target="#postModal">

                        <!-- Post Modal -->
                        <div class="modal post-details p-0" id="postModal" role="dialog" tabindex='-1'>
                            <div class="card col-lg-6 col-md-8 p-2 mx-auto">
                                <div class="card-header d-flex align-items-center p-2 bg-white border-0">
                                    <img src="images/male1.jpg" alt="">
                                    <h6 class="mx-2">HussamElRa</h6>
                                </div>
                                <div class="card-body">
                                    <textarea name="" class="form-control " id="" rows="3" placeholder="Write Something, Start a discussion and keep your question short and to the point"></textarea>

                                    <div class="d-flex align-items-center border my-2 rounded">
                                        <p class="border-right px-1"> <i class="bg-secondary px-2 py-1 mx-1 text-center text-white rounded-circle"> # </i> Choose up to 3 topic</p>
                                        <select class="selectpicker mx-2" name="" id="" class="selectpicker" multiple data-hide-disabled="true" data-size="5">
                                            <option value="">Category</option>
                                            <option value="">Category</option>
                                            <option value="">Category</option>
                                            <option value="">Category</option>
                                            <option value="">Category</option>
                                            <option value="">Category</option>
                                        </select>
                                    </div>

                                    <div class="d-flex align-items-center border my-2 rounded">
                                        <p class="border-right px-1"> <i class="bg-secondary small p-2 mx-1 text-center text-white rounded-circle fas fa-link"> </i>Attach Link</p>
                                        <input class="border-0 ml-2 form-control " type="text" placeholder="Add Link here">
                                    </div>
                                </div>


                                <div class="card-footer d-flex justify-content-between bg-white border-0 pt-0 px-1">
                                    <div>
                                        <label for="uploadImg"> <i class="far fa-images"></i> Upload Photo</label>
                                        <input type="file" class="d-none" id="uploadImg">

                                    </div>
                                    <button class="btn">Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end-post-->
                    
                    <!--Guest Box-->
                    <section class="guest-box text-center bg-white rounded py-4 border">
                        <h1 class="h3"> Join Our Community</h1>
                        <p class="h5 py-3">
                            Share your experince & take advantage of others. 
                            <br>
                            Get advices from architects & interior desingers.
                        </p>
                        <a href="" class=" btn main-btn">Login</a>
                        <p class="d-inline mx-3">or</p>
                        <a href="" class=" btn main-btn">Sign-up</a>
                        <p class="h5 pt-3">and start discussions</p>
                    </section>    
                    <!--End Guest Box-->
                    
                    <div class="lunched-post bg-white mb-4">
                        <div class="card my-2 p-2">
                            <div class="card-header px-1 py-1 bg-white border-0">
<!--                                <img src="images/female1.jpg" alt="" class="d-inline-block mr-2">-->
                                <figure style="background-image:url(./images/female1.jpg)" class="img d-inline-block mr-2"></figure>
                                <p class="font-weight-bold d-inline-block user-name">Amira Ali | </p>
                                <a href="" style="color: var(--clr1);">Follow</a>
                                <p class="text-muted float-right m-3">25 Nov 2018 <a class="fas fa-flag text-secondary" data-toggle="modal" data-target="#reportModal"></a>
                                </p>

                            </div>
                            <div class="card-body pt-0 pb-3">
                                <p class="card-text pb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                                <a href="" class="px-2 text-white d-inline-block rounded" style="background-color: #939393;"># Table</a>
                                <a href="" class="px-2 text-white d-inline-block rounded" style="background-color: #939393;"># Table</a>
                                <a href="" class="px-2 text-white d-inline-block rounded" style="background-color: #939393;"># Table</a>
                            </div>
                            <div class="topic-imgs py-2">
                                <div class="container">

                                    <div class="row">
                                        <a class="col p-0 img" data-fancybox="gallery" href="images/big-proj1.jpg" style="background-image: url(./images/big-proj1.jpg);">
                                        </a>
                                        <a class="col p-0 img" data-fancybox="gallery" href="images/big-proj2.jpg" style="background-image: url(./images/big-proj2.jpg);">
                                        </a>
                                        <a class="col p-0 img" data-fancybox="gallery" href="images/big-proj3.jpg" style="background-image: url(./images/big-proj3.jpg);">
                                        </a>
                                        <a class="col p-0 img" data-fancybox="gallery" href="images/big-proj4.jpg" style="background-image: url(./images/big-proj4.jpg);">
                                        <span class="overlay">+5</span>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-muted p-2 bg-white">
                                <button class="btn p-1 mr-2" style="color: #939393;"><i class="fas fa-thumbs-up"></i> Like</button>
                                <button class="btn p-1 mr-2" style="color: #939393;"><i class="fas fa-heart"></i> Save</button>
                                <button class="btn p-1 mr-2" style="color: #939393;"><i class="fas fa-share-square"></i> Share</button>
                                <p class="text-info float-right p-2">10 Likes | 3 Replies | 13 Shares</p>
                            </div>

                            <div class="card-footer p-0 bg-white">
                                <div class="card comment my-3">
                                    <div class="card-header p-1 border-0 bg-transparent">

                                        <figure style="background-image:url(./images/female2.jpg)" class="img d-inline-block mr-2"></figure>
                                        <p class="font-weight-bold d-inline-block user-name">Mai Ahmed | </p>
                                        <a href="" style="color: var(--clr1);">Follow</a>
                                        <p class="text-muted float-right m-3">25 Nov 2018 <a class="fas fa-flag text-secondary" data-toggle="modal" data-target="#reportModal"></a></p>
                                    </div>
                                    <div class="card-header border-0 pl-5 py-3 bg-transparent">
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                                    </div>

                                    <div class="card reply my-2">
                                        <div class="card-header p-1 border-0">
<!--                                            <img src="images/female2.jpg" alt="" class="d-inline-block mr-2">-->
                                            <figure style="background-image:url(./images/female2.jpg)" class="img d-inline-block mr-2"></figure>
                                            <p class="font-weight-bold d-inline-block user-name">Mai Ahmed | </p>
                                            <a href="" style="color: var(--clr1);">Follow</a>
                                            <p class="text-muted float-right m-3">25 Nov 2018 <a class="fas fa-flag text-secondary" data-toggle="modal" data-target="#reportModal"></a></p>
                                        </div>
                                        <div class="card-header border-0 pl-5 py-3">
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                                        </div>

                                        <div class="card-footer pl-5 border-0 text-muted p-2">
                                            <button class="btn p-1 mr-2" style="color: var(--clr1);"><i class="fas fa-thumbs-up"></i> Like</button>
                                            <button class="btn p-1 mr-2" style="color: #939393;"><i class="fas fa-reply"></i> Reply</button>
                                            <p class="text-info float-right p-2">10 Likes | 3 Replies</p>
                                        </div>
                                    </div> <!-- end Reply -->
                                    <a href="" class="pl-5 py-2 main-link2">Load More Replies</a>

                                    <div class="card-footer pl-5 border-0 text-muted p-2">
                                        <input type="text" class="form-control my-2" placeholder="Add Reply ...">
                                        <button class="btn p-1 mr-2" style="color: var(--clr1);"><i class="fas fa-thumbs-up"></i> Like</button>
                                        <button class="btn p-1 mr-2" style="color: #939393;"><i class="fas fas fa-reply"></i> Reply</button>
                                        <p class="text-info float-right p-2">10 Likes | 3 Replies</p>
                                    </div>
                                </div> <!-- end Comment -->

                                <div class="card comment my-3">
                                    <div class="card-header p-1 border-0 bg-transparent">
                                        <figure style="background-image:url(./images/female2.jpg)" class="img d-inline-block mr-2"></figure>
                                        <p class="font-weight-bold d-inline-block user-name">Mai Ahmed | </p>
                                        <a href="" style="color: var(--clr1);">Follow</a>
                                        <p class="text-muted float-right m-3">25 Nov 2018 <a class="fas fa-flag text-secondary" data-toggle="modal" data-target="#reportModal"></a></p>
                                    </div>
                                    <div class="card-header border-0 pl-5 py-3 bg-transparent">
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                                    </div>

                                    <div class="card-footer position-relative pl-5 border-0 text-muted p-2">
                                        <input type="text" class="form-control my-2" placeholder="Add Reply ...">

                                        <div class="choosefile">
                                            <label for="uploadimg2"><i class="far fa-images"></i></label>
                                            <input class="d-none" type="file" id="uploadimg2" onchange="document.getElementById('profileImage2').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class="imagetoshow border p-2 mt-1 rounded" style="display:none;">
                                            <img src="images/white.png" class="" style="width:100px; height: 100px; border-radius:5%;" id="profileImage2" alt="">
                                            <span class="btn btn-danger" style="position:absolute; right:20px;">X</span>
                                        </div>

                                        <button class="btn p-1 mr-2" style="color: var(--clr1);"><i class="fas fa-thumbs-up"></i> Liked</button>
                                        <button class="btn p-1 mr-2" style="color: #939393;"><i class="fas fa-reply"></i> Reply</button>
                                        <p class="text-info float-right p-2">10 Likes | 3 Replies</p>
                                    </div>
                                </div> <!-- end Comment -->

                                <a href="" class="main-link2">Load More Comments</a>
                                <div class="mycomment mt-3">
                                    <img src="images/male1.jpg" class="userimage" alt="">
                                    <input class="btn-block form-control" type="text" placeholder="Write Comment ...">

                                    <div class="choosefile">
                                        <label for="uploadimg"><i class="far fa-images"></i></label>
                                        <input class="d-none" type="file" id="uploadimg" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                                    </div>

                                    <div class="imagetoshow border p-2 mt-1 rounded" style="display:none;">
                                        <img src="images/white.png" class="" style="width:100px; height: 100px; border-radius:5%;" id="profileImage" alt="">
                                        <span class="btn btn-danger" style="position:absolute; right:10px;">X</span>
                                    </div>
                                </div>
                                <!--End My Comment-->

                            </div>
                        </div>


                    </div>
                    <!--end-comments-->
                </div>
                <!--end-col-6-->



                <div class="col-lg-4">

                </div>

            </div>
        </div>
    </section>

</div>

<!--Report Modal -->
<form class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report This Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select class="form-control p-0" name="" id="">
                    <option value="">One</option>
                    <option value="">One</option>
                    <option value="">One</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info">Submit a report</button>
            </div>
        </div>
    </div>
</form> <!-- End Report Modal -->

<?php include 'footer.php'; ?>




<script>
    //To MAke Images Square
    $('.lunched-post .topic-imgs img').css({
        'height': $('.lunched-post .topic-imgs img').width() + 'px'
    });
    $(window).on('resize', function() {
        $('.lunched-post .topic-imgs img').css({
            'height': $('.lunched-post .topic-imgs img').width() + 'px'
        });
    })
    
    $('.lunched-post .topic-imgs .img').css({
        'height': $('.lunched-post .topic-imgs .img').width() + 'px'
    });
    $(window).on('resize', function() {
        $('.lunched-post .topic-imgs .img').css({
            'height': $('.lunched-post .topic-imgs .img').width() + 'px'
        });
    })

</script>
