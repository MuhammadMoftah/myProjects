<?php include 'header.php'; ?>




<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <form action="">
                    <div class="form-title">
                        <div class="title">
                            <h1>Sign up</h1>
                        </div>
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleInputName">Username</label>
                        <input type="name" class="form-control" id="exampleInputName" placeholder="Enter you Username">
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control is-valid mb-2" id="exampleInputPassword1" placeholder="Password">
                        <div class="valid-feedback mb-3">
                            Strong Password !
                        </div>
                        <input type="password" class="form-control is-invalid" id="exampleInputPassword2" placeholder="Conform Password">
                        <div class="invalid-feedback mb-3">
                            invalid Password !
                        </div>
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s">
                        <select class="form-control p-0">
                            <option>Gendar</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>


                    <div class="custom-control custom-checkbox mb-3 was-validated wow fadeInUp" data-wow-duration="1s">
                        <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                        <label class="custom-control-label" for="customControlValidation1">I have read <a href="terms.php" class="text-primary">Terms & Conditions </a></label>
                        <div class="invalid-feedback">Example invalid feedback text</div>
                    </div>


                    <input class="btn btn-primary form-control mt-3 wow fadeInUp" data-wow-duration="1s" type="submit" value="Join us">
                </form>

            </div>
        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="images/footer.jpg" alt="">
</section>
<?php include 'footer.php'; ?>
