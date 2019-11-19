<?php include 'header.php';?>

<!-- Flickity Slider -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<!--===== Search =====-->
<!--===== Search =====-->
<section class="container-search-job">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <div class="search-job">
                    <h2 class="search-job-title">FIND YOUR <span style="color:#828128">DREAM</span> JOB</h2>

                    <div class="search-job-form">
                        <form action="" method="get">
                            <div class="row no-gutters">
                                <div class="col-12 col-md-4">
                                    <div class="search-job-form-field first">
                                        <label for="searchJob" class="search-job-form-field-label"><span class="icon icon-search"></span></label>
                                        <input type="text" id="searchJob" class="search-job-form-field" placeholder="eg. WEB DESIGNER">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="search-job-form-field">
                                        <label for="searchCat" class="search-job-form-field-label"><span class="icon icon-tag-black-shape"></span></label>
                                        <select name="" id="searchCat" class="search-job-form-field">
                                            <option value="0">ALL CATEGORIES
                                            <option value="0">Web
                                            <option value="0">Application
                                            <option value="0">AR
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="search-job-form-field">
                                        <label for="searchWhere" class="search-job-form-field-label"><span class="icon icon-pin"></span></label>
                                        <input type="text" id="searchWhere" class="search-job-form-field" placeholder="ANYWHERE">
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <button type="submit" class="search-job-form-button">SEARCH JOBS</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <h3 class="search-job-title-new-job"><span>196</span> new jobs in the last <span>7</span> days</h3>

                    <div class="row">
                        <div class="col-6 col-md-3">
                            <div class="search-job-statistics">
                                <div class="text">REMOTE</div>
                                <div class="num counter">112</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="search-job-statistics">
                                <div class="text">PART-TIME</div>
                                <div class="num counter">43</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="search-job-statistics">
                                <div class="text">FREELANCE</div>
                                <div class="num counter">78</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="search-job-statistics">
                                <div class="text">FULLTIME</div>
                                <div class="num counter">319</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jobs Categories -->
<div class="container-jobs-category">
    <div class="container">
        <h3 class="section-title">JOBS BY <span>CATEGORY</span></h3>
        <div class="jobs-category-carousel owl-carousel">
            <div class="item">
                <a href="all-jobs.php" class="item-link">
                    <div class="item-img">
                        <span class="icofont-dashboard-web"></span>
                    </div>
                    <h4 class="item-title">ACCOUNTING</h4>
                </a>
            </div>
            <div class="item">
                <a href="all-jobs.php" class="item-link">
                    <div class="item-img">
                        <span class="icofont-life-bouy"></span>
                    </div>
                    <h4 class="item-title">CUSTOMER SERVICE</h4>
                </a>
            </div>
            <div class="item">
                <a href="all-jobs.php" class="item-link">
                    <div class="item-img">
                        <span class="icofont-lens"></span>
                    </div>
                    <h4 class="item-title">GRAPHIC DESIGN</h4>
                </a>
            </div>
            <div class="item">
                <a href="all-jobs.php" class="item-link">
                    <div class="item-img">
                        <span class="icofont-money-bag"></span>
                    </div>
                    <h4 class="item-title">FINANCIAL SERVICE</h4>
                </a>
            </div>
            <div class="item">
                <a href="all-jobs.php" class="item-link">
                    <div class="item-img">
                        <span class="icofont-brain-alt"></span>
                    </div>
                    <h4 class="item-title">AI DEVELOPER</h4>
                </a>
            </div>
            <div class="item">
                <a href="all-jobs.php" class="item-link">
                    <div class="item-img">
                        <span class="icofont-dashboard-web"></span>
                    </div>
                    <h4 class="item-title">ACCOUNTING2</h4>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Jobs Listing -->
