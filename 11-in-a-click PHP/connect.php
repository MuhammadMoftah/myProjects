<?php 
try{
    $conn = mysqli_connect("localhost","root","","inaclick");
    $arb = "SET CHARACTER SET utf8";
    $fetch_arb = mysqli_query($conn, $arb);
}
catch(PDOException $e) {
    echo'bad' ." ". $e->getMessage();
}

 

?>



