<?php include 'header.php'; ?>
<div class="showrooms user-profile">
    <div class="container head">
        <div class="row p-0 bg-white border-bottom">
            <div class="col-md-12  p-0">
                <section class="cover" style="background-image:url(./images/cover.jpg);"></section>
            </div>
            <div class="col-lg-2 col-12 text-center">
                <div class="img" style="background-image:url(./images/male1.jpg)"></div>
            </div>
            <div class="col-lg-10 col-12 comp-contact" style="padding: 0px 31px 0 24px;">
                <h5 class="mb-1 d-inline-block mt-2 h4 pb-1">Muhammad Moftah</h5>
                <div class="d-inline-block float-lg-right">
                    <div class="stars d-inline-block mx-3 mt-1" style="cursor:pointer" data-toggle="modal" data-target="#followersModal">
                        <p class="text-muted d-inline-block">15k Followers</p>
                        .
                        <p class="text-muted d-inline-block">15k Following</p>
                    </div>
                    <button class="btn btn-info w-auto" id="edit-profile">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>


    <section class="trending">
        <div class="container">
            <div class="row bg-white mb-3 px-4">
                <div class="col-lg-2">
                    <div class="showroom-nav my-4">
                        <p class="main-link active" id="boards">Boards</p>
                        <p class="main-link" id='user-chat'>Message</p>
                        <p class="main-link" id="design">Design Your Home</p>
                        <p class="main-link" id="comparison">Comparison Table</p>
                        <p class="main-link" id="updates">Updates</p>
                        <p class="main-link" id="ideas">Ideas</p>
                        <p class="main-link" id="topics">Topics</p>
                        <p class="main-link" id="activity">Activity</p>
                    </div>

                    <div class="py-5" style="line-height: 16px;">
                        <a href="" class="d-block main-link2 my-3">Ask the community</a>
                        <a href="" class="d-block main-link2 my-3">Sell & Buy Used Furniture</a>
                        <a href="" class="d-block main-link2 my-3">Create a profile for your business</a>
                    </div>
                </div>

                <div class="col-lg-10" id="product-content">

                    <div class="row" id="boards-content">
                        <div class="col-lg-12 d-flex justify-content-between mt-3 px-2">
                            <div class="d-flex align-items-baseline">
                                <h4 class="d-inline-block mr-5 h5">5 Boards</h4>
                                <a href="" class="btn main-btn2 ">Create New Board</a>
                            </div>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 px-2 ">
                            <div class="part card" >
                                <div class="img boardtoclick" data-id="#ShowBoard" style="background-image: url(./images/big-proj1.jpg);cursor:pointer">
                                </div>
                 
                                <div class="card-body card-footer d-flex flex-column justify-content-around">
                                    <h5 class="card-title">Hussam's Ideas</h5>
                                    <p class="card-text main-link2 m-0">
                                        10 Saved Items
                                    </p>
                                    <button title="Delete" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" style="width: 45px;height: 45px;position: absolute;right: 7px;top: 0;bottom: 0;margin: auto;"> <i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>

                            <!--Edit Board Modal -->
                            <div class="modal fade" id="EditBoardModal">
                                <form class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Board</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="exampleName1" class="my-2">Old Board Name</label>
                                                <input type="text" class="form-control" id="exampleName1" aria-describedby="emailHelp" placeholder="Board Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="my-2" for="exampleFormControlSelect1">Example select</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Private</option>
                                                    <option>Public</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn main-btn" data-dismiss="modal">Save</button>

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </form>
                            </div><!-- end Modal-->
                        </div>

                        <div class="col-xl-4 col-md-6 px-2">
                            <a class="part card boardtoclick" data-id="#ShowBoard">
                                <div class="img" style="background-image: url(./images/big-proj1.jpg);cursor:pointer">

                                </div>
                                <div class="card-body card-footer d-flex flex-column justify-content-around">
                                    <h5 class="card-title">Hussam's Ideas</h5>
                                    <p class="card-text main-link2 m-0">
                                        10 Saved Items
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-4 col-md-6 px-2">
                            <a class="part card boardtoclick" data-id="#ShowBoard">
                                <div class="img" style="background-image: url(./images/big-proj1.jpg);cursor:pointer">

                                </div>
                                <div class="card-body card-footer d-flex flex-column justify-content-around">
                                    <h5 class="card-title">Hussam's Ideas</h5>
                                    <p class="card-text main-link2 m-0">
                                        10 Saved Items
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-4 col-md-6 px-2">
                            <a class="part card boardtoclick" data-id="#ShowBoard">
                                <div class="img" style="background-image: url(./images/big-proj1.jpg);cursor:pointer">

                                </div>
                                <div class="card-body card-footer d-flex flex-column justify-content-around">
                                    <h5 class="card-title">Hussam's Ideas</h5>
                                    <p class="card-text main-link2 m-0">
                                        10 Saved Items
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-4 col-md-6 px-2">
                            <a class="part card boardtoclick" data-id="#ShowBoard">
                                <div class="img" style="background-image: url(./images/big-proj1.jpg);cursor:pointer">

                                </div>
                                <div class="card-body card-footer d-flex flex-column justify-content-around">
                                    <h5 class="card-title">Hussam's Ideas</h5>
                                    <p class="card-text main-link2 m-0">
                                        10 Saved Items
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-6 px-2">
                            <button class="btn main-btn2 part w-100" data-toggle="modal" data-target="#NewBoardModal">
                                <h1 class="m-0"> + </h1>
                                Create New Board
                            </button>

                            <!-- Create New Board Modal -->
                            <div class="modal fade" id="NewBoardModal">
                                <form class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Board</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="exampleName1" class="my-2">Board Name</label>
                                                <input type="text" class="form-control" id="exampleName1" aria-describedby="emailHelp" placeholder="Board Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="my-2" for="exampleFormControlSelect1">Example select</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Private</option>
                                                    <option>Public</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn main-btn" data-dismiss="modal">Submit</button>

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </form>
                            </div><!-- end Modal-->
                        </div>
                    </div>

                    <!--Dashboard chat-->
                    <div class="container dash-chat dashboard" id="user-chat-content" style="display:none;">
                        <div class="row bg-white rounded py-2">
                            <div class="col-4 chat-left d-fle align-items-center">
                                <hgroup class="d-flex justify-content-between">
                                    <select class="form-control col-3" name="" id="">
                                        <option value="">All</option>
                                        <option value="">Read</option>
                                        <option value="">UnRead</option>
                                    </select>
                                    <input class="form-control col-8" type="text" placeholder="Search ...">
                                </hgroup>

                                <aside class="chat-list py-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link pl-1 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                            <aside class="chat-user d-flex align-items-center">
                                                <figure class="img mb-0 mr-2" style="background-image: url(./images/male1.jpg);height:50px;"></figure>
                                                <h6 class="mb-0 mr-2 text-secondary">Hussam El-Rabbat</h6>
                                                <i class="fas fa-star text-warning"></i>
                                            </aside>
                                        </a>
                                        <a class="nav-link pl-1" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                            <aside class="chat-user d-flex align-items-center">
                                                <figure class="img mb-0 mr-2" style="background-image: url(./images/female1.jpg);height:50px;"></figure>
                                                <h6 class="mb-0 mr-2 text-secondary font-weight-bold">Yara Ayman</h6>
                                                <span style="height:10px; width:10px;" class="rounded-circle badge-info"> </span>
                                            </aside>
                                        </a>
                                        <a class="nav-link pl-1" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                            <aside class="chat-user d-flex align-items-center">
                                                <figure class="img mb-0 mr-2" style="background-image: url(./images/male1.jpg);height:50px;"></figure>
                                                <h6 class="mb-0 mr-2 text-secondary">Hussam El-Rabbat</h6>
                                            </aside>
                                        </a>
                                        <a class="nav-link pl-1" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                            <aside class="chat-user d-flex align-items-center">
                                                <figure class="img mb-0 mr-2" style="background-image: url(./images/female1.jpg);height:50px;"></figure>
                                                <h6 class="mb-0 mr-2 text-secondary font-weight-bold">Yara Ayman</h6>
                                                <span style="height:10px; width:10px;" class="rounded-circle badge-info"> </span>
                                            </aside>
                                        </a>
                                    </div>

                                </aside>
                            </div>
                            <div class="col-8 chat-right border-left">
                                <hgroup class="d-flex justify-content-between">
                                    <aside class="chat-user d-flex align-items-center">
                                        <figure class="img mb-0 mr-2" style="background-image: url(./images/male1.jpg);height:50px;"></figure>
                                        <h6>Hussam El-Rabbat</h6>
                                    </aside>
                                    <aside class="chat-icons d-flex align-items-center ">
                                        <a href=""><i class="main-link far fa-star mx-2"></i></a>
                                        <a href=""><i class="main-link far fa-envelope mx-2"></i></a>
                                        <a href=""><i class="main-link fas fa-trash-alt mx-2"></i></a>
                                        <a href=""><i class="main-link fas fa-flag mx-2"></i></a>
                                    </aside>
                                </hgroup>
                                <div class="tab-content py-3" id="v-pills-tabContent">
                                    <div class="tab-pane chat-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <div class="my-1 d-flex">
                                            <p class="not-my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class=" my-1 d-flex flex-row-reverse">
                                            <p class="my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class=" my-1 d-flex flex-row-reverse">
                                            <p class="my-text">
                                                Lorem ipsum
                                            </p>
                                        </div>
                                        <div class="my-1 d-flex">
                                            <p class="not-my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class=" my-1 d-flex flex-row-reverse">
                                            <p class="my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class=" my-1 d-flex flex-row-reverse">
                                            <p class="my-text">
                                                Lorem ipsum
                                            </p>
                                        </div>

                                        <div class="my-1 d-flex">
                                            <p class="not-my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class=" my-1 d-flex flex-row-reverse">
                                            <p class="my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class=" my-1 d-flex flex-row-reverse">
                                            <p class="my-text">
                                                Lorem ipsum
                                            </p>
                                        </div>

                                        <div class="text-input">
                                            <figure class="m-0" style="display:none;">
                                                <img src="" style="width:100px; height: 100px; border-radius:5%;" id="profileImage" alt="" />
                                                <button class="btn btn-danger ">X</button>
                                            </figure>

                                            <input class="form-control mr-2 ali" type="text" placeholder="Type a message">
                                            <label for="chooseImg">
                                                <i class="far fa-lg fa-images main-link2"></i>
                                                <input id="chooseImg" type="file" class="d-none" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <div class="my-1 d-flex">
                                            <p class="not-my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class=" my-1 d-flex flex-row-reverse">
                                            <p class="my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class="my-1 d-flex">
                                            <p class="not-my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class=" my-1 d-flex flex-row-reverse">
                                            <p class="my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>

                                        <div class="text-input">
                                            <figure class="m-0" style="display:none;">
                                                <img src="" style="width:100px; height: 100px; border-radius:5%;" id="profileImage" alt="" />
                                                <button class="btn btn-danger ">X</button>
                                            </figure>

                                            <input class="form-control mr-2 ali" type="text" placeholder="Type a message">
                                            <label for="chooseImg">
                                                <i class="far fa-lg fa-images main-link2"></i>
                                                <input id="chooseImg" type="file" class="d-none" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <div class="my-1 d-flex">
                                            <p class="not-my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class=" my-1 d-flex flex-row-reverse">
                                            <p class="my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class="my-1 d-flex">
                                            <p class="not-my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class=" my-1 d-flex flex-row-reverse">
                                            <p class="my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>

                                        <div class="text-input">
                                            <figure class="m-0" style="display:none;">
                                                <img src="" style="width:100px; height: 100px; border-radius:5%;" id="profileImage" alt="" />
                                                <button class="btn btn-danger ">X</button>
                                            </figure>

                                            <input class="form-control mr-2 ali" type="text" placeholder="Type a message">
                                            <label for="chooseImg">
                                                <i class="far fa-lg fa-images main-link2"></i>
                                                <input id="chooseImg" type="file" class="d-none" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                        <div class="my-1 d-flex">
                                            <p class="not-my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>
                                        <div class=" my-1 d-flex flex-row-reverse">
                                            <p class="my-text">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ea dolores ad ipsum similique maiores laboriosam omnis perferendis veritatis.
                                            </p>
                                        </div>

                                        <div class="text-input">
                                            <figure class="m-0" style="display:none;">
                                                <img src="" style="width:100px; height: 100px; border-radius:5%;" id="profileImage" alt="" />
                                                <button class="btn btn-danger ">X</button>
                                            </figure>

                                            <input class="form-control mr-2 ali" type="text" placeholder="Type a message">
                                            <label for="chooseImg">
                                                <i class="far fa-lg fa-images main-link2"></i>
                                                <input id="chooseImg" type="file" class="d-none" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row one-board-section" id="ShowBoard" style="display:none;">
                        <div class="col-lg-12 d-flex justify-content-between mt-3 px-2">
                            <div class="d-flex align-items-baseline">
                                <h4 class="d-inline-block mr-5">5 Boards | Wish List</h4>
                                <a href="" class="btn main-btn2" data-toggle="modal" data-target="#EditBoardModal">Edit Board</a>
                            </div>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>

                        <nav class="col-lg-12 mt-3 mb-5 px-0">
                            <b>Show</b>
                            <a href="JavaScript:Void(0);">All</a>
                            <a href="JavaScript:Void(0);">Products</a>
                            <a href="JavaScript:Void(0);">Projects</a>
                            <a href="JavaScript:Void(0);">Ideas</a>
                            <a href="JavaScript:Void(0);">Events</a>
                            <a href="JavaScript:Void(0);">Topics</a>
                        </nav>

                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <a class="img" style="background-image: url(./images/big-proj1.jpg);cursor:pointer">
                                    <div class="card-body card-footer d-flex flex-column justify-content-around">
                                        <p>Hussam's Ideas<p>
                                                <p class="card-text m-0">
                                                    10 Saved Items
                                                </p>
                                    </div>
                                </a>
                            </div>

                            <!--Edit Board Modal -->
                            <div class="modal fade" id="EditBoardModal">
                                <form class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Board</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="exampleName1" class="my-2">Old Board Name</label>
                                                <input type="text" class="form-control" id="exampleName1" aria-describedby="emailHelp" placeholder="Board Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="my-2" for="exampleFormControlSelect1">Example select</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Private</option>
                                                    <option>Public</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn main-btn" data-dismiss="modal">Save</button>

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </form>
                            </div><!-- end Modal-->
                        </div>

                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <a class="img" style="background-image: url(./images/big-proj1.jpg);cursor:pointer">
                                    <div class="card-body card-footer d-flex flex-column justify-content-around">
                                        <p>Hussam's Ideas<p>
                                                <p class="card-text m-0">
                                                    10 Saved Items
                                                </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <a class="img" style="background-image: url(./images/big-proj1.jpg);cursor:pointer">
                                    <div class="card-body card-footer d-flex flex-column justify-content-around">
                                        <p>Hussam's Ideas<p>
                                                <p class="card-text m-0">
                                                    10 Saved Items
                                                </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <a class="img" style="background-image: url(./images/big-proj1.jpg);cursor:pointer">
                                    <div class="card-body card-footer d-flex flex-column justify-content-around">
                                        <p>Hussam's Ideas<p>
                                                <p class="card-text m-0">
                                                    10 Saved Items
                                                </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 px-2">
                            <div class="part card">
                                <a class="img" style="background-image: url(./images/big-proj1.jpg);cursor:pointer">
                                    <div class="card-body  d-flex flex-column justify-content-around">
                                        <p>Hussam's Ideas<p>
                                                <p class="card-text m-0">
                                                    10 Saved Items
                                                </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="row" id="design-content" style="display:none">
                        design-content
                    </div>
                    <div class="row" id="comparison-content" style="display:none">
                        <table class="compare-table table table-bordered table-striped col-12 mt-4 ">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <td scope="col"> <img src="images/proj1.png" alt="">
                                    </td>
                                    <td scope="col"> <img src="images/proj2.png" alt="">
                                    </td>
                                    <td scope="col"> <img src="images/proj3.png" alt="">
                                    </td>
                                    <td scope="col"> <img src="images/proj4.png" alt="">
                                    </td>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th scope="row">Name</th>
                                    <td>Mark
                                        <div class="stars d-block">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </td>
                                    <td>Mark
                                        <div class="stars d-block">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </td>
                                    <td>Mark
                                        <div class="stars d-block">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </td>
                                    <td>Mark
                                        <div class="stars d-block">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Size</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">Material</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>@twitter</td>
                                </tr>
                                <tr>
                                    <th scope="rw">Color</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>@twitter</td>
                                </tr>
                                <tr>
                                    <th scope="row">Price</th>
                                    <td>45,000 EGP</td>
                                    <td>45,000 EGP</td>
                                    <td>45,000 EGP</td>
                                    <td>45,000 EGP</td>
                                </tr>
                                <tr>
                                    <th scope="row">Category</th>
                                    <td><a href="" class="main-link2">Bed Room</a></td>
                                    <td><a href="" class="main-link2">Bed Room</a></td>
                                    <td><a href="" class="main-link2">Bed Room</a></td>
                                    <td><a href="" class="main-link2">Bed Room</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">Vendor</th>
                                    <td>
                                        <a href="" class="main-link2">Bed Room</a>
                                        <div class="stars d-block">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="main-link2">Bed Room</a>
                                        <div class="stars d-block">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="main-link2">Bed Room</a>
                                        <div class="stars d-block">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="main-link2">Bed Room</a>
                                        <div class="stars d-block">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="far fa-star text-warning"></i>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Color</th>
                                    <td>No</td>
                                    <td>10% - Save 2200 EGP</td>
                                    <td>No</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <th scope="row">Color</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>@twitter</td>
                                </tr>
                                <tr>
                                    <th scope="row">Color</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>@twitter</td>
                                </tr>
                                <tr>
                                    <th scope="row">Action</th>
                                    <td><a href="" class="btn main-btn px-3"> <i class="fas fa-trash-alt"></i> </a></td>
                                    <td><a href="" class="btn main-btn px-3"> <i class="fas fa-trash-alt"></i> </a></td>
                                    <td><a href="" class="btn main-btn px-3"> <i class="fas fa-trash-alt"></i> </a></td>
                                    <td><a href="" class="btn main-btn px-3"> <i class="fas fa-trash-alt"></i> </a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row" id="updates-content" style="display:none">

                        <div class="col-lg-12 d-flex justify-content-between mt-3 px-2">
                            <div>
                                <h4 class="d-inline-block mr-5">Updates from People you follow</h4>

                            </div>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>

                        <div class="col-lg-12 px-2">
                            <section class="update-section border-bottom py-3">
                                <a href="">American Furinture</a> Added new products
                                <div class=" rounded p-1 mt-2" style="background-color:#EFF0F2;">
                                    <a href="">
                                        <img src="images/proj1.png" class="m-1 rounded" alt="">
                                    </a>
                                    <a href="">
                                        <img src="images/proj2.png" class="m-1 rounded" alt="">
                                    </a>
                                    <a href="">
                                        <img src="images/proj1.png" class="m-1 rounded" alt="">
                                    </a>
                                    <a href="">
                                        <img src="images/proj2.png" class="m-1 rounded" alt="">
                                    </a>
                                    <a href="">
                                        <img src="images/proj1.png" class="m-1 rounded" alt="">
                                    </a>
                                </div>
                            </section>

                            <section class="update-section border-bottom py-3">
                                <a href="">Caracol</a> Posted An Offer
                                <div class=" rounded p-1 mt-2 offer-link">
                                    <a class="rounded main-btn d-flex flex-column p-2 justify-content-around" href="">
                                        <div>
                                            <img src="images/sale.png" class="float-left" width="15px" alt="" style="width:50px"> <span>Sale</span>
                                        </div>
                                        <h1>15%</h1>
                                        <p class="small">Till: Run Out</p>
                                    </a>
                                </div>
                            </section>

                            <section class="update-section border-bottom py-3">
                                <a href="">Caracol</a> Created an event
                                <div class=" rounded p-1 mt-2 offer-link">
                                    <a class="rounded main-btn d-flex flex-column p-2 justify-content-around text-center" href="">
                                        <p>Monday</p>
                                        <h1>15%</h1>
                                        <p>March 2019</p>
                                    </a>
                                </div>
                            </section>

                            <section class="update-section border-bottom py-3">
                                <a href="">Maha Saeed</a> Posted in Community
                                <div class=" rounded p-1 mt-2 offer-link">
                                    <a class="rounded main-btn d-flex flex-column p-2 justify-content-around text-center" href="">
                                        <p>Monday</p>
                                        <h1>15%</h1>
                                        <p>March 2019</p>
                                    </a>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="row articles" id="ideas-content" style="display:none">
                        <a href="" class="btn main-btn2 m-2"> Create New Idea</a>
                        <div class="col-md-12 px-2" id="product-content">
                            <div class="container p-0">
                                <div class="row border-0 rounded article" style="margin: 15px 0;
                                overflow: hidden;
                                border: none;
                                box-shadow: 1px 1px 5px #b4b4b4;
                                position: relative;">

                                    <div class="col-lg-6 p-0 article-img" style="background-image:url(./images/article-photo.jpg);">
                                        <!--
                                        <aside class="article-overlay text-center">
                                            <a href="" class="btn btn-info my-2 d-block">Edit</a>
                                            <a href="" class="btn btn-danger my-2 d-block">Delete</a>
                                        </aside>
