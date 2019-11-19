<?php include 'header.php'; ?>
<div class="container">
    <section class="add-product my-5 shadow bg-white p-3 rounded">
        <form action="">
            <h3>Add Product / Offer</h3>

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
                            <option 
                                data-content="
                                <div class='d-flex justify-content-between'>
                                    <p>White</p>
                                    <span style='background-color:white'></span>
                                </div>">
                            </option>
                            
                            <option 
                                data-content="
                                <div class='d-flex justify-content-between'>
                                    <p>Red</p>
                                    <span style='background-color:red'></span>
                                </div>">
                            </option>
                            
                            <option 
                                data-content="
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
                        <h5>Frame Material:</h5>
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
                        <h5>Guarantee:</h5>
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
                        <h5>Valid Until:</h5>
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
    </section>
</div>


<?php include 'footer.php'; ?>
