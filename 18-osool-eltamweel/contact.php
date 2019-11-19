<?php include "header.php" ?>
<!-- ===== Side Pages ===== -->
<!-- ===== Side Pages ===== -->
  <section class="side-pages">
        <a class="prev" href="about.php">
            <i class="fas fa-arrow-up"></i> <h6> عن الشركة</h6>
        </a>
        
        <div class="dots">
            <a href="index.php" data-toggle="tooltip" data-placement="left" title="الرئيسية"></a>
            <a href="" data-toggle="tooltip" data-placement="left" title="طلب جديد"></a>
            <a href="" data-toggle="tooltip" data-placement="left" title="النماذج"></a>
            <a href="" class="active" data-toggle="tooltip" data-placement="left" title="الشروط والاحكام"></a>
            <a href="" data-toggle="tooltip" data-placement="left" title="عن الشركة"></a>
            <a href="" data-toggle="tooltip" data-placement="left" title="اتصل بنا"></a>
        </div>
        <a class="next" href="">
            <i class="fas fa-arrow-down"></i> <h6> اتصل بنا</h6>
        </a>
  </section>


  <!-- ===== Terms Content ===== -->
  <!-- ===== Terms Content ===== -->
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="">
                    <h5>ارسل رسالة</h5>
                    <div class="form-group">
                        <h6>الاسم</h6>
                        <input class='form-control' type="text" placeholder=''>
                    </div>

                    <div class="form-group">
                        <h6>البريد الاكترونى</h6>
                        <input class='form-control' type="email" placeholder=''>
                    </div>

                    <div class="form-group">
                        <h6>عنوان الرسالة</h6>
                        <input class='form-control' type="text" placeholder=''>
                    </div>

                    <div class="form-group">
                        <h6>تفاصيل الرسالة</h6>
                        <input class='form-control' type="email" placeholder=''>
                    </div>

                    <input type="submit" value='ارسال'>
                </form>    
            </div>

            <div class="col-md-6 left">
                <h5>وسائل التواصل</h5>
                <div class="contact-info">
                    <p><i class="fas fa-map-marker-alt"></i> شارع ابراهيم ناصر</p>
                    <p><i class="fas fa-phone"></i> 01023674938</p>
                    <p><i class="fas fa-envelope"></i> mail@mail.com</p>
                </div>
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>

    </div>
</section>


<?php include "footer.php" ?>