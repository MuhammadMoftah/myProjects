<?php include 'header.php';?>

<!--=== Search ===-->
<!--=== Search ===-->
<section class="search container mt-5">
    <form>
        <div class="form-group">
            <input type="text" class="form-control py-4 mb-1" placeholder="What idea you Search for ...">
            <hgroup>
                <select class="form-control w-auto py-0 d-inline-block" name="" id="">
                    <option value="">Location</option>
                    <option value="">One</option>
                    <option value="">Two</option>
                    <option value="">Three</option>
                </select>
                <select class="form-control w-auto py-0 d-inline-block" name="" id="">
                    <option value="">Industry</option>
                    <option value="">One</option>
                    <option value="">Two</option>
                    <option value="">Three</option>
                </select>
                <hgroup class="float-right">
                    <input class="btn btn-main1 rounded" type="submit" value="Search">
                    <button class="btn btn-main1 rounded">Clear</button>
                </hgroup>
            </hgroup>

        </div>

    </form>
</section>

<!--    === Categories ===-->
<!--    === Categories ===-->
<section class="cate container py-5">
    <div class="row">
        <div class="col-lg-4 col-sm-6 my-4">
            <a class="part text-center bg-white py-5 d-block rounded">
                <img src="icons/finance.png" alt="">
                <p class="text-muted">Finance</p>
            </a>
        </div>

        <div class="col-lg-4 col-sm-6 my-4">
            <a class="part text-center bg-white py-5 d-block rounded">
                <img src="icons/technology.png" alt="">
                <p class="text-muted">Tecnology</p>
            </a>
        </div>

        <div class="col-lg-4 col-sm-6 my-4">
            <a class="part text-center bg-white py-5 d-block rounded">
                <img src="icons/energy.png" alt="">
                <p class="text-muted">Energy & Natrual Resourses</p>
            </a>
        </div>

        <div class="col-lg-4 col-sm-6 my-4">
            <a class="part text-center bg-white py-5 d-block rounded">
                <img src="icons/software.png" alt="">
                <p class="text-muted">Software</p>
            </a>
        </div>

        <div class="col-lg-4 col-sm-6 my-4">
            <a class="part text-center bg-white py-5 d-block rounded">
                <img src="icons/property.png" alt="">
                <p class="text-muted">Property</p>
            </a>
        </div>

        <div class="col-lg-4 col-sm-6 my-4">
            <a class="part text-center bg-white py-5 d-block rounded">
                <img src="icons/transportation.png" alt="">
                <p class="text-muted">Transportation</p>
            </a>
        </div>

        <div class="col-lg-4 col-sm-6 my-4">
            <a class="part text-center bg-white py-5 d-block rounded">
                <img src="icons/finance.png" alt="">
                <p class="text-muted">Finance</p>
            </a>
        </div>

        <div class="col-lg-4 col-sm-6 my-4">
            <a class="part text-center bg-white py-5 d-block rounded">
                <img src="icons/technology.png" alt="">
                <p class="text-muted">Tecnology</p>
            </a>
        </div>

        <div class="col-lg-4 col-sm-6 my-4">
            <a class="part text-center bg-white py-5 d-block rounded">
                <img src="icons/energy.png" alt="">
                <p class="text-muted">Energy & Natrual Resourses</p>
            </a>
        </div>

        <div class="col-lg-4 col-sm-6 my-4">
            <a class="part text-center bg-white py-5 d-block rounded">
                <img src="icons/software.png" alt="">
                <p class="text-muted">Software</p>
            </a>
        </div>

        <div class="col-lg-4 col-sm-6 my-4">
            <a class="part text-center bg-white py-5 d-block rounded">
                <img src="icons/property.png" alt="">
                <p class="text-muted">Property</p>
            </a>
        </div>

        <div class="col-lg-4 col-sm-6 my-4">
            <a class="part text-center bg-white py-5 d-block rounded">
                <img src="icons/transportation.png" alt="">
                <p class="text-muted">Transportation</p>
            </a>
        </div>

    </div>
</section>


<!--==== Join us ====-->
<!--==== Join us ====-->
<section class="join-us">
    <div class="container">
        <form class="form-row text-center" action="">
            <div class="col-12">
                <h6 class="h4">Become a member on</h6>
                <h6 class="h2">Excelogica Investment Network</h6>
            </div>
            <hgroup class="col-12">
                <label for="inverstor" class="mx-5 position-relative">
                    I'm an Investor
                    <input type="radio" id="inverstor" name="join-as" value="">
                    <span></span>
                </label>
                <label for="entrepreneur" class="mx-5 position-relative">
                    I'm an Entrepreneur
                    <input type="radio" id="entrepreneur" name="join-as" value="">
                    <span></span>
                </label>
            </hgroup>

            <div class="col-12 d-block">
                <label class="mx-2">
                    <input class="form-control" type="text" placeholder=" Your Name ">
                </label>
                <label class="mx-2">
                    <input type="email" class="form-control" placeholder=" Your Email ">
                </label>
            </div>
            <div class="col-12">
                <label class="mx-2 d-flex justify-content-center align-items-center py-3">
                    <input type="checkbox" class="form-control mx-2" style="width:18px;">
                    <p>I agree to the website's Privacy Policy & Terms and Conditions</p>
                </label>

                <label for="">
                    <input class="btn btn-main1 rounded" type="submit" value="Create My Account">
                </label>

                <label for="" class="d-block">
                    Already Have An Account? <a href="" class="link-main1">Login</a>
                </label>
            </div>
        </form>
    </div>
</section>










<?php include 'footer.php';?>
