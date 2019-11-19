<?php include "header.php" ?>

    <!-- ===== Side Pages ===== -->
    <!-- ===== Side Pages ===== -->
    <section class="side-pages">
        <a class="prev" href="">
             <i class="fas fa-arrow-up"></i> <h6> خدماتنا</h6> 
        </a>

        <div class="dots">
            <a href="index.php" data-toggle="tooltip" data-placement="left" title="الرئيسية"></a>
            <a href="services.php" data-toggle="tooltip" data-placement="left" title="خدماتنا"></a>

            <a href="new_order.php" class="active" data-toggle="tooltip" data-placement="left" title="طلب جديد"></a>
            <a href="samples.php" data-toggle="tooltip" data-placement="left" title="النماذج"></a>
            <a href="" data-toggle="tooltip" data-placement="left" title="الشروط والاحكام"></a>
            <a href="" data-toggle="tooltip" data-placement="left" title="عن الشركة"></a>
            <a href="" data-toggle="tooltip" data-placement="left" title="اتصل بنا"></a>
        </div>
        <a class="next" href="">
            <i class="fas fa-arrow-down"></i> <h6> النماذج</h6>
        </a>
    </section>

    <section class="new_order">
        <div class="container">
            <div class="title">
                <h4>طلب جديد</h4>
                <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام </p>
            </div>
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <label>الاسم</label>
                        <input type="text" placeholder="john doe" class="form-control">
                        <label>العنوان</label>
                        <input type="text" placeholder="Egypt" class="form-control">
                        <label>البريد الالكترونى</label>
                        <input type="email" placeholder="john.doe@gmail.com" class="form-control">
                        <label>رقم الموبايل</label>
                        <input type="tel" placeholder="011657894250" class="form-control">
                        <label>رقم تليفون العمل</label>
                        <input type="tel" placeholder="+02 2585694085949" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>الرقم القومى</label>
                        <input type="text" placeholder="" class="form-control">
                        <div class="row">
                            <div class="col-md-6">
                                <label>الحالة الاجتماعية</label>
                                <input type="text" placeholder="متزوج" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>النوع</label>
                                <select class="form-control" style="height: auto;">
                                    <option>ذكر</option>
                                    <option>انثى</option>
                                </select>
                            </div>
                        </div>
                        <label>البلد</label>
                        <select class="form-control" style="height: auto;">
                                    <option>السعودية</option>
                                    <option>مصر</option>
                        </select>
                        <div class="row">
                            <div class="col-md-6">
                                <label>الرقم البريدى</label>
                                <input type="text" placeholder="95673" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>المدينة</label>
                                <input type="text" placeholder="حفر الباطن" class="form-control">
                            </div>
                        </div>
                        <label>اسباب طلبك</label>
                        <input type="text" placeholder="من فضلك وضح اسباب طلبك" class="form-control">

                    </div>
                </div>
                <div class="text-center button">
                    <input type="submit" value="طلب جديد">
                </div>
            </form>

        </div>
    </section>


    <?php include "footer.php" ?>