<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Theme</title>
</head>

<body>


    <header>
        <!--===== NavBar =====-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white ">
            <div class="container">
                <a class="navbar-brand p-0" href="indexx.php"><img src="images/main-logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--===After Login===-->

                <!--
                <div class="collapse navbar-collapse justify-content-end " id="navbarNavAltMarkup">

                    <div class="navbar-nav">
                        <form class="form-inline nav-search">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn  my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                        <a class="nav-item nav-link  text-center" href="#">
                            <img src="icons/investors.png" alt="">
                            <p class="small">My inverstors</p>
                        </a>
                        <a class="nav-item nav-link text-center" href="#">
                            <img src="icons/idea.png" alt="">
                            <p class="small">My ideas</p>
                        </a>
                        <a class="nav-item nav-link text-center" href="#">
                            <img src="icons/messages.png" width="40px" alt="">
                            <p class="small">Message</p>
                        </a>
                        <a class="nav-item nav-link text-center" href="#">
                            <img src="images/user1.jpg" class="rounded-circle" alt="">
                            <p class="small">Profile</p>
                        </a>

                    </div>
                </div>
-->

                <!--=== Before Login ===-->
                <div class="collapse navbar-collapse justify-content-end " id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <button href="" class="btn btn-main2 m-1" data-toggle="modal" data-target="#LoginModal">Login</button>
                        <button href="" class="btn btn-main2 m-1" data-toggle="modal" data-target="#RegModal">Sign up</button>
                    </div>
                </div>

            </div>
        </nav>
    </header>



    <!-- Login Modal -->
    <!-- Login Modal -->
    <div class="modal fade" id="LoginModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="email2">Email address:</label>
                            <input type="email" class="form-control" id="email2">
                        </div>
                        <div class="form-group">
                            <label for="pwd1">Password:</label>
                            <input type="password" class="form-control" id="pwd1">
                            <a class="text-muted small link-main1 mt-2" data-toggle="modal" data-target="#ForgetModal" href="" data-dismiss="modal">Forget Your Password? </a>
                        </div>
                        <button type="submit" class="btn btn-main1 mr-2 rounded">Login</button>
                        <button type="submi" class="btn btn-danger mr-2">Close</button>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- Register Modal -->
    <!-- Register Modal -->
    <div class="modal fade" id="RegModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create a New Account</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" class="form-row">
                        <div class="form-group col-6">
                            <label for="fname">First Name:</label>
                            <input type="text" class="form-control" id="fname">
                        </div>
                        <div class="form-group col-6">
                            <label for="lname">Last Name:</label>
                            <input type="text" class="form-control" id="lname">
                        </div>
                        <div class="form-group col-12">
                            <label for="email3">Email address:</label>
                            <input type="email" class="form-control" id="email3">
                        </div>
                        <div class="form-group col-12">
                            <label for="pwd2">Password:</label>
                            <input type="password" class="form-control" id="pwd2">
                        </div>
                        <div class="form-group col-12">
                            <label for="pwd3">Confirm Password:</label>
                            <input type="password" class="form-control" id="pwd3">
                        </div>

                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-main1 mr-2 rounded">Create Account</button>
                            <button type="submit" class="btn btn-danger mr-2">Close</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    
    
    <!-- Forget Password Modal -->
    <!-- Forget Password  Modal -->
    <div class="modal fade" id="ForgetModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Restore Your Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" class="form-row">
                        <div class="form-group col-12">
                            <label for="email1">Email address:</label>
                            <input type="email" class="form-control" id="email1">
                        </div>

                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-main1 mr-2 rounded">Restore Password</button>
                            <button type="submit" class="btn btn-danger mr-2">Close</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