<div class="container-post-jobs">
    <div class="container">
        <h3 id="recent-jobs" class="section-title">RECENTLY POSTED <span>JOBS</span></h3>

        <div class="post-jobs-filter">
            <div class="row no-gutters align-items-center">
                <div class="col-8 col-md-6 col-xl-4">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-6">
                            <div class="post-jobs-filter-select first">
                                <div class="select-title">JOB TYPES</div>
                                <div class="select-value">
                                    <select name="" class="select-field">
                                        <option value="1">Show All
                                        <option value="2">Web Development
                                        <option value="3">Mobile Application
                                    </select>
                                </div>
                                <span class="icon icon-down"></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="post-jobs-filter-select">
                                <div class="select-title">SORT BY</div>
                                <div class="select-value">
                                    <select name="" class="select-field">
                                        <option value="1">Most Recent
                                        <option value="2">Oldest
                                        <option value="3">Last Week
                                        <option value="4">Last Month
                                    </select>
                                </div>
                                <span class="icon icon-down"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-md-6 col-xl-8 text-right">
                    <div class="post-jobs-filter-view-list">
                        <a href="#" class="view-list-type active" data-list-type="list"><span class="icon icon-view-list"></span></a>
                        <a href="#" class="view-list-type" data-list-type="grid"><span class="icon icon-nine-squares"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="post-job-list-view">
            <div class="list-view-item">
                <div class="row align-items-center no-gutters">

                    <div class="col-12 col-md-5 col-xl-7">
                        <div class="item-post-job">
                            <img src="images\logo\logo4.png" alt="" class="item-logo">
                            <div class="item-post">
                                <h4 class="post-name"><a href="job-details.php">Front End Developer</a></h4>
                                <span class="post-date">2 days ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <div class="item-position">
                                    <span class="icon icon-pin"></span>
                                    <span class="position-text">LONDON, LONDON</span>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="item-time-type">
                                    <span class="icon icon-tag-black-shape"></span>
                                    <span class="type-text">FULL TIME</span>
                                </div>
                            </div>

                            <div class="col-12 col-md-3 text-sm-center text-md-right">
                                <a href="job.html" class="button-outline"><span>APPLY</span></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="list-view-item">
                <div class="row align-items-center no-gutters">
                    <div class="col-12 col-md-5 col-xl-7">
                        <div class="item-post-job">
                            <img src="images\logo\logo5.png" alt="" class="item-logo">
                            <div class="item-post">
                                <h4 class="post-name"><a href="job-details.php">Backend Developer / PHP and Mysql</a></h4>
                                <span class=" post-date">4 days ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <div class="item-position">
                                    <span class="icon icon-pin"></span>
                                    <span class="position-text">MILAN, ITALY</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="item-time-type">
                                    <span class="icon icon-tag-black-shape"></span>
                                    <span class="type-text">FULL TIME</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 text-sm-center text-md-right">
                                <a href="job.html" class="button-outline"><span>APPLY</span></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="list-view-item">
                <div class="row align-items-center no-gutters">

                    <div class="col-12 col-md-5 col-xl-7">
                        <div class="item-post-job">
                            <img src="images\logo\logo3.png" alt="" class="item-logo">
                            <div class="item-post">
                                <h4 class="post-name"><a href="job-details.php">Senior UX/UI Designer</a></h4>
                                <span class="post-date">5 days ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <div class="item-position">
                                    <span class="icon icon-pin"></span>
                                    <span class="position-text">SAN FRANCISCO, CA</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="item-time-type">
                                    <span class="icon icon-tag-black-shape"></span>
                                    <span class="type-text">FULL TIME</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 text-sm-center text-md-right">
                                <a href="job.html" class="button-outline"><span>APPLY</span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="list-view-item">
                <div class="row align-items-center no-gutters">
                    <div class="col-12 col-md-5 col-xl-7">
                        <div class="item-post-job">
                            <img src="images\logo\logo2.png" alt="" class="item-logo">
                            <div class="item-post">
                                <h4 class="post-name"><a href="job-details.php">Blockchain researcher</a></h4>
                                <span class=" post-date">2 days ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <div class="item-position">
                                    <span class="icon icon-pin"></span>
                                    <span class="position-text">BUENOS AIRES, BA</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="item-time-type">
                                    <span class="icon icon-tag-black-shape"></span>
                                    <span class="type-text">FULL TIME</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 text-sm-center text-md-right">
                                <a href="job.html" class="button-outline"><span>APPLY</span></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="list-view-item">
                <div class="row align-items-center no-gutters">
                    <div class="col-12 col-md-5 col-xl-7">
                        <div class="item-post-job">
                            <img src="images\logo\logo1.png" alt="" class="item-logo">
                            <div class="item-post">
                                <h4 class="post-name"><a href="job-details.php">Front End Developer - WordPress</a></h4>
                                <span class="post-date">2 days ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <div class="item-position">
                                    <span class="icon icon-pin"></span>
                                    <span class="position-text">BOSTON, MA</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="item-time-type">
                                    <span class="icon icon-tag-black-shape"></span>
                                    <span class="type-text">FULL TIME</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 text-sm-center text-md-right">
                                <a href="job.html" class="button-outline"><span>APPLY</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-view-item">
                <div class="row align-items-center no-gutters">
                    <div class="col-12 col-md-5 col-xl-7">
                        <div class="item-post-job">
                            <img src="images\logo\logo6.png" alt="" class="item-logo">
                            <div class="item-post">
                                <h4 class="post-name"><a href="job-details.php">IT Help Desk</a></h4>
                                <span class="post-date">2 days ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <div class="item-position">
                                    <span class="icon icon-pin"></span>
                                    <span class="position-text">LEIPZIG, DE</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="item-time-type">
                                    <span class="icon icon-tag-black-shape"></span>
                                    <span class="type-text">FULL TIME</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 text-sm-center text-md-right">
                                <a href="job.html" class="button-outline"><span>APPLY</span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="list-view-item">
                <div class="row align-items-center no-gutters">
                    <div class="col-12 col-md-5 col-xl-7">
                        <div class="item-post-job">
                            <img src="images\logo\logo4.png" alt="" class="item-logo">
                            <div class="item-post">
                                <h4 class="post-name"><a href="job-details.php">Software Engineer - JavaScript</a></h4>
                                <span class=" post-date">2 days ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <div class="item-position">
                                    <span class="icon icon-pin"></span>
                                    <span class="position-text">NEW YORK, NY</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="item-time-type">
                                    <span class="icon icon-tag-black-shape"></span>
                                    <span class="type-text">FULL TIME</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 text-sm-center text-md-right">
                                <a href="job.html" class="button-outline"><span>APPLY</span></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="list-view-item">
                <div class="row align-items-center no-gutters">
                    <div class="col-12 col-md-5 col-xl-7">
                        <div class="item-post-job">
                            <img src="images\logo\logo5.png" alt="" class="item-logo">
                            <div class="item-post">
                                <h4 class="post-name"><a href="job-details.php">Web Developer / WP Developer (custom themes)</a></h4>
                                <span class="post-date">2 days ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <div class="item-position">
                                    <span class="icon icon-pin"></span>
                                    <span class="position-text">MEMPHIS, TN</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="item-time-type">
                                    <span class="icon icon-tag-black-shape"></span>
                                    <span class="type-text">FULL TIME</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 text-sm-center text-md-right">
                                <a href="job.html" class="button-outline"><span>APPLY</span></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="list-view-item">
                <div class="row align-items-center no-gutters">
                    <div class="col-12 col-md-5 col-xl-7">
                        <div class="item-post-job">
                            <img src="images\logo\logo3.png" alt="" class="item-logo">
                            <div class="item-post">
                                <h4 class="post-name"><a href="job-details.php">Product Designer</a></h4>
                                <span class=" post-date">2 days ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <div class="item-position">
                                    <span class="icon icon-pin"></span>
                                    <span class="position-text">REMOTE</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="item-time-type">
                                    <span class="icon icon-tag-black-shape"></span>
                                    <span class="type-text">FULL TIME</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 text-sm-center text-md-right">
                                <a href="job.html" class="button-outline"><span>APPLY</span></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="list-view-item">
                <div class="row align-items-center no-gutters">
                    <div class="col-12 col-md-5 col-xl-7">
                        <div class="item-post-job">
                            <img src="images\logo\logo4.png" alt="" class="item-logo">
                            <div class="item-post">
                                <h4 class="post-name"><a href="job-details.php">PHP Programmer</a></h4>
                                <span class="post-date">2 days ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 col-xl-5">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <div class="item-position">
                                    <span class="icon icon-pin"></span>
                                    <span class="position-text">REMOTE</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="item-time-type">
                                    <span class="icon icon-tag-black-shape"></span>
                                    <span class="type-text">FULL TIME</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 text-sm-center text-md-right">
                                <a href="job.html" class="button-outline"><span>APPLY</span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="post-job-grid-view">
            <div class="row">

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="grid-view-item">
                        <img src="images\logo\logo4.png" alt="" class="item-img">
                        <div class="item-date">2 days ago</div>
                        <h4 class="item-post-title"><a href="job-details.php">Senior UX Manager</a></h4>
                        <h5 class="item-company-name">Envato Element Ltd</h5>
                        <a href="job.html" title="" class="button-outline"><span>DETAILS</span></a>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-7 text-left">
                                <span class="icon icon-pin"></span>
                                <span class="item-position">LONDON, LONDON</span>
                            </div>
                            <div class="col-12 col-md-5 text-left text-md-right">
                                <span class="icon icon-tag-black-shape"></span>
                                <span class="item-time-type">FULL TIME</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="grid-view-item">
                        <img src="images\logo\logo5.png" alt="" class="item-img">
                        <div class="item-date">2 days ago</div>
                        <h4 class="item-post-title"><a href="job-details.php">WordPress Developer</a></h4>
                        <h5 class=" item-company-name">Envato Element Ltd</h5>
                        <a href="job.html" title="" class=" button-outline"><span>APPLY</span></a>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-7 text-left">
                                <span class="icon icon-pin"></span>
                                <span class="item-position">NEW YORK, NY</span>
                            </div>
                            <div class="col-12 col-md-5 text-left text-md-right">
                                <span class="icon icon-tag-black-shape"></span>
                                <span class="item-time-type">FULL TIME</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="grid-view-item">
                        <img src="images\logo\logo3.png" alt="" class="item-img">
                        <div class="item-date">2 days ago</div>
                        <h4 class="item-post-title"><a href="job-details.php">Full Stack Engineer</a></h4>
                        <h5 class="item-company-name">Envato Element Ltd</h5>
                        <a href="job.html" title="" class="button-outline"><span>APPLY</span></a>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-7 text-left">
                                <span class="icon icon-pin"></span>
                                <span class="item-position">REMOTE</span>
                            </div>
                            <div class="col-12 col-md-5 text-left text-md-right">
                                <span class="icon icon-tag-black-shape"></span>
                                <span class="item-time-type">FULL TIME</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="grid-view-item">
                        <img src="images\logo\logo2.png" alt="" class="item-img">
                        <div class="item-date">2 days ago</div>
                        <h4 class="item-post-title"><a href="job-details.php">Front End Developer</a></h4>
                        <h5 class="item-company-name">Envato Element Ltd</h5>
                        <a href="#" title="" class="button-outline"><span>DETAILS</span></a>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-7 text-left">
                                <span class="icon icon-pin"></span>
                                <span class="item-position">BERLIN, GERMANY</span>
                            </div>
                            <div class="col-12 col-md-5 text-left text-md-right">
                                <span class="icon icon-tag-black-shape"></span>
                                <span class="item-time-type">FULL TIME</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="grid-view-item">
                        <img src="images\logo\logo1.png" alt="" class="item-img">
                        <div class="item-date">2 days ago</div>
                        <h4 class="item-post-title"><a href="job-details.php">HTML/CSS Specialist</a></h4>
                        <h5 class="item-company-name">Envato Element Ltd</h5>
                        <a href="job.html" title="" class="button-outline"><span>APPLY</span></a>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-7 text-left">
                                <span class="icon icon-pin"></span>
                                <span class="item-position">TOKYO, JAPAN</span>
                            </div>
                            <div class="col-12 col-md-5 text-left text-md-right">
                                <span class="icon icon-tag-black-shape"></span>
                                <span class="item-time-type">FULL TIME</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="grid-view-item">
                        <img src="images\logo\logo6.png" alt="" class="item-img">
                        <div class="item-date">2 days ago</div>
                        <h4 class="item-post-title"><a href="job-details.php">Support Engineer</a></h4>
                        <h5 class="item-company-name">Envato Element Ltd</h5>
                        <a href="job.html" title="" class="button-outline"><span>DETAILS</span></a>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-7 text-left">
                                <span class="icon icon-pin"></span>
                                <span class="item-position">BOSTON, MA</span>
                            </div>
                            <div class="col-12 col-md-5 text-left text-md-right">
                                <span class="icon icon-tag-black-shape"></span>
                                <span class="item-time-type">FULL TIME</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="grid-view-item">
                        <img src="images\logo\logo4.png" alt="" class="item-img">
                        <div class="item-date">2 days ago</div>
                        <h4 class="item-post-title"><a href="job-details.php">Account Manager</a></h4>
                        <h5 class="item-company-name">Envato Element Ltd</h5>
                        <a href="job.html" title="" class="button-outline"><span>DETAILS</span></a>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-7 text-left">
                                <span class="icon icon-pin"></span>
                                <span class="item-position">LONDON, LONDON</span>
                            </div>
                            <div class="col-12 col-md-5 text-left text-md-right">
                                <span class="icon icon-tag-black-shape"></span>
                                <span class="item-time-type">FULL TIME</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="grid-view-item">
                        <img src="images\logo\logo5.png" alt="" class="item-img">
                        <div class="item-date">2 days ago</div>
                        <h4 class="item-post-title"><a href="job-details.php">Product Designer</a></h4>
                        <h5 class="item-company-name">Envato Element Ltd</h5>
                        <a href="job.html" title="" class="button-outline"><span>DETAILS</span></a>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-7 text-left">
                                <span class="icon icon-pin"></span>
                                <span class="item-position">REMOTE</span>
                            </div>
                            <div class="col-12 col-md-5 text-left text-md-right">
                                <span class="icon icon-tag-black-shape"></span>
                                <span class="item-time-type">FULL TIME</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="grid-view-item">
                        <img src="images\logo\logo3.png" alt="" class="item-img">
                        <div class="item-date">2 days ago</div>
                        <h4 class="item-post-title"><a href="job-details.php">System Engineer</a></h4>
                        <h5 class="item-company-name">Envato Element Ltd</h5>
                        <a href="job.html" title="" class="button-outline"><span>APPLY</span></a>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-7 text-left">
                                <span class="icon icon-pin"></span>
                                <span class="item-position">WASHINGTON, DC</span>
                            </div>
                            <div class="col-12 col-md-5 text-left text-md-right">
                                <span class="icon icon-tag-black-shape"></span>
                                <span class="item-time-type">FULL TIME</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-4 text-center">
                <a href="all-jobs.php" class="button-fill post-job-more">VIEW ALL OPEN JOBS</a>
            </div>
        </div>

    </div>
