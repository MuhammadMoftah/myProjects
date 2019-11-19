<?php 
include_once 'connect.php';
session_start();
?>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="icons/icon.png" sizes="16x16" type="image/png">
    <title>Ideas2tech</title>
</head>

<body>
<!--==== Header ====-->
<!--==== Header ====-->
<header>
    <div class="container">
        <div class="col-md-2 logo"><a href="index.php"><img src="images/logo.png" alt=""></a></div>
        <div class="col-md-8">
            <h1>We help transform ideas into Technologies! </h1>
            <h4>ِAlways a better way of doing things! </h4>
        </div>
        <div class="social">
            <ul class="list-inline">
                <li>Follow us</li>
                <li><a target="_blank" href="https://www.facebook.com/Ideas2Techs/"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank"  href="https://twitter.com/ideas2tech"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank"  href="https://www.instagram.com/ideas2tech/"><i class="fa fa-instagram"></i></a></li>
                <li><a target="_blank"  href="index.html"><i class="fa fa-youtube"></i></a></li>
                <span><img src="icons/Layer2.png" alt=""></span>
            </ul>
        </div>
    </div>
</header>


<!--===== NavBar =====-->
<!--===== NavBar =====-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="about-us.php">About Us</a></li>
        <li><a href="projects.php">Our Projects</a></li>
        <li><a href="services.php">Services</a></li>
        <li class="dropdown" id="order">
        <a class="dropdown-toggle"  href="#">Order
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="plans.php">New Order</a></li>
        <?php if(isset($_SESSION['username'])){ ?>
              <li><a href="#">Track Your Order</a></li><?php } ?>
            </ul>
        </li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a id="cont" href="contact-us.php">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       
        <?php 
          if(isset($_SESSION['username'])){ ?>
            <li><a href=""> Welcome <?php echo $_SESSION['username'];?> </a></li>
            <li><a href="exit.php"> Log Out </a></li>
        <?php } else {?>
              <li><a href="reg.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php }?>
          
          <li><a href="index-ar.php"><span class="fa fa-language"></span> Ara</a></li>
      </ul>
    </div>
  </div>
</nav>
