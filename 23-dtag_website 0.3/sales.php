<?php include 'header.php';?>


<div class="head2 text-center">
    <div class="overlay">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="careers">الوظائف</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Sales Man</li>
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
                                            <h5 class="mt-0">Sales Man</h5>
                                        </div>

                                    </div>

                                    <p><i class="fa fa-bookmark"></i> دوام جزئى</p>
                                    <p><i class="fa fa-calendar"></i> 2018-02-21</p>

                                </div>
                            </div>
                            <div class="description">
                                <h3>وصف الوظيفة:</h3>
                                <div class="desc" style="text-align: left;direction: ltr;">
                                    <ul>
                                        <li>1- We are looking for a high-performing Sales man (part time work) to help us meet our customer acquisition and revenue growth targets by keeping our company competitive and innovative. You will be responsible for maximizing our sales team potential, crafting sales plans and justifying those to plans to the upper management.</li>
                                        <li>2- The successful candidates will be proactive, confident with excellent communication skills and have a natural ability at building rapport with senior level decision makers. The aim of the position is to promote the products and services whilst establishing new client agreements through unparalleled levels of service and agreeable account management skills.</li>


                                    </ul>
                                </div>
                                <p><span>الخبرة المطلوبة: </span> من 3 ل 5 سنوات</p>
                                <p><span>الاماكن الشاغرة:</span> 2</p>
                                <p><span>المرتب: </span> قابل للتفاوض</p>
                                <h3 style="margin-top: 20px;">المسؤوليات:</h3>
                                <div class="desc" style="text-align: left;direction: ltr;">
                                    <ul>
                                        <li>1- Ability to work towards targets in a sales driven environment </li>
                                        <li>2- Achieve growth and hit sales targets </li>
                                        <li>3- Ability to prospect and map out stakeholders within organisations </li>
                                        <li>4- Build and promote strong, long-lasting customer relationships by partnering with them and understanding their needs </li>
                                        <li>5- Present sales, revenue and expenses reports and realistic forecasts to the management team</li>
                                        <li>6- Identify emerging markets and market shifts while being fully aware of new products and competition status</li>

                                    </ul>
                                </div>
                                <h3 style="margin-top: 20px;">متطلبات العمل:</h3>
                                <div class="desc" style="text-align: left;direction: ltr;">
                                    <ul>
                                        <li>1- Excellent selling skills </li>
                                        <li>2- Excellent technical knowledge</li>
                                        <li>3- A keen interest in IT issues</li>
                                        <li>4- Initiative </li>
                                        <li>5- Presentation skills</li>
                                        <li>6- The ability to write reports and proposals</li>
                                        <li>7- The capacity to work well on your own or in a team</li>
                                        <li>8- Negotiating skills</li>
                                        <li>9- The ability to manage your time and plan your day effectively</li>
                                        <li>10- Previous experience working within B2B sales</li>
                                        <li>11- if you interested send your cv to olx msgs or whats app</li>
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