</div>

<!-- Companies -->
<div class="container-awesome-company">
    <div class="container">
        <h3 class="section-title">AWESOME <span>COMPANIES</span> TO WORK FOR</h3>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="awesome-company">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-7">
                            <div class="awesome-company-img" data-image="./images/blog/blog1.jpg">
                                <img src="images\blog\blog1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="awesome-company-detail">
                                <img src="images\logo\logo1.png" alt="" class="detail-img">
                                <h4 class="detail-job-title"><a href="#">GRAPHIC RIVER</a></h4>
                                <div class="detail-position">United States, Los Angeles</div>
                                <div class="detail-like">
                                    <span class="like-text">98</span>
                                    <span class="icon icon-hearts"></span>
                                </div>
                                <a href="#" title="" class="button-outline"><span>3 open positions</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="awesome-company">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-7">
                            <div class="awesome-company-img" data-image="./images/blog/blog5.jpg">
                                <img src="images\blog\blog5.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="awesome-company-detail">
                                <img src="images\logo\logo5.png" alt="" class="detail-img">
                                <h4 class="detail-job-title"><a href="#">ENVATO LTD</a></h4>
                                <div class="detail-position">United States, Los Angeles</div>
                                <div class="detail-like">
                                    <span class="like-text">11</span>
                                    <span class="icon icon-hearts"></span>
                                </div>
                                <a href="#" title="" class="button-outline"><span>2 open positions</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="awesome-company">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-7">
                            <div class="awesome-company-img" data-image="./images/blog/blog3.jpg">
                                <img src="images\blog\blog3.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="awesome-company-detail">
                                <img src="images\logo\logo2.png" alt="" class="detail-img">
                                <h4 class="detail-job-title"><a href="#">WEBTAMIN LLC</a></h4>
                                <div class="detail-position">United States, Los Angeles</div>
                                <div class="detail-like">
                                    <span class="like-text">98</span>
                                    <span class="icon icon-hearts"></span>
                                </div>
                                <a href="#" title="" class="button-outline"><span>5 open positions</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="awesome-company">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-7">
                            <div class="awesome-company-img" data-image="./images/blog/blog8.jpg">
                                <img src="images\blog\blog8.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="awesome-company-detail">
                                <img src="images\logo\logo3.png" alt="" class="detail-img">
                                <h4 class="detail-job-title"><a href="#">THEMEFOREST</a></h4>
                                <div class="detail-position">United States, Los Angeles</div>
                                <div class="detail-like">
                                    <span class="like-text">11</span>
                                    <span class="icon icon-hearts"></span>
                                </div>
                                <a href="#" title="" class="button-outline"><span>1 open positions</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-4 text-center">
                <a href="#" class="button-fill awesome-company-more">VIEW ALL COMPANIES</a>
            </div>
        </div>
    </div>
