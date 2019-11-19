<?php include_once 'header.php'; ?>
<?php include_once 'connect.php'; ?>
<link rel="stylesheet" href="css/login-reg.css">



<h1 class="head">New order</h1>
<div class="log">
  <div class="container">
     
      <form class="form col-sm-5 col-xs-12" method="post" action="reg.php">  
        <input class="form-control" type="text" placeholder="Your Full Name" >
        <input class="form-control" type="email" placeholder="Your Email Address" name="email">
        <input class="form-control" type="text" placeholder="Phone Number" >
        <input class="form-control" type="text" placeholder="WhatsApp Number" >
        <select class="selectpicker form-control">
                  <option>Choose your Service</option>
                  <option>Web Application</option>
                  <option>Mobile Application</option>
        </select>
        <textarea class="form-control" id="" cols="20" rows="10"></textarea>
        <input class=" btn btn-block" type="submit"  value="Order Now" >
        
      </form>

  </div>  
</div>




<?php include_once 'footer.php'; ?>