<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./images/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>Joker</title>
</head>

<body>


    <!--===== NavBar ====-->
    <!--===== NavBar ====-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light  ">
            <a class="navbar-brand" href="#"><img src="images/logo.png"  width="65px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto ">
                    <a class="nav-item nav-link active" href="index">الرئيسية<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link offers" href="index#offers">العروض</a>
                    <a class="nav-item nav-link about-us" href="index#about">عن الشركة</a>
                    <a class="nav-item nav-link contact" href="index#contact">اتصل بنا</a>
                </div>
            </div>
        </nav>
    </div>

    <!--===== Cover =====-->
    <!--===== Cover =====-->
    <div class="cover" style="background-image:url(./images/cover.jpg)">
        <div class="container">
            <img class="upper" src="images/trop-paper.png" alt="">
            <div class="ticket">
                <button class="btn"> احجز فندقك الان </button>
                <h2> اسعار خاصة اكثر من 5 ليالى </h2>
            </div>
            <img class="lower" src="images/trop-paper.png" alt="">
        </div>
    </div>

    <div class="sent_successfuly">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="image">
                        <img src="images/20-Jack-eLearning.net_.png">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="icon">
                        <img src="images/files-and-folders.png">
                    </div>
                    <h4 id="mail_msg"></h4>
                    <a href="index"><button>الرجوع الى الرئيسية</button></a>

                </div>
            </div>

        </div>
    </div>

    <!--=====Contact Us===== -->
    <!--=====Contact Us===== -->
    <div class="contact_us" id="contact">
        <div class="container">
            <div class="title">
                <h2>اتصل بنا</h2>
                <span></span>
            </div>

            <div class="info">
                <div class="row">
                    <div class="col-md-4">
                        <div class="part">
                            <div class="ico"> <i class="fas fa-phone"></i></div>
                            <p>20123456789+ </p>
                            <p>20123456789+ </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="part">
                            <div class="ico"> <i class="fas fa-envelope"></i></div>
                            <p>ElJoker.net </p>
                            <p>INFO@GMAIL.COM </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="part">
                            <div class="ico"><i style="right: 18px;" class="fas fa-map-marker-alt"></i></div>
                            <p>123 Main Street</p>
                            <p>Your City, Your Country </p>
                        </div>
                    </div>
                </div>
            </div>


            <form name="contactform" method="post" action="send_message.php">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <input type="text" placeholder="الاسم" class="form-control" name="fullname">
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <input type="email" placeholder="البريد الالكترونى" class="form-control" name="email">
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <input type="tel" placeholder="التليفون" class="form-control" name="phone">
                    </div>
                </div>
                <textarea class="form-control" placeholder="الرسالة" rows="5" name="message"></textarea>
                <div class="button text-center">
                    <input type="submit" value="ارسال">
                </div>
            </form>
        </div>
    </div>


    <!--=====Footer =====-->
    <!--=====Footer =====-->
    <footer>
        <p> Copright | V-Travel 2018.All Rights Reserved &copy;</p>
    </footer>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
</body>

</html>
<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "noha2697@gmail.com";
    $email_subject = "joker Contact us";
 
    function died($error) {
        // your error code can go here
        // echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        // echo "These errors appear below.<br /><br />";
        // echo $error."<br /><br />";
        // echo "Please go back and fix these errors.<br /><br />";
           echo "<script>$('#mail_msg').html('" . $error ."');</script>";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['fullname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $fullname = $_POST['fullname']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // not required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$fullname)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
 
  if(strlen($message) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Full Name: ".clean_string($fullname)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone No: ".clean_string($phone)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

?>

    <!-- include your own success html here -->

    <script>
        $("#mail_msg").html("تم ارسال رسالتك بنجاح");

    </script>


    <?php
 
}
?>
