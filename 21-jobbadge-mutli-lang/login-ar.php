<?php include 'header-ar.php';?>

<!--===== Join Us =====-->
<!--===== Join Us =====-->
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title"><span>Sign in</span></h2>
        </div>
    </div>

    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <form action="">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            <a href="forget-pass.php"><small id="emailHelp" class="form-text text-muted">Forgot your Password?</small></a>
                        </div>

                        <div class="custom-control custom-checkbox form-group px-4">
                            <input type="checkbox" class="custom-control-input form-check-label checkt" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                        </div>

                        <input class="btn btn-info form-control" type="submit" value="Login">
                    </form>

                    <div class="col-12 pb-4">
                        <h4>OR SIGN UP WITH</h4>
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
</div>


<?php include 'footer-ar.php';?>
