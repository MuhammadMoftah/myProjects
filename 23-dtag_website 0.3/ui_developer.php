<?php include 'header.php';?>


<div class="head2 text-center">
    <div class="overlay">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="careers">الوظائف</a></li>

                    <li class="breadcrumb-item active" aria-current="page">UI/UX DESIGNER</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="career_details">
    <div class="container">


        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="title">
                    <h3>طلب عمل</h3>
                    <div class="nw_title_line wow fadeIn animated" style="margin-bottom: 10px;"></div>
                </div>

                <form name="cvform" enctype="multipart/form-data" method="post" action="send_cv.php">

                    <input type="text" placeholder="الاسم الاول" class="form-control" name="firstname">
                    <input type="text" placeholder="الاسم الثانى" class="form-control" name="lastname">

                    <input type="email" placeholder="البريد الالكترونى" class="form-control" name="email">
                    <input type="tel" placeholder="رقم الهاتف" class="form-control" name="phone">
                    <input type="file" class="form-control" title="حمل السرة الذاتية" name="cv[]">
                    <input type="text" placeholder="حساب linkedin" class="form-control" name="linkedin">
                    <input type="text" placeholder="العنوان" class="form-control" name="address">
                    <input type="text" placeholder="الموقع" class="form-control" name="website">
                    <input type="submit" value="ارسل">
                </form>

            </div>
            <div class="col-md-8 col-xs-12">
                <div class="title">
                    <h3>تفاصيل الوظيفة</h3>
                    <div class="nw_title_line wow fadeIn animated" style="margin-bottom: 10px;"></div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="career">
                            <div class="media">
                                <img class="align-self-start mr-3" src="images/images.jpg">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-md-8 col-xs-12">
                                            <h5 class="mt-0">UI/UX DESIGNER</h5>
                                        </div>

                                    </div>

                                    <p><i class="fa fa-bookmark"></i> دوام كامل</p>
                                    <p><i class="fa fa-calendar"></i> 2018-02-21</p>

                                </div>
                            </div>
                            <div class="description">
                                <h3>وصف الوظيفة:</h3>
                                <p>يتنامى فريقنا بسرعة ونبحث عن مصمم واجهة مستخدم / UX لدعم طلبات الويب والتصميم.</p>
                                <p><span>الخبرة المطلوبة: </span> اكثر من سنة</p>
                                <p><span>الاماكن الشاغرة:</span> 2</p>
                                <p><span>المرتب: </span> قابل للتفاوض</p>
                                <h3 style="margin-top: 20px;">متطلبات العمل:</h3>
                                <div class="desc" style="text-align: left;direction: ltr;">
                                    <ul>
                                        <li>1- Proven work experience as a UI/UX Designer </li>
                                        <li>2- Portfolio of design projects</li>
                                        <li>3- Knowledge of wireframe tools </li>
                                        <li>4- HTML , CSS, JavaScript, Jquery and Bootstrap </li>
                                        <li>5- knowledge of design software like Adobe Illustrator and Photoshop , XD is a plus</li>
                                        <li>6- Angular 4, ionic knowledge is a plus</li>
                                        <li>7- please sned your cv with sample of your previous projects</li>

                                    </ul>
                                </div>
                                <h3 style="margin-top: 20px;">معلومات اكثر:</h3>
                                <p><i class="fas fa-map-marker-alt"></i> <span>العنوان:</span> 18 شارع الشيخ على محمود , ميدان المحكمة , مصرالجديدة - مصر</p>
                                <p><i class="fas fa-phone"></i> <span>رقم الهاتف:</span> 00201064474117</p>
                                <p><i class="fas fa-envelope"></i> <span>البريد الالكترونى:</span> info@d-tag.net</p>

                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>




    </div>

</section>


<?php include "footer.php" ?>
