<?php 
include 'connect.php';

$sql = "SELECT * FROM users";
$res = mysqli_query($conn , $sql);

?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="test.css">
</head>
<body>
    <div class="container">
       <?php while($row = mysqli_fetch_array($res)) {?>
    <div class="part">
            <img src="<?php echo  $row["username"] ?>" alt="">
            <h3><?php echo  $row["email"] ?></h3>
        </div>
    <?php } ?>
        
        
    </div>
</body>