</div>

<!-- Services -->
<div class="container-our-service">
    <div class="container">
        <div class="section-header">
            <h3 class="section-title">OUR <span>SERVICES</span></h3>
            <p class="section-desc">Here is the list of services our expertiese offer to you to keep you at the top of your industry.</p>
        </div>

        <div class="our-service-carousel owl-carousel">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-binoculars"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">INSTALLATION</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-earth"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">RENT PRODUCTS</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-fire-burn"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">CLEANING</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-learn"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">CONCEPT AND DESIGN</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-binoculars"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">INSTALLATION</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-earth"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">RENT PRODUCTS</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-fire-burn"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">CLEANING</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="item-icon">
                            <span class="icofont-learn"></span>
                        </div>
                        <div class="item-content">
                            <h5 class="content-title">CONCEPT AND DESIGN</h5>
                            <p class="content-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quismagnam aliquam quaerat voluptatem.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials -->
<div class="container-our-testimonials">
    <div class="container">
        <div class="section-header">
            <h3 class="section-title">OUR <span>TESTIMONIALS</span></h3>
            <p class="section-desc">Check out what our clients have said about us. Don’t take our word for it!</p>
        </div>
        <div class="our-testimonials-carousel owl-carousel">
            <div class="item">
                <h5 class="item-title">I really love it</h5>
                <p class="item-desc">
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit amet tellus blandit.
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit am et tellus blandit.
                    Etiam nec odio vestibul. Etiam n
                </p>
                <div class="item-avatar">
                    <img src="images\customer\customer1.jpg" alt="">
                </div>
                <div class="item-name">
                    <span class="name">Julia Smith</span>
                    <span class="post">, Customer</span>
                </div>
            </div>
            <div class="item">
                <h5 class="item-title">Top notch support, always</h5>
                <p class="item-desc">
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit amet tellus blandit.
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.
                    Etiam nec odio vestibulum est mat tis effic iturut magna.
                </p>
                <div class="item-avatar">
                    <img src="images\customer\customer3.jpg" alt="">
                </div>
                <div class="item-name">
                    <span class="name">Alex Smith</span>
                    <span class="post">, Customer</span>
                </div>
            </div>
            <div class="item">
                <h5 class="item-title">The best pack out there</h5>
                <p class="item-desc">
                    Ct amet tellus blandit.
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit am et tellus blandit.
                    Etiam nec odio vestibul.
                    Etiam nec odio vestibulum est mat tis effic iturut magna.
                </p>
                <div class="item-avatar">
                    <img src="images\customer\customer2.jpg" alt="">
                </div>
                <div class="item-name">
                    <span class="name">Roberto Smith</span>
                    <span class="post">, Customer</span>
                </div>
            </div>
            <div class="item">
                <h5 class="item-title">I really love it</h5>
                <p class="item-desc">
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit amet tellus blandit.
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit am et tellus blandit.
                    Etiam nec odio vestibul. Etiam n
                </p>
                <div class="item-avatar">
                    <img src="images\customer\customer1.jpg" alt="">
                </div>
                <div class="item-name">
                    <span class="name">Julia Smith</span>
                    <span class="post">, Customer</span>
                </div>
            </div>
            <div class="item">
                <h5 class="item-title">Top notch support, always</h5>
                <p class="item-desc">
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit amet tellus blandit.
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.
                    Etiam nec odio vestibulum est mat tis effic iturut magna.
                </p>
                <div class="item-avatar">
                    <img src="images\customer\customer3.jpg" alt="">
                </div>
                <div class="item-name">
                    <span class="name">Alex Smith</span>
                    <span class="post">, Customer</span>
                </div>
            </div>
            <div class="item">
                <h5 class="item-title">The best pack out there</h5>
                <p class="item-desc">
                    Ct amet tellus blandit.
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit am et tellus blandit.
                    Etiam nec odio vestibul.
                    Etiam nec odio vestibulum est mat tis effic iturut magna.
                </p>
                <div class="item-avatar">
                    <img src="images\customer\customer2.jpg" alt="">
                </div>
                <div class="item-name">
                    <span class="name">Roberto Smith</span>
                    <span class="post">, Customer</span>
                </div>
            </div>
            <div class="item">
                <h5 class="item-title">I really love it</h5>
                <p class="item-desc">
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit amet tellus blandit.
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit am et tellus blandit.
                    Etiam nec odio vestibul. Etiam n
                </p>
                <div class="item-avatar">
                    <img src="images\customer\customer1.jpg" alt="">
                </div>
                <div class="item-name">
                    <span class="name">Julia Smith</span>
                    <span class="post">, Customer</span>
                </div>
            </div>
            <div class="item">
                <h5 class="item-title">Top notch support, always</h5>
                <p class="item-desc">
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit amet tellus blandit.
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.
                    Etiam nec odio vestibulum est mat tis effic iturut magna.
                </p>
                <div class="item-avatar">
                    <img src="images\customer\customer3.jpg" alt="">
                </div>
                <div class="item-name">
                    <span class="name">Alex Smith</span>
                    <span class="post">, Customer</span>
                </div>
            </div>
            <div class="item">
                <h5 class="item-title">The best pack out there</h5>
                <p class="item-desc">
                    Ct amet tellus blandit.
                    Etiam nec odio vestibulum est mattis effic iturut magna.
                    Pellentesque sit am et tellus blandit.
                    Etiam nec odio vestibul.
                    Etiam nec odio vestibulum est mat tis effic iturut magna.
                </p>
                <div class="item-avatar">
                    <img src="images\customer\customer2.jpg" alt="">
                </div>
                <div class="item-name">
                    <span class="name">Roberto Smith</span>
                    <span class="post">, Customer</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!--    ===== Recent Posts ======-->
