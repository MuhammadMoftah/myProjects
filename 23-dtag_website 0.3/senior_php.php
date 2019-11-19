<?php include 'header.php';?>


<div class="head2 text-center">
    <div class="overlay">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="careers">الوظائف</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Senior Php Developer</li>
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
                                <img class="align-self-start mr-3" src="images/0_HICLyAdNSIyT0ODU.jpg">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-md-8 col-xs-12">
                                            <h5 class="mt-0">Senior Php Developer</h5>
                                        </div>

                                    </div>

                                    <p><i class="fa fa-bookmark"></i> دوام كامل</p>
                                    <p><i class="fa fa-calendar"></i> 2018-02-21</p>

                                </div>
                            </div>
                            <div class="description">
                                <h3>وصف الوظيفة:</h3>
                                <p>نحن نبحث عن كبار مطوري PHP مع متطلبات رفع المستوى والمؤهلات</p>
                                <p><span>الخبرة المطلوبة: </span> من 3 ل 5 سنوات</p>
                                <p><span>الاماكن الشاغرة:</span> 3</p>
                                <p><span>المرتب: </span> قابل للتفاوض</p>
                                <h3 style="margin-top: 20px;">متطلبات العمل:</h3>
                                <div class="desc" style="text-align: left;direction: ltr;">
                                    <ul>
                                        <li>1- Bachelor's degree of Software Eng, Computer Science, or Computer Eng.</li>
                                        <li>2- Good PHP Experience.</li>
                                        <li>3- Good understanding of web development concepts.</li>
                                        <li>4- Experience dealing with JavaScript, Relational Databases as MySQL.
                                        </li>
                                        <li>5- Fair knowledge of system administration and dealing with hosting platforms .</li>
                                        <li>6- Fair knowledge of CSS3 / HTML5.</li>
                                        <li>7- Good experience with Source Control Systems as Git.</li>
                                        <li>8- Capable of dealing and understanding and altering open source libraries if needed.</li>
                                        <li>9- Good communication skills and fluency in English; spoken and written</li>
                                        <li>10- Experience with OOP PHP and Javascript development is a plus.</li>
                                        <li>11- Ability to move between different platforms and apply concepts there.</li>
                                        <li>12- Ability to work under pressure.</li>
                                        <li>13- Ability to lead teams is a big plus.</li>
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
