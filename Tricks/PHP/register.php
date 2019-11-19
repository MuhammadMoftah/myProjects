

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="username">
    <input type="text" name="email">
    <input type="submit" value="SignUp" name="reg">
</form>

<?php    
if (isset($_POST['reg'])){
     $user = $_POST['username'];
     $email = $_POST['email'];
     $pass = $_POST['password'];
    
    //Remove Space from User and email
     $user = str_replace(' ', '', $user);
     $email = str_replace(' ', '', $email);
    
    
    //check if username exists
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute(array($user));
    $row = $stmt->fetch();
    $count = $stmt->rowcount(); //count the rows which have the given username given
    $user = $row['username'];
    echo '  The username count is  ' . $count . '<br>';
    
    
    
        //prevent Str. Length less than 5 Char
        if(strlen($user)<5){
            echo 'Your name should be more than 5 char with no Spaces';
        
        }else if ($username == $row['username'] ) {
            echo"This UserName is already exist";
            //another solution
            //if ($count > 1){
            //echo ' Error the user is exsit';
            //}
            
        }else{
            //prepare the database order
            $sql = "INSERT INTO users (username, email)
                    VALUES ('$user', '$email')";
     
            if ($db->query($sql) == TRUE) { //fetch the database order
                    echo "New record created successfully  <br>";
                } else {
                echo "Error: " . $sql . "<br>" ;
                }
        }    
        
}
?>