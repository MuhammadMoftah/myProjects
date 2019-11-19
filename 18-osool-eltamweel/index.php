<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>اصول التمويل</title>
</head>

<body>


    <section class="index-header">
        <div class="head">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 right">
                        <a href="" data-toggle="modal" data-target="#loginModal">تسجيل دخول</a>
                        <a href="" data-toggle="modal" data-target="#registerModal">مستخدم جديد</a>

                    </div>
                    <div class="col-md-6 left">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    <section class="index">
        <img src="images/index-logo.png" alt="">

        <nav class="navbar navbar-expand-md navbar-dark p-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">خدماتنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="new_order.php">طلب جديد</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="samples.php">النماذج</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">الشروط والاحكام</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">عن الشركة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">اتصل بنا</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="get">
            <h1>احصل على افضل خدمة <span>تقسيط</span></h1>
            <p>هناك حقيقة مثبتة منذ زمن طويل وهى ان المحتوى المقروء لصفحة ما سيلهى القارئ عن التركيز على الشكل الخارجى للنص أو شكل توضع الفقرات فى الصفحة التى يقرأها. ولذلك يتم استخدام</p>
            <a href="">طلب جديد</a>
            <a href="">خدماتنا</a>
        </div>
    </section>

    <!-- ===== Side Pages ===== -->
    <!-- ===== Side Pages ===== -->
    <section class="side-pages">
        <a class="prev" href="">
            <!-- <i class="fas fa-arrow-up"></i> <h6> السابق</h6> -->
        </a>

        <div class="dots">
            <a href="index.php" class="active" data-toggle="tooltip" data-placement="left" title="الرئيسية"></a>
            <a href="services.php" data-toggle="tooltip" data-placement="left" title="خدماتنا"></a>

            <a href="new_order.php" data-toggle="tooltip" data-placement="left" title="طلب جديد"></a>
            <a href="" data-toggle="tooltip" data-placement="left" title="النماذج"></a>
            <a href="" data-toggle="tooltip" data-placement="left" title="الشروط والاحكام"></a>
            <a href="" data-toggle="tooltip" data-placement="left" title="عن الشركة"></a>
            <a href="" data-toggle="tooltip" data-placement="left" title="اتصل بنا"></a>
        </div>
        <a class="next" href="services.php">
            <i class="fas fa-arrow-down"></i> <h6> خدماتنا</h6>
        </a>
    </section>


    <?php include "footer.php" ?>