-->
                                    </div>
                                    <div class="col-lg-6 p-3 d-flex flex-column justify-content-between">
                                        <h5>16 Photo Display ideas for family Pictures</h5>
                                        <p class="text-muted pb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo harum reiciendis vero nihil esse autem quibusdam saepe libero consequuntur.</p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="" class="btn main-btn2 px-4"> Full Artical</a>
                                            <a Title="Delete" href="" class="btn btn-danger" style="min-width: 50px;" data-toggle="modal" data-target="#deleteModal"> <i class="far fa-trash-alt"></i></a>
                                            <a Title="Edit" href="" class="btn btn-info" style="min-width: 50px;"><i class="far fa-edit"></i></a>
                                            <ul>
                                                <li class="d-inline-block social">
                                                    <i class="fas fa-thumbs-up"></i>
                                                    <span class="small">28</span>
                                                </li>
                                                <li class="d-inline-block social">
                                                    <i class="fas fa-comment-dots"></i>
                                                    <span class="small">28</span>
                                                </li>
                                                <li class="d-inline-block social">
                                                    <i class="fas fa-heart"></i>
                                                    <span class="small">28</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="feat-products text-center py-3">
                                <h6 class=" text-muted pb-2">Featured Products</h6>
                                <a href=""> <img src="images/proj1.png" alt=""></a>
                                <a href=""> <img src="images/proj1.png" alt=""></a>
                                <a href=""> <img src="images/proj1.png" alt=""></a>
                                <a href=""> <img src="images/proj1.png" alt=""></a>
                                <a href=""> <img src="images/proj1.png" alt=""></a>
                                <a href=""> <img src="images/proj1.png" alt=""></a>

                            </div>
                        </div>

                        <div class="col-md-12" id="product-content">
                            <div class="container p-0">
                                <div class="row border-0 rounded article" style="margin: 15px 0;
                                overflow: hidden;
                                border: none;
                                box-shadow: 1px 1px 5px #b4b4b4;
                                position: relative;">

                                    <div class="col-lg-6 p-0 article-img" style="background-image:url(./images/article-photo.jpg);">
                                        <aside class="article-overlay text-center">
                                            <a href="" class="btn btn-info my-2 d-block">Edit</a>
                                            <a href="" class="btn btn-danger my-2 d-block">Delete</a>
                                        </aside>
                                    </div>
                                    <div class="col-lg-6 p-3 d-flex flex-column justify-content-between">
                                        <h5>16 Photo Display ideas for family Pictures</h5>
                                        <p class="text-muted pb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo harum reiciendis vero nihil esse autem quibusdam saepe libero consequuntur.</p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="" class="btn main-btn2"> Full Artical</a>
                                            <ul>
                                                <li class="d-inline-block social">
                                                    <i class="fas fa-thumbs-up"></i>
                                                    <span class="small">28</span>
                                                </li>
                                                <li class="d-inline-block social">
                                                    <i class="fas fa-comment-dots"></i>
                                                    <span class="small">28</span>
                                                </li>
                                                <li class="d-inline-block social">
                                                    <i class="fas fa-heart"></i>
                                                    <span class="small">28</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12" id="product-content">
                            <div class="container p-0">
                                <div class="row border-0 rounded article" style="margin: 15px 0;
                                overflow: hidden;
                                border: none;
                                box-shadow: 1px 1px 5px #b4b4b4;
                                position: relative;">

                                    <div class="col-lg-6 p-0 article-img" style="background-image:url(./images/article-photo.jpg);">
                                        <aside class="article-overlay text-center">
                                            <a href="" class="btn btn-info my-2 d-block">Edit</a>
                                            <a href="" class="btn btn-danger my-2 d-block">Delete</a>
                                        </aside>
                                    </div>
                                    <div class="col-lg-6 p-3 d-flex flex-column justify-content-between">
                                        <h5>16 Photo Display ideas for family Pictures</h5>
                                        <p class="text-muted pb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo harum reiciendis vero nihil esse autem quibusdam saepe libero consequuntur.</p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="" class="btn main-btn2"> Full Artical</a>
                                            <ul>
                                                <li class="d-inline-block social">
                                                    <i class="fas fa-thumbs-up"></i>
                                                    <span class="small">28</span>
                                                </li>
                                                <li class="d-inline-block social">
                                                    <i class="fas fa-comment-dots"></i>
                                                    <span class="small">28</span>
                                                </li>
                                                <li class="d-inline-block social">
                                                    <i class="fas fa-heart"></i>
                                                    <span class="small">28</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center my-4">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>

                    <div class="row topics py-3 px-1" id="topics-content" style="display:none">
                        <div class="card lunched-post my-2" style="cursor:pointer;max-width:600px;">
                            <div class="card-header px-1 pt-2 bg-white border-0">
                                <figure style="background-image:url(./images/female1.jpg);height:52px !important;" class="img d-inline-block mr-2"></figure>
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
                                        <a class="col p-0" data-fancybox="gallery" href="images/big-proj1.jpg">
                                            <img src="images/big-proj1.jpg" alt="">
                                        </a>
                                        <a class="col p-0" data-fancybox="gallery" href="images/big-proj2.jpg">
                                            <img src="images/big-proj2.jpg" alt="">
                                        </a>
                                        <a class="col p-0" data-fancybox="gallery" href="images/big-proj3.jpg">
                                            <img src="images/big-proj3.jpg" alt="">
                                        </a>
                                        <a class="col p-0" data-fancybox="gallery" href="images/big-proj4.jpg">
                                            <img src="images/big-proj4.jpg" alt="">
                                            <span class="overlay">+5</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-muted p-2 bg-white">
                                <p class="text-info float-right p-2">10 Likes | 3 Replies | 13 Shares</p>
                            </div>
                        </div><!-- End card-->

                        <div class="card lunched-post my-2" style="cursor:pointer;max-width:600px;">
                            <div class="card-header px-1 pt-2 bg-white border-0">
                                <figure style="background-image:url(./images/female1.jpg);height:52px !important;" class="img d-inline-block mr-2"></figure>
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
                                        <a class="col p-0" data-fancybox="gallery" href="images/big-proj1.jpg">
                                            <img src="images/big-proj1.jpg" alt="">
                                        </a>
                                        <a class="col p-0" data-fancybox="gallery" href="images/big-proj2.jpg">
                                            <img src="images/big-proj2.jpg" alt="">
                                        </a>
                                        <a class="col p-0" data-fancybox="gallery" href="images/big-proj3.jpg">
                                            <img src="images/big-proj3.jpg" alt="">
                                        </a>
                                        <a class="col p-0" data-fancybox="gallery" href="images/big-proj4.jpg">
                                            <img src="images/big-proj4.jpg" alt="">
                                            <span class="overlay">+5</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-muted p-2 bg-white">
                                <p class="text-info float-right p-2">10 Likes | 3 Replies | 13 Shares</p>
                            </div>
                        </div><!-- End card-->

                    </div>

                    <div class="row" id="activity-content" style="display:none">
                        <div class="col-12 p-3 px-2">
                            <div class="py-1 my-1 border-bottom d-flex justify-content-between">
                                <p>You followed <a href="" class='main-link2'>Username</a></p>
                                <span class="remove btn btn-danger px-1 py-0">X</span>
                            </div>

                            <div class="py-1 my-1 border-bottom d-flex justify-content-between">
                                <p>You Unfollowed <a href="" class='main-link2'>Username</a></p>
                                <span class="remove btn btn-danger px-1 py-0">X</span>
                            </div>

                            <div class="py-1 my-1 border-bottom d-flex justify-content-between">
                                <p>You followed <a href="" class='main-link2'>Username</a></p>
                                <span class="remove btn btn-danger px-1 py-0">X</span>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="edit-profile-content" style="display:none">
                        <div class="col-12">
                            <!--                            <h3 class="title">Edit Profile</h3>-->

                            <form action="" class="form-row p-3">
                                <div class="form-group col-12">
                                    <label for="exampleFormControlFile1">Upload Profile Picture</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>

                                <div class="form-group col-12">
                                    <label for="exampleFormControlFile1">Upload Cover Image</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>

                                <div class="form-group col-12">
                                    <label for="usr">UserName:</label>
                                    <input type="text" class="form-control" id="usr" placeholder="Old Name">
                                </div>

                                <div class="form-group col-12">
                                    <label for="pass">New Password:</label>
                                    <input type="Password" class="form-control" id="pass" placeholder="New Password">
                                </div>

                                <div class="form-group col-12">
                                    <label for="cpass">Confirm New Password:</label>
                                    <input type="Password" class="form-control" id="cpass" placeholder="Confirm New Password">
                                </div>

                                <div class="form-group col-12">
                                    <input type="submit" class="btn main-btn2" value="Submit">
                                </div>
                            </form>


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</div>
<!--End Showrooms-->

