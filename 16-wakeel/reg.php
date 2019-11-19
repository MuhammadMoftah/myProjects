<?php include "header.php" ?>
<!--===== Login =====-->
<!--===== Login =====-->
<section class="logreg">
    <div class="container">
        <div class="title">
           <h3>حساب جديد</h3>
        </div>
        
        <div class="row">
            <form action="" class="col-md-4 mx-auto" >
                   <div class="form-group ">
                       <input class="form-control" type="text" placeholder = "الاسم الاول">
                       <span><i class="far fa-user"></i></span>
                   </div> 
                   <div class="form-group ">
                       <input class="form-control" type="text" placeholder = 'الاسم الاخير'>
                       <span><i class="far fa-user"></i></span>
                   </div> 

                    <div class="form-group">
                       <input class="form-control" type="email"  placeholder = 'البريد الاكترونى'>
                       <span><i class="far fa-envelope-open"></i></span>
                   </div> 

                    <div class="form-group ">
                       <input class="form-control" type="text" placeholder = 'كلمة المرور'>
                       <span><i class="fas fa-lock"></i></span>
                   </div> 

                    <div class="form-group ">
                       <input class="form-control" type="text" placeholder = 'تأكيد كلمة المرور'>
                       <span><i class="fas fa-lock"></i></span>
                   </div> 

                    <div class="form-group ">
                       <input class="form-control" type="text" placeholder = 'رقم الهاتف'>
                       <span><i class="fas fa-phone"></i></span>
                   </div> 
                  

                   <label class="">
                        <input type="checkbox" checked="checked"> أوافق على الشروط والاحكام
                        <span class="checkmark"></span>
                    </label>
                   <input type="submit" class="btn " value="تسجيل دخول">
                   <a href="" style='color: #9CD43A;text-align: center;display: block;    padding: 15px 0;'>انشاء حساب جديد</a>
            </form>
        </div>
        
    </div>
</section>


<?php include "footer.php" ?>