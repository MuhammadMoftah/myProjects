<?php include 'header.php'; ?>




<section class="company-reg">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <form action="">
                    <div class="form-title">
                        <div class="title text-center">
                            <h1>Company <br> Registraion</h1>
                        </div>
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleCompanyName">Company Name</label>
                        <input type="name" class="form-control" id="exampleCompanyName" placeholder="Company Name">
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleCompanyRegName">Company Registered Name</label>
                        <input type="name" class="form-control" id="exampleCompanyRegName" placeholder="Company Registered Name">
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleFormControlTextarea1">Company description</label>
                        <textarea style="resize:none" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>

                    <div class="col-12 pb-4 mt-5">
                        <h4>Contact Info</h4>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="CRnumber">CR number</label>
                            <input type="text" class="form-control" id="CRnumber" placeholder="CRnumber" required>
                            <div class="invalid-tooltip">
                                Please choose a unique and valid username.
                            </div>
                        </div>

                        <div class="form-group col-md-6 custom-file wow fadeInUp" data-wow-duration="1s" style="height: 90px;"> Upload CR Number
                            <input type="file" class="custom-file-input" id="customFile">
                            <label style="margin-left: 15px;width: 90%;top:32px" class="custom-file-label" for="customFile">Choose file</label>
                        </div>

                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="Phone">Phone number</label>
                            <input type="text" class="form-control" id="Phone" placeholder="Phone" required>
                        </div>

                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="city">City</label>
                            <input type="text" id="city" class="form-control" placeholder="City">
                        </div>
                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="zipCode">Zip Code</label>
                            <input type="text" id="zipCode" class="form-control" placeholder="Zip Code">
                        </div>
                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="Phone">Number of Agents</label>
                            <input type="text" class="form-control" placeholder="Number of Agents">
                        </div>

                        <div class="form-group col-md-6 custom-file wow fadeInUp" data-wow-duration="1s" style="height: 90px;"> Upload Logo
                            <input type="file" class="custom-file-input" id="CRlogo">
                            <label style="margin-left: 15px;width: 90%;top:32px" class="custom-file-label" for="CRlogo">Choose file</label>
                        </div>

                    </div>

                    <div class="custom-control custom-checkbox my-3 was-validated wow fadeInUp" data-wow-duration="1s" style="height: 47px;">
                        <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                        <label class="custom-control-label" for="customControlValidation1">I have read <a href="terms.php" class="text-primary">Terms & Conditions </a></label>
                        <div class="invalid-feedback">You should read Terms & Conditions first</div>
                    </div>
                    <input class="btn btn-primary form-control mt-3 wow fadeInUp" data-wow-duration="1s" type="submit" value="Join as a Company">
                </form>

            </div>
        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="images/footer.jpg" alt="">
</section>
<?php include 'footer.php'; ?>