<!--    ===== Recent Posts ======-->
<!--
<div class="container-our-blog">
    <div class="container">
        <h3 class="section-title">OUR <span>BLOG</span></h3>
        <div class="our-blog-carousel owl-carousel">
            <div class="item">
                <div class="item-img">
                    <img src="images\blog\blog4.jpg" alt="">
                </div>
                <div class="item-content-wrapper">
                    <div class="item-content">
                        <h3 class="item-title"><a href="#">How to make an effective resume in two minutes</a></h3>
                        <p class="item-desc">
                            In this post, we are going to talk about
                            how to make a great resume...
                        </p>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-8">
                            <a href="blog.html" class="button-fill-gray">READ MORE</a>
                        </div>
                        <div class="col-4 text-right">
                            <div class="item-like">
                                <span class="item-num">36</span>
                                <span class="icon icon-hearts"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-img">
                    <img src="images\blog\blog11.jpg" alt="">
                </div>
                <div class="item-content-wrapper">
                    <div class="item-content">
                        <h3 class="item-title"><a href="#">Top 10 tips to apply like a professional</a></h3>
                        <p class="item-desc">
                            In this post, we are going to talk about
                            how to make a great resume...
                        </p>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-8">
                            <a href="blog.html" class="button-fill-gray">READ MORE</a>
                        </div>
                        <div class="col-4 text-right">
                            <div class="item-like">
                                <span class="item-num">98</span>
                                <span class="icon icon-hearts"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-img">
                    <img src="images\blog\blog9.jpg" alt="">
                </div>
                <div class="item-content-wrapper">
                    <div class="item-content">
                        <h3 class="item-title"><a href="#">How to hire the best web developers by posting to job boards</a></h3>
                        <p class="item-desc">
                            In this post, we are going to talk about
                            how to make a great resume...
                        </p>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-8">
                            <a href="blog.html" class="button-fill-gray">READ MORE</a>
                        </div>
                        <div class="col-4 text-right">
                            <div class="item-like">
                                <span class="item-num">98</span>
                                <span class="icon icon-hearts"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-img">
                    <img src="images\blog\blog4.jpg" alt="">
                </div>
                <div class="item-content-wrapper">
                    <div class="item-content">
                        <h3 class="item-title"><a href="#">How to make an effective resume in two minutes</a></h3>
                        <p class="item-desc">
                            In this post, we are going to talk about
                            how to make a great resume...
                        </p>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-8">
                            <a href="blog.html" class="button-fill-gray">READ MORE</a>
                        </div>
                        <div class="col-4 text-right">
                            <div class="item-like">
                                <span class="item-num">36</span>
                                <span class="icon icon-hearts"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-img">
                    <img src="images\blog\blog11.jpg" alt="">
                </div>
                <div class="item-content-wrapper">
                    <div class="item-content">
                        <h3 class="item-title"><a href="#">Top 10 tips to apply like a professional</a></h3>
                        <p class="item-desc">
                            In this post, we are going to talk about
                            how to make a great resume...
                        </p>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-8">
                            <a href="blog.html" class="button-fill-gray">READ MORE</a>
                        </div>
                        <div class="col-4 text-right">
                            <div class="item-like">
                                <span class="item-num">98</span>
                                <span class="icon icon-hearts"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-img">
                    <img src="images\blog\blog9.jpg" alt="">
                </div>
                <div class="item-content-wrapper">
                    <div class="item-content">
                        <h3 class="item-title"><a href="#">How to hire the best web developers by posting to job boards</a></h3>
                        <p class="item-desc">
                            In this post, we are going to talk about
                            how to make a great resume...
                        </p>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-8">
                            <a href="blog.html" class="button-fill-gray">READ MORE</a>
                        </div>
                        <div class="col-4 text-right">
                            <div class="item-like">
                                <span class="item-num">98</span>
                                <span class="icon icon-hearts"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 col-xl-4 offset-xl-4 text-center">
                <a href="#" class="button-fill our-blog-more">VIEW ALL POSTS</a>
            </div>
        </div>
    </div>
