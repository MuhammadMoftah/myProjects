<?php include 'header.php'; ?>
<div class="container">
    <section class="add-product my-5 shadow bg-white p-3 rounded">
        <form action="">
            <h3 class="my-2">Add Showroom</h3>

            <div class="row mt-4">
                <div class="col-md-6 border-right">

                    <div class="form-group d-flex justify-content-between">
                        <label for="">
                            <h5 class="d-block">Showroom Name:</h5>
                        </label>
                        <input class="form-control form-control-sm" style="max-width:200px" type="text">
                    </div>

                    <div class="form-group">
                        <h5>About:</h5>
                        <textarea class="form-control" name="" id="" cols="15" rows="5" style="resize:none"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Upload Showroom Logo</label>
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
                    </div>

                    <div class="form-group">
                        <label for="">Upload Showroom Cover</label>
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
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="add-branch border-bottom mb-4">
                        <h4 class="pb-4">Add Branch</h4>
                        <div class="form-group d-flex justify-content-between">
                            <label for="mapsLink">Maps Link</label>
                            <input type="text" class="form-control form-control-sm" id="mapsLink" placeholder="Maps Link" style="max-width:200px">
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control form-control-sm" id="mapsLink" placeholder="Type Address Here" style="max-width:200px">
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <label for="Phone">Add Phone</label>
                            <input type="text" class="form-control form-control-sm" id="Phone" placeholder="Type Phone Here" style="max-width:200px">
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <label for="AnotherPhone">Another Phone</label>
                            <input type="text" class="form-control form-control-sm" id="AnotherPhone" placeholder="Another Phone (Optional)" style="max-width:200px">
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <label for="AnotherPhone">Working Hours</label>
                            <div>
                                <select name="" id="" style="width:75px">
                                    <option value="">1 AM</option>
                                    <option value="">2 AM</option>
                                </select>
                                <span class="text-muted mx-2"> to </span>
                                <select name="" id="" style="width:75px">
                                    <option value="">1 AM</option>
                                    <option value="">2 AM</option>
                                </select>
                            </div>
                        </div>
                    </div><!-- end one branch-->


                    <button class="btn main-btn2 d-block m-auto">Add Branch</button>

                </div>

                <div class="col-md-12 text-center">
                    <div class="submit-product">
                        <a href="" class="btn">Preview Product</a>
                        <input type="submit" class="btn" value="Submit Product">
                        <div class="btn" data-toggle="modal" data-target="#showroomModal">Show Modal</div>
                    </div>
                </div>

            </div>

        </form>
    </section>
</div>


<?php include 'footer.php'; ?>


<!-- The Showroom Modal -->
<div class="modal fade showroom-modal" id="showroomModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal body -->
            <form class="modal-body text-center">
                <img src="./images/success.jpg" width="50" height="48" alt="">
                <p class="h2 pb-3 pt-2">Welcome to Yalla Furnish</p>
                <p class="h5 pb-4">
                    Your showroom has been created successfully and will be approved soon <br>
                    Our team will Contact you to handle your product & categories.
                </p>
                <p class="pb-2">If you prefer to call on another phone number or e-mail please submit it.</p>
                <div class="d-flex justify-content-around mb-3">
                    <input type="text" class="form-control" placeholder="Phone Number" style="max-width:350px;">
                    <input type="text" class="form-control" placeholder="Email Address" style="max-width:350px;">
                </div>
                <input class="btn btn-info mx-2" type="submit" disabled="disabled" style="border-radius:25px;min-width: 125px;">
                <button type="button" class="btn main-btn2 mx-2" data-dismiss="modal" style="border-radius:25px;min-width: 125px;">Skip</button>
            </form>


        </div>
    </div>
</div>

<script>
    (function() {
        $('.showroom-modal form input[type="text"]').keyup(function() {

            var empty = false;

            $('.showroom-modal form input[type="text"]').each(function() {
                if ($(this).val().trim() == '') {
                    empty = true;
                }
            });

            if (empty) {
                $(".showroom-modal form input[type=submit]").attr('disabled', 'disabled');
            } else {
                $(".showroom-modal form input[type=submit]").removeAttr('disabled');
            }

        });
    })()
</script>
