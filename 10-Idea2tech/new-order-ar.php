<?php include_once 'header.php'; ?>
<?php include_once 'connect.php'; ?>
<link rel="stylesheet" href="css/login-reg.css">



<h1 class="head" style='letter-spacing:0px;font-family: "Droid";'>طلب جديد</h1>
<div class="log log-ar">
  <div class="container">
     
      <form class="form col-sm-5 col-xs-12" method="post" action="reg.php">  
        <input class="form-control" type="text" placeholder="الاسم بالكامل" >
        <input class="form-control" type="email" placeholder="البريد الاكترونى" name="email">
        <input class="form-control" type="text" placeholder="رقم التليفون" >
        <input class="form-control" type="text" placeholder="رقم الواتس اب" >
        <select class="selectpicker form-control">
                  <option>اختار نوع الخدمة</option>
                  <option> موقع ويب</option>
                  <option>تطبيق موبايل</option>
        </select>
        <textarea class="form-control" id="" cols="20" rows="10"></textarea>
        <input class=" btn btn-block" type="submit"  value="اطلب الان" >
        
      </form>

  </div>  
</div>




<?php include_once 'footer.php'; ?>