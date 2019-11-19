<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="css/login-reg.css">

<div class="welcome">
    <div class="container">
        <h4>Welcome <?php echo $_SESSION['username'] ?> we are glad you are here</h4>
    </div>
</div>

            
<?php         
header('refresh:2;url= index.php');
            
    ?>
<?php include_once 'footer.php'; ?>