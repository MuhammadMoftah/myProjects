<?php include_once 'header.php'; ?>
<?php include_once 'connect.php'; ?>

<link rel="stylesheet" href="css/login-reg.css">
     
<h1 class="head">Login</h1>
<div class="log">
  <div class="container">
      <form class="form col-sm-5 col-xs-12" method="post" action="login.php">
        <input class="form-control" type="email" placeholder="Enter you email address" name="email">
        <input class="form-control" type="password" placeholder="Password" name="password">
        <input class=" btn btn-block" type="submit" value="Login">
        <a href="forget.php">Forget your Password?</a> <br>
        <a href="reg.php">Register new account?</a>
      </form>
  </div>  
</div>
<?php
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $password = $_POST['password'];
        $email    = $_POST['email'];
        $stmt = $con->prepare("SELECT * FROM users WHERE email = ? AND password = ?");

        $stmt->execute(array($email, $password));
        $row = $stmt->fetch();
        $count = $stmt->rowcount();
        
        $_SESSION['username']=$row['username'];
        $_SESSION['email'] = $row['email'];
        $error_message     = "Error, Please check your username or your password";


        if ($email = $row['email'] && $password = $row['password']) {
            echo "welcome " . $_SESSION['username'];
            header("location: welcome.php");
        } else {
            echo $error_message;
        }
    }

if(isset($_SESSION['username'])){
    header('location: welcome.php');
}

?>

<?php include_once 'footer.php'; ?>