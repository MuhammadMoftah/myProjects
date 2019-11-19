<?php include 'header.php';?>


<div class="head2 text-center">
    <div class="overlay">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="careers">الوظائف</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Andoid Developer</li>
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
                                <img class="align-self-start mr-3" src="images/images2.png">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-md-8 col-xs-12">
                                            <h5 class="mt-0">Andoid Developer</h5>
                                        </div>

                                    </div>

                                    <p><i class="fa fa-bookmark"></i> دوام كامل</p>
                                    <p><i class="fa fa-calendar"></i> 2018-02-21</p>

                                </div>
                            </div>
                            <div class="description">
                                <p>نحن نبحث عن مطور برامج Android الأقدم مع متطلبات ومؤهلات رفع الصوت</p>
                                <p><span>الخبرة المطلوبة: </span> اكثر من سنة</p>
                                <p><span>الاماكن الشاغرة:</span> 2</p>
                                <p><span>المرتب: </span> قابل للتفاوض</p>
                                <h3>وصف الوظيفة:</h3>
                                <div class="desc" style="text-align: left;direction: ltr;">
                                    <ul>
                                        <li>1- Involved in all stages of application development including design, modifications, development, and implementation of Android applications to assure the application quality and efficiency.</li>
                                        <li>2- Document all codes of the development processes to record and facilitate the work for other mobile developers.</li>
                                        <li>3- Keep up to date with the latest industry trends in the mobile technologies to enhance the application functionality.</li>
                                        <li>4- Write clean code.</li>
                                        <li>5- Work with Graphic Designers and Software Developers to realize, build, and test the applications and to implement server APIs (Application Programming Interface) and services to support planned mobile functionality</li>
                                    </ul>

                                </div>

                                <h3 style="margin-top: 20px;">متطلبات العمل:</h3>
                                <div class="desc" style="text-align: left;direction: ltr;">
                                    <ul>
                                        <li>1- +1 year experience</li>
                                        <li>2- Committed to producing code that follows the best practice’s of the industry</li>
                                        <li>3- Previous experience with other mobile platforms (not required but desired)</li>
                                        <li>4- Experience developing complex apps</li>
                                        <li>5- Proficiency in the following skills and technologies is mandatory:</li>
                                        <li>6- Android SDK Java, IDE Android Studio/IntelliJ, Debugging, GPS, JSON, XML, SOAP, REST</li>
                                        <li>7- Good Knowledge C/C++</li>
                                        <li>8- Server-side technologies such as Java and PHP</li>
                                        <li>9- OO programming and design patterns</li>
                                        <li>10- HTML5, JavaScript, jQuery, Ajax PHP</li>
                                        <li>11- APIs and Web Services</li>
                                        <li>12- Deploying apps process on Play Store</li>
                                        <li>13- please send your cv with samples of your work to olx msgs or whats app</li>
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
