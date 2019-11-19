<?php 
try{
    $conn = mysqli_connect("localhost","root","","payment");
}
catch(PDOException $e) {
    echo'bad' ." ". $e->getMessage();
}

 

?>



