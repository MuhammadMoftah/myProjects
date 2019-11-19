<?php include 'header-ar.php';?>

<!--===== Join Us =====-->
<!--===== Join Us =====-->
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title"><span>POST A JOB</span></h2>
        </div>
    </div>


    <section class="login p-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <form action="" class="form-row">

                        <div class="form-group col-md-6">
                            <label for="jobTitle">Job Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="jobTitle" placeholder="JobTitle">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Categories</label>

                            <select class="form-control p-0">
                                <option>All Categoriesr</option>
                                <option>Development</option>
                                <option>Designing</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Experience</label>

                            <select class="form-control p-0">
                                <option>Experience</option>
                                <option>0-2</option>
                                <option>2-4</option>
                                <option>4-7</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="jobSalary">Salary</label>
                            <input type="text" class="form-control" id="jobSalary" aria-describedby="jobTitle" placeholder="JobTitle">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="jobLocation">Location</label>
                            <input type="text" class="form-control" id="jobLocation" aria-describedby="jobLocation" placeholder="Job Location">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Job Type</label>

                            <select class="form-control p-0">
                                <option>Choose Type</option>
                                <option>Full Time</option>
                                <option>Part Time</option>
                                <option>Freelance</option>
                                <option>Remotely</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">Job Details</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea2">Benefits</label>
                            <textarea class="form-control" id="exampleFormControlTextarea2" rows="4"></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <input class="btn btn-success form-group col-md-3" type="submit" value="Post Job">
                            <input class="btn btn-info form-group col-md-3" type="submit" value="Post Later">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
</div>


<?php include 'footer-ar.php';?>
