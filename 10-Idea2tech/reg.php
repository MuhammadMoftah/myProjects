<?php include_once 'header.php'; ?>
<?php include_once 'connect.php'; ?>
<link rel="stylesheet" href="css/login-reg.css">



<h1 class="head">Register</h1>
<div class="log">
  <div class="container">
     
      <form class="form col-sm-5 col-xs-12" method="post" action="reg.php">
       
       <?php    
     
        if (isset($_POST['reg'])){
             $username = $_POST['user'];
             $email = $_POST['email'];
             $pass = $_POST['pass'];
             $repass = $_POST['repass'];    

            //Remove Space from User and email
             $username = str_replace(' ', '', $username);
             $email = str_replace(' ', '', $email);
             $pass = str_replace(' ', '', $pass);


            //check if email exists
            $stmt = $con->prepare("SELECT * FROM users WHERE  email = ?");
            $stmt->execute(array($email));
            $row = $stmt->fetch();
            $count = $stmt->rowcount(); 
            $mail = $row['email'];


                //prevent Str. Length less than 5 Char
                if(strlen($username)<5){
                    ?>
                    <script> alert('Username Should be more than 4 Char')</script>
                <?php
                }elseif ($email == $row['email']) {
                    ?>
                    <script> alert('This Email is already exist')</script>

                <?php
                    //Password filed can not be empty 
                }elseif($pass == ''){
                    ?>
                    <script> alert('Password feild can not be empty! ')</script>

                <?php   
                }elseif($pass != $repass){
                    ?>
                    <script> alert('Password feilds not the same! ')</script>

                <?php  
                }else{
                    //prepare the database order
                    $sql = "INSERT INTO users (username,password,email)
                            VALUES ('$username', '$pass', '$email')";
                    if ($con->query($sql) == TRUE) { //fetch the database order
                            echo "<div class='alert alert-success text-center'>Registration successful. Please Login</div>";
                        } else {
                        echo "Error: " . $sql . "<br>" ;
                        }

                }    
       
    
}
?>
       
        <input class="form-control" type="text" placeholder="Username" name="user">
        <input class="form-control" type="password" placeholder="Password" name="pass">
        <input class="form-control" type="password" placeholder="Re-enter Password" name="repass">
        <input class="form-control" type="email" placeholder="Your Email Address" name="email">
        <input class=" btn btn-block" type="submit"  value="Register" name="reg" >
        <a href="login.php">Already have account?</a>
      </form>
<!--
    <?php if($pass != $repass){
        echo ' not eqyaaaaaal!'; 
    }?>
-->
  </div>  
</div>




<?php include_once 'footer.php'; ?>