<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Roboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/datepicker.min.css">
    <link rel="stylesheet" href="css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>JobBadge</title>
</head>

<body>
    <!--===== NavBar =====-->
    <header class="container-header">
        <div class="container">
            <div class="row no-gutters align-items-center">
                <div class="col-4 col-md-1 col-xl-2">
                    <div class="header-logo">
                        <h1>
                            <a href="home.html" class="logo-link">
                                <img src="images/logo/logo.png" alt="">
                                <!--<span>JOBADGE</span>-->
                            </a>
                        </h1>
                    </div>
                </div>
                <div class="col-8 col-md-11 col-xl-10 text-right">
                    <nav class="header-nav">
                        <ul>
                            <li><a href="index.php" class="header-nav-link">HOME</a></li>
                            <li><a href="companies.php" class="header-nav-link">TOP COMPANIES</a></li>
                            <li><a href="all-jobs.php" class="header-nav-link">RECENT JOBS</a></li>
                            <li><a href="join-us.php" class="header-nav-link">JOIN US</a></li>
                            <li><a href="indexx-ar.php" class="header-nav-link">AR</a></li>
                        </ul>
                    </nav>
                    <div class="dropdown d-inline-block notifcation mr-3">
                        <span class="badge badge-danger">4</span>
                        <button class="btn bg-transparent p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe-asia"></i></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item text-success py-2" href="#">You are Accepted</a>
                            <a class="dropdown-item text-danger py-2" href="#">You are Rejected</a>
                            <a class="dropdown-item text-warning py-2" href="#">You Are Shortlisted</a>
                            <a class="dropdown-item text-muted py-2" href="#">You have an interview</a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block notifcation mr-3">
                        <img src="images/customer/customer1.jpg" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <p class="text-center border-bottom pb-2 mb-0">Muhammad Moftah</p>
                            <a class="dropdown-item text-muted py-2" href="#">AnyLink</a>
                            <a class="dropdown-item text-muted py-2" href="#">AnyLink</a>
                            <a class="dropdown-item text-muted py-2" href="#">AnyLink</a>
                            <a class="dropdown-item text-muted py-2 border-top" href="#"> <i class="fas fa-cog"></i> Setting</a>
                            <a class="dropdown-item text-muted py-2 " href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </div>

                    <a href="post-job.php" class="header-link-action"><span>POST A JOB</span></a>

                    <span class="icon icon-menu menu-mobile"></span>
                </div>
            </div>
        </div>
    </header>