</div>
-->

<!-- Partners' Logos -->
<div class="container-our-partner">
    <div class="container">
        <h3 class="section-title">OUR <span>PARTNERS</span></h3>
        <div class="row justify-content-center align-items-center">
            <div class="col-4 col-md-2 text-center">
                <a href="#" title="" class="our-partner-logo">
                    <img src="images\logo\logo7.png" alt="">
                </a>
            </div>
            <div class="col-4 col-md-2 text-center">
                <a href="#" title="" class="our-partner-logo">
                    <img src="images\logo\logo8.png" alt="">
                </a>
            </div>
            <div class="col-4 col-md-2 text-center">
                <a href="#" title="" class="our-partner-logo">
                    <img src="images\logo\logo9.png" alt="">
                </a>
            </div>
            <div class="col-4 col-md-2 text-center">
                <a href="#" title="" class="our-partner-logo">
                    <img src="images\logo\logo10.png" alt="">
                </a>
            </div>
            <div class="col-4 col-md-2 text-center">
                <a href="#" title="" class="our-partner-logo">
                    <img src="images\logo\logo11.png" alt="">
                </a>
            </div>
        </div>
    </div>
</div>


<!-- Partners New Logos -->
<div class="container-new-partner">
    <div class="container">
        <h3 class="section-title">OUR <span>PARTNERS</span></h3>
        <!-- Flickity HTML init -->
        <div class="carousel" data-flickity='{ "wrapAround": true, "pageDots": false, "cellAlign": "left", "contain": true}'>
            <div class="carousel-cell" style="background-image: url(./images/logo/logo7.png);"></div>
            <div class="carousel-cell" style="background-image: url(./images/logo/logo8.png);"></div>
            <div class="carousel-cell" style="background-image: url(./images/logo/logo9.png);"></div>
            <div class="carousel-cell" style="background-image: url(./images/logo/logo10.png);"></div>
            <div class="carousel-cell" style="background-image: url(./images/logo/logo11.png);"></div>
            <div class="carousel-cell" style="background-image: url(./images/logo/logo7.png);"></div>
            <div class="carousel-cell" style="background-image: url(./images/logo/logo8.png);"></div>
            <div class="carousel-cell" style="background-image: url(./images/logo/logo9.png);"></div>
            <div class="carousel-cell" style="background-image: url(./images/logo/logo10.png);"></div>
            <div class="carousel-cell" style="background-image: url(./images/logo/logo11.png);"></div>
        </div>
    </div>
</div>



<?php include 'footer.php';?>
<!-- flickity Slider -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
