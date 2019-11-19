<?php include 'header-ar.php'; ?>

<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <form action="">
                    <div class="form-title">
                        <div class="title">
                            <h1>دخول</h1>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">البريد الاكترونى</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الاكترونى">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">كلمة المرور</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        <a href="forget-pass.php"><small id="emailHelp" class="form-text text-muted">كلمة المرور؟</small></a>
                    </div>

                    <div class="custom-control custom-checkbox form-group">
                        <input type="checkbox" class="custom-control-input form-check-label checkt" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">تذكرنى</label>
                    </div>

                    <input class="btn btn-primary form-control" type="submit" value="دخـــــول">
                </form>

                <div class="col-12 pb-4">
                    <h4>او ادخل بــ</h4>
                </div>
                
                <div class="text-center social-login pb-5">
                    <a class="facebook">
                        <fa name="facebook"><i aria-hidden="true" class="fab fa-facebook-f"></i></fa>
                    </a>
                    <a class="google">
                        <fa name="google"><i aria-hidden="true" class="fab fa-google"></i></fa>
                    </a>
                    <a class="twitter">
                        <fa name="twitter"><i aria-hidden="true" class="fab fa-twitter"></i></fa>
                    </a>
                    <a class="linked">
                        <fa name="linkedin"><i aria-hidden="true" class="fab fa-linkedin-in"></i></fa>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="houses">
    <img src="images/footer.jpg" alt="">
</section>
<?php include 'footer-ar.php'; ?>
