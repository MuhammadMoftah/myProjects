<?php 
    $dsn='mysql:host=localhost;dbname=shop';
    $user="root";
    $pass="";

try{
    $con = new PDO($dsn, $user, $pass);
}
catch(PDOException $e) {
    echo'bad' ." ". $e->getMessage();
}




?>



