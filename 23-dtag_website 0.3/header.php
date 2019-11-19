<?php
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if($actual_link == "http://localhost/dtag_website0.55/"){
        header('Location: http://localhost/dtag_website0.55/index', true, 301);
        exit();
    }
?>

    <!DOCTYPE html>
    <html>

    <head lang="en">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>موقع ديتاج</title>

        <link rel="icon" type="image/x-icon" href="images/fav.png">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


        <link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
        <link rel="stylesheet" href="css/hover-min.css">
        <link href="css/flaticon.css" rel="stylesheet">

        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>

        <div class="ts-top-bar">
            <div class="top-bar-angle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 hidden-xs"></div>
                        <div class="col-md-4 col-xs-6">
                            <div class="social pull-left">
                                <ul class="list-unstyled">
                                    <a href="https://www.facebook.com/dtagegy" target="_blank">
                                        <li class="fab fa-facebook-f"></li>
                                    </a>
                                    <a href="https://twitter.com/Dtagnet" target="_blank">
                                        <li class="fab fa-twitter"></li>
                                    </a>
                                    <a href="https://plus.google.com/+DTAGNET" target="_blank">
                                        <li class="fab fa-google-plus-g"></li>
                                    </a>
                                    <a href="https://www.instagram.com/dtagnet/" target="_blank">
                                        <li class="fab fa-instagram"></li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="top-bar-event ts-top">
                                <div class="dropdown">
                                    <button class=" dropdown-toggle" type="button" id="about-us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 عربى <i class="fas fa-angle-down"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="about-us">
                                        <a class="dropdown-item" href="en/index"> english</a>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="ts-header header-default">
            <div class="logo bigScreen">
                <img src="images/logo.png">
            </div>
            <div class="header3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="logo">
                                <img src="images/logo.png">
                            </div>
                        </div>
                        <div class="col-md-7 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">

                                    <div class="media">
                                        <i class="mr-3 flaticon flaticon-phone-call"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0">اتصل بنا</h5>
                                            966547017730+
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="media" id="media2">
                                        <i class="mr-3 flaticon flaticon-envelope"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0">راسلنا</h5>
                                            info@d-tag.net
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-angle">
                <nav class="navbar navbar-expand-md navbar-light bg-light">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item hvr-underline-from-right">
                                    <a class="nav-link" href="index">الرئيسية <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item hvr-underline-from-right">
                                    <a class="nav-link" href="services">الخدمات</a>
                                </li>
                                <li class="nav-item hvr-underline-from-right">
                                    <a class="nav-link" href="our-works">أعمالنا</a>
                                </li>
                                <li class="nav-item hvr-underline-from-right">
                                    <a class="nav-link" href="offers">العروض</a>
                                </li>
                                <li class="nav-item hvr-underline-from-right">
                                    <a class="nav-link" href="how_we_work">كيف نعمل</a>
                                </li>
                                <li class="nav-item hvr-underline-from-right">
                                    <a class="nav-link" href="careers">الوظائف</a>
                                </li>
                                <li class="nav-item hvr-underline-from-right">
                                    <a class="nav-link" href="about">من نحن</a>
                                </li>
                                <li class="nav-item hvr-underline-from-right">
                                    <a class="nav-link" href="contact">اتصل بنا</a>
                                </li>


                            </ul>

                        </div>
                    </div>
                </nav>

            </div>

        </div>
