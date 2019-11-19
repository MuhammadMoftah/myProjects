<?php include "header.php" ?>
<!--===== Login =====-->
<!--===== Login =====-->
<section class="logreg">
    <div class="container">
        <div class="title">
           <h3>تسجيل دخول</h3>
        </div>
        
        <div class="row">
            <form action="" class="col-md-4 mx-auto" >
                   <div class="form-group ">
                       <input class="form-control" type="text" placeholder = "البريد الالكترونى">
                       <span><i class="far fa-envelope-open"></i></span>
                   </div> 
                   <div class="form-group ">
                       <input class="form-control" type="text" placeholder = 'كلمة المرور'>
                       <span><i class="fas fa-lock"></i></span>
                   </div> 
                  

                   <label style="width:100px">
                        <input type="checkbox" checked="checked" > تذكرنى
                        <span class="checkmark"></span>
                    </label>
                    <a href="./forget.php" style='float: left;margin: -36px 0px;color: #9CD43A; '> نسيت كلمة السر؟</a>
                   <input type="submit" class="btn " value="تسجيل دخول">
                   <a href="./reg.php" style='color: #9CD43A;text-align: center;display: block;    padding: 15px 0;'>انشاء حساب جديد</a>
            </form>
        </div>
        
    </div>
</section>





<?php include "footer.php" ?>