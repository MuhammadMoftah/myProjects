<?php include 'header.php'; ?>
<div class="showrooms dashboard">
    <div class="container head px-0">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <div class="pt-3">
                    <h1 class="h3 d-inline-block mr-5">Your Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="dash-details">
        <div class="container px-0">
            <div class="row mb-3">
                <div class="col-xl-2 side-menu mt-2 pt-2">
                    <div class="h-100 p-1 rounded bg-white">
                        <select name="" id="" class="form-control mb-3">
                            <option value="">Select Profile</option>
                            <option value="">One</option>
                            <option value="">Two</option>
                        </select>
                        <figure class="img mx-auto" style="background-image:url(./images/male1.jpg)"></figure>
                        <p class="font-weight-bold border-bottom pb-3">Caracol</p>
                        <div class="showroom-nav my-4">
                            <p class="main-link py-2 active" data-id='#dash-chat'>Message</p>
                            <p class="main-link py-2" data-id='#dash-products'>Products</p>
                            <p class="main-link py-2" data-id='#dash-offers'>Offers</p>
                            <p class="main-link py-2" data-id='#dash-info'>Information</p>
                            <p class="main-link py-2" data-id='#dash-events'>Events</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-10 mt-2 ">
                    <!--Dashboard chat-->
                    <div class="container dash-chat" id="dash-chat">
                        <div class="row bg-white rounded py-2">
                            <div class="col-4 chat-left d-fle align-items-center">
                                <hgroup class="d-fle justify-content-between row px-3">
                                    <select class="form-control col-md-4 px-1" name="" id="">
                                        <option value="">All</option>
                                        <option value="">Read</option>
                                        <option value="">UnRead</option>
                                    </select>
                                    <input class="form-control col-md-8" type="text" style="max-width:180px" placeholder="Search ...">
                                </hgroup>

                                <aside class="chat-list py-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link pl-1 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                            <aside class="chat-user d-flex align-items-center">
                                                <figure class="img mb-0 mr-2" style="background-image: url(./images/male1.jpg)"></figure>
                                                <h6 class="mb-0 mr-2 text-secondary">Hussam El-Rabbat</h6>
                                                <i class="fas fa-star text-warning"></i>
                                            </aside>
                                        </a>
                                        <a class="nav-link pl-1" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                            <aside class="chat-user d-flex align-items-center">
                                                <figure class="img mb-0 mr-2" style="background-image: url(./images/female1.jpg)"></figure>
                                                <h6 class="mb-0 mr-2 text-secondary font-weight-bold">Yara Ayman</h6>
                                                <span style="height:10px; width:10px;" class="rounded-circle badge-info"> </span>
                                            </aside>
                                        </a>
                                        <a class="nav-link pl-1" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                            <aside class="chat-user d-flex align-items-center">
                                                <figure class="img mb-0 mr-2" style="background-image: url(./images/male1.jpg)"></figure>
                                                <h6 class="mb-0 mr-2 text-secondary">Hussam El-Rabbat</h6>
                                            </aside>
                                        </a>
                                        <a class="nav-link pl-1" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                            <aside class="chat-user d-flex align-items-center">
                                                <figure class="img mb-0 mr-2" style="background-image: url(./images/female1.jpg)"></figure>
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
                                        <figure class="img mb-0 mr-2" style="background-image: url(./images/male1.jpg)"></figure>
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
                    <!--Dashboard Products-->
                    <div class="container dash-products" id="dash-products" style="display:none">
                        <div class="row bg-white rounded p-2">
                            <ul class="nav nav-pills mb-3 w-100" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link btn main-btn2 mr-2 active" data-toggle="pill" href="#pills-manage-products">Manage Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn main-btn2 mr-2" data-toggle="pill" href="#pills-add-product">Add Product</a>
                                </li>
                            </ul>

                            <div class="tab-content w-100" id="pills-tabContent">

                                <div class="tab-pane fade show active" id="pills-manage-products">
                                    <!--Offers-->
                                    <div class="container trending">
                                        <div class="row vendors offers bg-transparent px-2">
                                            <div class="col-md-4 col-6 px-2 my-2">
                                                <div class="part card" style="min-width: 200px;min-height: 200px;max-height: 280px;">
                                                    <img src="images/proj3.png" class="card-img-top" alt="">
                                                    <!--                                                    <figure class="img" style="background-image: url(./images/proj3.png)"></figure>-->
                                                    <aside class="overlay text-center">
                                                        <a class="d-block w-50 mx-auto btn btn-info" href="" style="min-width: 150px;">Edit Offer</a>
                                                        <button class="d-block w-50 mx-auto btn btn-danger" data-toggle="modal" data-target="#deleteModal" style="margin-top: 10px;min-width: 150px;">Delete Offer</button>
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

                                            <div class="col-md-4 col-6 px-2 my-2">
                                                <div class="part card" style="min-width: 200px;min-height: 200px;max-height: 280px;">
                                                    <img src="images/proj3.png" class="card-img-top" alt="">
                                                    <aside class="overlay text-center">
                                                        <a class="d-block w-50 mx-auto btn btn-info" href="" style="min-width: 150px;">Edit Offer</a>
                                                        <a class="d-block w-50 mx-auto btn btn-danger" href="" style="margin-top: 10px;min-width: 150px;">Delete Offer</a>
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

                                            <div class="col-md-4 col-6 px-2 my-2">
                                                <div class="part card" style="min-width: 200px;min-height: 200px;max-height: 280px;">
                                                    <img src="images/proj3.png" class="card-img-top" alt="">
                                                    <aside class="overlay text-center">
                                                        <a class="d-block w-50 mx-auto btn btn-info" href="" style="min-width: 150px;">Edit Offer</a>
                                                        <a class="d-block w-50 mx-auto btn btn-danger" href="" style="margin-top: 10px;min-width: 150px;">Delete Offer</a>
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

                                            <div class="col-md-4 col-6 px-2 my-2">
                                                <div class="part card" style="min-width: 200px;min-height: 200px;max-height: 280px;">
                                                    <img src="images/proj3.png" class="card-img-top" alt="">
                                                    <aside class="overlay text-center">
                                                        <a class="d-block w-50 mx-auto btn btn-info" href="" style="min-width: 150px;">Edit Offer</a>
                                                        <a class="d-block w-50 mx-auto btn btn-danger" href="" style="margin-top: 10px;min-width: 150px;">Delete Offer</a>
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
                                    </div>
                                    <!--End Offers Row-->
                                </div>
                                <!--End offers tab -->

                                <!--Add Offers Tap-->
                                <div class="tab-pane fade" id="pills-add-product">
                                    <form action="" class="add-product">
                                        <div class="row">
                                            <div class="col-md-6 border-right">
                                                <div class="form-group">
                                                    <label for="">Upload up to Photos</label>
                                                    <label for="uploadimgs" class="float-right">
                                                        <div class="btn upload-btn">Upload</div>
                                                    </label>
                                                    <input type="file" multiple class="d-none" id="uploadimgs">

                                                    <small class="text-muted d-block pb-2">Supported files: JPG, JPEG, PNG</small>
                                                    <div class="m-1 d-inline-block">
                                                        <label for="profileImg" class="uploadimg">
                                                            <div class="close-overlay">
                                                                <span class="btn btn-danger fas fa-trash-alt"></span>
                                                            </div>
                                                            <img src="images/white.png" id="profileImage1" alt="">
                                                            <input type="file" style="display:none" id="profileImg2" onchange="document.getElementById('profileImage2').src = window.URL.createObjectURL(this.files[0])">
                                                        </label>
                                                        <input type="file" style="display:none" id="profileImg" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>

                                                    <div class="m-1 d-inline-block">
                                                        <label for="profileImg2" class="uploadimg">
                                                            <div class="close-overlay">
                                                                <span class="btn btn-danger fas fa-trash-alt"></span>
                                                            </div>
                                                            <img src="images/white.png" id="profileImage2" alt="">
                                                        </label>
                                                        <input type="file" style="display:none" id="profileImg2" onchange="document.getElementById('profileImage2').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>

                                                    <div class="m-1 d-inline-block">
                                                        <label for="profileImg2" class="uploadimg">
                                                            <div class="close-overlay">
                                                                <span class="btn btn-danger fas fa-trash-alt"></span>
                                                            </div>
                                                            <img src="images/white.png" id="profileImage2" alt="">
                                                        </label>
                                                        <input type="file" style="display:none" id="profileImg3" onchange="document.getElementById('profileImage3').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>

                                                    <div class="m-1 d-inline-block">
                                                        <label for="profileImg2" class="uploadimg">
                                                            <div class="close-overlay">
                                                                <span class="btn btn-danger fas fa-trash-alt"></span>
                                                            </div>
                                                            <img src="images/white.png" id="profileImage2" alt="">
                                                        </label>
                                                        <input type="file" style="display:none" id="profileImg4" onchange="document.getElementById('profileImage4').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>

                                                    <div class="m-1 d-inline-block">
                                                        <label for="profileImg2" class="uploadimg">
                                                            <div class="close-overlay">
                                                                <span class="btn btn-danger fas fa-trash-alt"></span>
                                                            </div>
                                                            <img src="images/white.png" id="profileImage2" alt="">
                                                        </label>
                                                        <input type="file" style="display:none" id="profileImg5" onchange="document.getElementById('profileImage5').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Price:</h5>
                                                    <input class="form-control form-control-sm" style="width:150px" type="text">
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Product Category:</h5>
                                                    <select name="" id="" class="selectpicker" multiple data-hide-disabled="true" data-size="5">
                                                        <option value="">Category</option>
                                                        <option value="">Category</option>
                                                        <option value="">Category</option>
                                                        <option value="">Category</option>
                                                        <option value="">Category</option>
                                                        <option value="">Category</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Product Style:</h5>
                                                    <select name="" id="" class="selectpicker" multiple data-hide-disabled="true" data-size="5"> class="form-control-sm py-0">
                                                        <option value="">Style</option>
                                                        <option value="">Style</option>
                                                        <option value="">Style</option>
                                                        <option value="">Style</option>
                                                        <option value="">Style</option>
                                                        <option value="">Style</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Product Color:</h5>
                                                    <select name="" id="" class="form-control-sm py-0">
                                                        <option value="">Color</option>
                                                        <option value="" style="" class="text-su">Green</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Product Color:</h5>
                                                    <select name="" id="" class="selectpicker form-control-sm p-0">
                                                        <option value="">Color</option>
                                                        <option data-content="
                                                            <div class='d-flex justify-content-between'>
                                                                <p>White</p>
                                                                <span style='background-color:white'></span>
                                                            </div>">
                                                        </option>

                                                        <option data-content="
                                                            <div class='d-flex justify-content-between'>
                                                                <p>Red</p>
                                                                <span style='background-color:red'></span>
                                                            </div>">
                                                        </option>

                                                        <option data-content="
                                                            <div class='d-flex justify-content-between'>
                                                                <p>Blue</p>
                                                                <span style='background-color:blue'></span>
                                                            </div>">
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Upholstery Material:</h5>
                                                    <select name="" id="" class="form-control-sm py-0">
                                                        <option value="">Matrial</option>
                                                        <option data-content="<span class='badge badge-success'>Relish</span>">Relish</option>

                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Frame Material:</h5>
                                                    <select name="" id="" class="form-control-sm py-0">
                                                        <option value="">Matrial</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Product Dimensions:</h5>
                                                    <select name="" id="" class="form-control-sm py-0">
                                                        <option value="">Matrial</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5 style="width:150px">Frame Material:</h5>
                                                    <div>
                                                        <input class="form-control d-inline-block" type="text" style="width:70px; text-align:center" placeholder="Hight">
                                                        <input class="form-control d-inline-block" type="text" style="width:70px; text-align:center" placeholder="Width">
                                                        <input class="form-control d-inline-block" type="text" style="width:70px; text-align:center" placeholder="Depth">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Description:</h5>
                                                    <textarea class="form-control" name="" id="" cols="15" rows="5" style="resize:none"></textarea>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Product Avaliable in:</h5>
                                                    <select name="" id="" class="form-control-sm py-0">
                                                        <option value="">Branch</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5 style="width:200px">Guarantee:</h5>
                                                    <div>
                                                        <select name="" id="" class="form-control-sm py-0" style="width:80px">
                                                            <option value="">Month</option>
                                                        </select>
                                                        <select name="" id="" class="form-control-sm py-0" style="width:80px">
                                                            <option value="">Year</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group d-flex justify-content-between border-bottom pb-4">
                                                    <h5>Made in:</h5>
                                                    <select name="" id="" class="form-control-sm py-0">
                                                        <option value="">Country</option>
                                                    </select>
                                                </div>


                                                <div class="custom-control custom-checkbox py-3">
                                                    <input type="checkbox" class="custom-control-input" id="customRadio" name="example1">
                                                    <label class="custom-control-label" for="customRadio">Add this Product to Offer</label>
                                                </div>


                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Descound Percentage:</h5>
                                                    <div class="input-group-sm mb-3 d-flex ">
                                                        <input type="text" class="form-control" style="width:60px">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" style="border-radius: 0px 5px 5px 0px;">%</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5 style="width:200px">Valid Until:</h5>
                                                    <div>
                                                        <select name="" id="" class="form-control-sm py-0" style="width:80px">
                                                            <option value="">Day</option>
                                                        </select>
                                                        <select name="" id="" class="form-control-sm py-0" style="width:80px">
                                                            <option value="">Month</option>
                                                        </select>
                                                        <select name="" id="" class="form-control-sm py-0" style="width:80px">
                                                            <option value="">Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-center">
                                                <div class="submit-product">
                                                    <a href="" class="btn">Preview Product</a>
                                                    <input type="submit" class="btn" value="Submit Product">
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                                <!--End Add offer tap-->
                            </div>


                        </div>
                    </div>
                    <!--End Dashboard Products-->

                    <!--Dashboard Offers-->
                    <div class="container dash-offers" id="dash-offers" style="display:none">
                        <div class="row bg-white rounded p-2">
                            <ul class="nav nav-pills mb-3 w-100" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link btn main-btn2 mr-2 active" data-toggle="pill" href="#pills-manage-offers">Manage Offers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn main-btn2 mr-2" data-toggle="pill" href="#pills-add-offer">Add Offer</a>
                                </li>
                            </ul>

                            <div class="tab-content w-100" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-manage-offers">

                                    <!--Offers-->
                                    <div class="container trending">
                                        <div class="row vendors offers bg-transparent px-2">
                                            <div class="col-md-4 col-6 px-2 my-2">
                                                <div class="part card" style="min-width: 200px;min-height: 200px;max-height: 280px;">
                                                    <img src="images/proj3.png" class="card-img-top" alt="">
                                                    <aside class="overlay text-center">
                                                        <a class="d-block w-50 mx-auto btn btn-info" href="" style="min-width: 150px;">Edit Offer</a>
                                                        <button class="d-block w-50 mx-auto btn btn-danger" data-target="#deleteModal" data-toggle="modal"  style="margin-top: 10px;min-width: 150px;">Delete Offer</button>
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

                                            <div class="col-md-4 col-6 px-2 my-2">
                                                <div class="part card" style="min-width: 200px;min-height: 200px;max-height: 280px;">
                                                    <img src="images/proj3.png" class="card-img-top" alt="">
                                                    <aside class="overlay text-center">
                                                        <a class="d-block w-50 mx-auto btn btn-info" href="" style="min-width: 150px;">Edit Offer</a>
                                                        <a class="d-block w-50 mx-auto btn btn-danger" href="" style="margin-top: 10px;min-width: 150px;">Delete Offer</a>
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

                                            <div class="col-md-4 col-6 px-2 my-2">
                                                <div class="part card" style="min-width: 200px;min-height: 200px;max-height: 280px;">
                                                    <img src="images/proj3.png" class="card-img-top" alt="">
                                                    <aside class="overlay text-center">
                                                        <a class="d-block w-50 mx-auto btn btn-info" href="" style="min-width: 150px;">Edit Offer</a>
                                                        <a class="d-block w-50 mx-auto btn btn-danger" href="" style="margin-top: 10px;min-width: 150px;">Delete Offer</a>
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

                                            <div class="col-md-4 col-6 px-2 my-2">
                                                <div class="part card" style="min-width: 200px;min-height: 200px;max-height: 280px;">
                                                    <img src="images/proj3.png" class="card-img-top" alt="">
                                                    <aside class="overlay text-center">
                                                        <a class="d-block w-50 mx-auto btn btn-info" href="" style="min-width: 150px;">Edit Offer</a>
                                                        <a class="d-block w-50 mx-auto btn btn-danger" href="" style="margin-top: 10px;min-width: 150px;">Delete Offer</a>
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
                                    </div>
                                    <!--End Offers Row-->
                                </div>
                                <!--End offers tab -->

                                <!--Add Offers Tap-->
                                <div class="tab-pane fade" id="pills-add-offer">
                                    <form action="" class="add-product">
                                        <div class="row">
                                            <div class="col-md-6 border-right">
                                                <div class="form-group">
                                                    <label for="">Upload up to Photos</label>
                                                    <label for="uploadimgs" class="float-right">
                                                        <div class="btn upload-btn">Upload</div>
                                                    </label>
                                                    <input type="file" multiple class="d-none" id="uploadimgs">

                                                    <small class="text-muted d-block pb-2">Supported files: JPG, JPEG, PNG</small>
                                                    <div class="m-1 d-inline-block">
                                                        <label for="profileImg" class="uploadimg">
                                                            <div class="close-overlay">
                                                                <span class="btn btn-danger fas fa-trash-alt"></span>
                                                            </div>
                                                            <img src="images/white.png" id="profileImage1" alt="">
                                                            <input type="file" style="display:none" id="profileImg2" onchange="document.getElementById('profileImage2').src = window.URL.createObjectURL(this.files[0])">
                                                        </label>
                                                        <input type="file" style="display:none" id="profileImg" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>

                                                    <div class="m-1 d-inline-block">
                                                        <label for="profileImg2" class="uploadimg">
                                                            <div class="close-overlay">
                                                                <span class="btn btn-danger fas fa-trash-alt"></span>
                                                            </div>
                                                            <img src="images/white.png" id="profileImage2" alt="">
                                                        </label>
                                                        <input type="file" style="display:none" id="profileImg2" onchange="document.getElementById('profileImage2').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>

                                                    <div class="m-1 d-inline-block">
                                                        <label for="profileImg2" class="uploadimg">
                                                            <div class="close-overlay">
                                                                <span class="btn btn-danger fas fa-trash-alt"></span>
                                                            </div>
                                                            <img src="images/white.png" id="profileImage2" alt="">
                                                        </label>
                                                        <input type="file" style="display:none" id="profileImg3" onchange="document.getElementById('profileImage3').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>

                                                    <div class="m-1 d-inline-block">
                                                        <label for="profileImg2" class="uploadimg">
                                                            <div class="close-overlay">
                                                                <span class="btn btn-danger fas fa-trash-alt"></span>
                                                            </div>
                                                            <img src="images/white.png" id="profileImage2" alt="">
                                                        </label>
                                                        <input type="file" style="display:none" id="profileImg4" onchange="document.getElementById('profileImage4').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>

                                                    <div class="m-1 d-inline-block">
                                                        <label for="profileImg2" class="uploadimg">
                                                            <div class="close-overlay">
                                                                <span class="btn btn-danger fas fa-trash-alt"></span>
                                                            </div>
                                                            <img src="images/white.png" id="profileImage2" alt="">
                                                        </label>
                                                        <input type="file" style="display:none" id="profileImg5" onchange="document.getElementById('profileImage5').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Price:</h5>
                                                    <input class="form-control form-control-sm" style="width:150px" type="text">
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Product Category:</h5>
                                                    <select name="" id="" class="selectpicker" multiple data-hide-disabled="true" data-size="5">
                                                        <option value="">Category</option>
                                                        <option value="">Category</option>
                                                        <option value="">Category</option>
                                                        <option value="">Category</option>
                                                        <option value="">Category</option>
                                                        <option value="">Category</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Product Style:</h5>
                                                    <select name="" id="" class="selectpicker" multiple data-hide-disabled="true" data-size="5"> class="form-control-sm py-0">
                                                        <option value="">Style</option>
                                                        <option value="">Style</option>
                                                        <option value="">Style</option>
                                                        <option value="">Style</option>
                                                        <option value="">Style</option>
                                                        <option value="">Style</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Product Color:</h5>
                                                    <select name="" id="" class="form-control-sm py-0">
                                                        <option value="">Color</option>
                                                        <option value="" style="" class="text-su">Green</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Product Color:</h5>
                                                    <select name="" id="" class="selectpicker form-control-sm p-0">
                                                        <option value="">Color</option>
                                                        <option data-content="
                                                            <div class='d-flex justify-content-between'>
                                                                <p>White</p>
                                                                <span style='background-color:white'></span>
                                                            </div>">
                                                        </option>

                                                        <option data-content="
                                                            <div class='d-flex justify-content-between'>
                                                                <p>Red</p>
                                                                <span style='background-color:red'></span>
                                                            </div>">
                                                        </option>

                                                        <option data-content="
                                                            <div class='d-flex justify-content-between'>
                                                                <p>Blue</p>
                                                                <span style='background-color:blue'></span>
                                                            </div>">
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Upholstery Material:</h5>
                                                    <select name="" id="" class="form-control-sm py-0">
                                                        <option value="">Matrial</option>
                                                        <option data-content="<span class='badge badge-success'>Relish</span>">Relish</option>

                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Frame Material:</h5>
                                                    <select name="" id="" class="form-control-sm py-0">
                                                        <option value="">Matrial</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Product Dimensions:</h5>
                                                    <select name="" id="" class="form-control-sm py-0">
                                                        <option value="">Matrial</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5 style="width:150px">Frame Material:</h5>
                                                    <div>
                                                        <input class="form-control d-inline-block" type="text" style="width:70px; text-align:center" placeholder="Hight">
                                                        <input class="form-control d-inline-block" type="text" style="width:70px; text-align:center" placeholder="Width">
                                                        <input class="form-control d-inline-block" type="text" style="width:70px; text-align:center" placeholder="Depth">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Description:</h5>
                                                    <textarea class="form-control" name="" id="" cols="15" rows="5" style="resize:none"></textarea>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Product Avaliable in:</h5>
                                                    <select name="" id="" class="form-control-sm py-0">
                                                        <option value="">Branch</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5 style="width:200px">Guarantee:</h5>
                                                    <div>
                                                        <select name="" id="" class="form-control-sm py-0" style="width:80px">
                                                            <option value="">Month</option>
                                                        </select>
                                                        <select name="" id="" class="form-control-sm py-0" style="width:80px">
                                                            <option value="">Year</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group d-flex justify-content-between border-bottom pb-4">
                                                    <h5>Made in:</h5>
                                                    <select name="" id="" class="form-control-sm py-0">
                                                        <option value="">Country</option>
                                                    </select>
                                                </div>


                                                <div class="custom-control custom-checkbox py-3">
                                                    <input type="checkbox" class="custom-control-input" id="customRadio" name="example1">
                                                    <label class="custom-control-label" for="customRadio">Add this Product to Offer</label>
                                                </div>


                                                <div class="form-group d-flex justify-content-between">
                                                    <h5>Descound Percentage:</h5>
                                                    <div class="input-group-sm mb-3 d-flex ">
                                                        <input type="text" class="form-control" style="width:60px">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" style="border-radius: 0px 5px 5px 0px;">%</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group d-flex justify-content-between">
                                                    <h5 style="width:200px">Valid Until:</h5>
                                                    <div>
                                                        <select name="" id="" class="form-control-sm py-0" style="width:80px">
                                                            <option value="">Day</option>
                                                        </select>
                                                        <select name="" id="" class="form-control-sm py-0" style="width:80px">
                                                            <option value="">Month</option>
                                                        </select>
                                                        <select name="" id="" class="form-control-sm py-0" style="width:80px">
                                                            <option value="">Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-center">
                                                <div class="submit-product">
                                                    <a href="" class="btn">Preview Product</a>
                                                    <input type="submit" class="btn" value="Submit Product">
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                                <!--End Add offer tap-->
                            </div>


                        </div>
                    </div>
                    <!--Dashboard Information-->
                    <div class="container dash-info" id="dash-info" style="display:none">
                        <div class="row bg-white rounded p-2">
                            <article class="border-bottom w-100 py-2">
                                <h6 class="h5 w-100">Profile Photo</h6>
                                <hgroup>
                                    <label for="uploadfile">
                                        <span class="btn main-btn rounded">Upload</span>
                                        <span class="text-muted">Best Size 150 X 150 Pixels</span>
                                        <input class="d-none" type="file" id="uploadfile">
                                    </label>
                                    <aside class="d-flex align-items-center">
                                        <figure class="img rounded d-inline-block mr-2 my-2 border" style="background-image:url(./images/big-proj3.jpg);height: 150px;width: 150px;"></figure>
                                        <button class="btn btn-danger">X</button>
                                    </aside>
                                </hgroup>
                            </article>

                            <article class="border-bottom w-100 py-2">
                                <h6 class="h5 w-100">Cover Photo</h6>
                                <hgroup>
                                    <label for="uploadfile">
                                        <span class="btn main-btn rounded">Upload</span>
                                        <span class="text-muted">Best Size 1140 X 250 Pixels</span>
                                        <input class="d-none" type="file" id="uploadfile">
                                    </label>
                                    <aside class="d-flex align-items-center">
                                        <figure class="img rounded d-inline-block mr-2 my-2 border" style="background-image:url(./images/big-proj3.jpg);height: 250px;width: 100%;"></figure>
                                        <button class="btn btn-danger">X</button>
                                    </aside>
                                </hgroup>
                            </article>

                            <article class="border-bottom w-100 py-2">
                                <h6 class="h5 w-100 py-2">Update Your Story</h6>
                                <textarea class="form-control my-2" name="" id="" cols="30" rows="7" placeholder="Type here ..." style="resize:none"></textarea>
                            </article>

                            <article class="border-bottom w-100 py-2">
                                <h6 class="h5 w-100 py-2">Your Branch info</h6>
                                <div class="container">
                                    <div class="row single border rounded px-0">
                                        <div class="col-lg-6 py-2">
                                            <div class="form-group">
                                                <label for="">Adress</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="d-inline" for="">Phone1: </label>
                                                <input type="text" class="form-control w-50 d-inline">
                                            </div>
                                            <div class="form-group">
                                                <label class="d-inline" for="">Phone2: </label>
                                                <input type="text" class="form-control w-50 d-inline">
                                            </div>

                                            <div class="form-group">
                                                <label class="d-block" for="">Working Hours: </label>

                                                <div class="form-check d-inline-block my-1">
                                                    <input type="checkbox" value="" id="Sunday">
                                                    <label class="form-check-label" for="Sunday" style="width:90px">
                                                        Sunday
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm d-inline" placeholder="From" style="width:70px">
                                                    <input type="text" class="form-control form-control-sm d-inline" placeholder="To" style="width:70px">
                                                </div>

                                                <div class="form-check d-inline-block my-1">
                                                    <input type="checkbox" value="" id="Monday">
                                                    <label class="form-check-label" style="width:90px" for="Monday">
                                                        Monday
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm d-inline" style="width:70px" placeholder="From">
                                                    <input type="text" class="form-control form-control-sm d-inline" style="width:70px" placeholder="To">
                                                </div>

                                                <div class="form-check d-inline-block my-1">
                                                    <input type="checkbox" value="" id="Tuesday">
                                                    <label class="form-check-label" style="width:90px" for="Tuesday">
                                                        Tuesday
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm d-inline" style="width:70px" placeholder="From">
                                                    <input type="text" class="form-control form-control-sm d-inline" style="width:70px" placeholder="To">
                                                </div>

                                                <div class="form-check d-inline-block my-1">
                                                    <input type="checkbox" value="" id="Wednesday">
                                                    <label class="form-check-label" style="width:90px" for="Wednesday">
                                                        Wednesday
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm d-inline" style="width:70px" placeholder="From">
                                                    <input type="text" class="form-control form-control-sm d-inline" style="width:70px" placeholder="To">
                                                </div>

                                                <div class="form-check d-inline-block my-1">
                                                    <input type="checkbox" value="" id="Thursday">
                                                    <label class="form-check-label" style="width:90px" for="Thursday">
                                                        Thursday
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm d-inline" style="width:70px" placeholder="From">
                                                    <input type="text" class="form-control form-control-sm d-inline" style="width:70px" placeholder="To">
                                                </div>

                                                <div class="form-check d-inline-block my-1">
                                                    <input type="checkbox" value="" id="Friday">
                                                    <label class="form-check-label" style="width:90px" for="Friday">
                                                        Friday
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm d-inline" style="width:70px" placeholder="From">
                                                    <input type="text" class="form-control form-control-sm d-inline" style="width:70px" placeholder="To">
                                                </div>

                                                <div class="form-check d-inline-block my-1">
                                                    <input type="checkbox" value="" id="Saturday">
                                                    <label class="form-check-label" style="width:90px" for="Saturday">
                                                        Saturday
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm d-inline" style="width:70px" placeholder="From">
                                                    <input type="text" class="form-control form-control-sm d-inline" style="width:70px" placeholder="To">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 py-2">
                                            <div class="mapouter mt-3">
                                                <div class="gmap_canvas"><iframe width="400" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=egypt&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.org"></a></div>
                                                <style>
                                                    .mapouter {
                                                        position: relative;
                                                        height: 500px;
                                                    }

                                                </style>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button class="btn main-btn my-2">Add New Branch</button>
                            </article>

                            <article class="border-bottom w-100 py-2">
                                <h6 class="h5 w-100 py-2">Social Network</h6>
                                <div class="form-group">
                                    <h6 class="d-inline-block" style="width:100px">Website: </h6>
                                    <input type="text" class="form-control d-inline-block" style="width:400px">
                                </div>

                                <div class="form-group">
                                    <h6 class="d-inline-block" style="width:100px">Facebook: </h6>
                                    <input type="text" class="form-control d-inline-block" style="width:400px">
                                </div>

                                <div class="form-group">
                                    <h6 class="d-inline-block" style="width:100px">Twitter: </h6>
                                    <input type="text" class="form-control d-inline-block" style="width:400px">
                                </div>

                                <div class="form-group">
                                    <h6 class="d-inline-block" style="width:100px">Instagram: </h6>
                                    <input type="text" class="form-control d-inline-block" style="width:400px">
                                </div>

                                <div class="form-group">
                                    <h6 class="d-inline-block" style="width:100px">Youtube: </h6>
                                    <input type="text" class="form-control d-inline-block" style="width:400px">
                                </div>
                            </article>

                        </div>
                    </div>
                    <!--Dashboard Events-->
                    <div class="container dash-events" id="dash-events" style="display:none">events</div>
                </div>
                <!--end col 10-->

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


<script>
    $('.text-input #chooseImg').change(function() {
        $('.text-input figure').fadeIn()
    })
    $('.text-input figure button').click(function() {
        $('.text-input #chooseImg').val('')
        $('.text-input figure').fadeOut();
    })

</script>
<script>
    //    === Make div square ===
    //        $('.offers .part').outerHeight($('.offers .part').outerWidth());
    //        $(window).on('resize', function() {
    //            $('.offers .part').outerHeight($('.offers .part').outerWidth());
    //        })

</script>