<?php include 'footer.php'; ?>

<!-- DELETE Warning Modal -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header border-0">
                <h4 class="modal-title text-capitalize h5">Are you Sure to delete this?</h4>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn btn-danger px-5" data-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- The Followers Modal -->
<div class="modal fade followers-modal show" id="followersModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header py-2">
                <h4 class="modal-title">Followers</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body pt-1">
                <div class="row ">
                    <div class="col-12 p-1 part border-bottom">
                        <a href="" class="d-block">
                            <figure class="img mb-0" style="background-image:url(./images/male1.jpg)"></figure>
                            <p class="d-inline-block h6" style="color:black">Username Surname</p>
                        </a>
                    </div>
                    <div class="col-12 p-1 part border-bottom">
                        <a href="" class="d-block">
                            <figure class="img mb-0" style="background-image:url(./images/female1.jpg)"></figure>
                            <p class="d-inline-block h6" style="color:black">Username Surname</p>
                        </a>
                    </div>
                    <div class="col-12 p-1 part border-bottom">
                        <a href="" class="d-block">
                            <figure class="img mb-0" style="background-image:url(./images/male1.jpg)"></figure>
                            <p class="d-inline-block h6" style="color:black">Username Surname</p>
                        </a>
                    </div>
                    <div class="col-12 p-1 part border-bottom">
                        <a href="" class="d-block">
                            <figure class="img mb-0" style="background-image:url(./images/female1.jpg)"></figure>
                            <p class="d-inline-block h6" style="color:black">Username Surname</p>
                        </a>
                    </div>
                    <div class="col-12 p-1 part border-bottom">
                        <a href="" class="d-block">
                            <figure class="img mb-0" style="background-image:url(./images/male1.jpg)"></figure>
                            <p class="d-inline-block h6" style="color:black">Username Surname</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //    === Make div square ===
    $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
    $(window).on('resize', function() {
        $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
    })

</script>
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

</script>
