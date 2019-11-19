<?php include 'header-ar.php'; ?>

<section class="company-reg">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <form action="">
                    <div class="form-title">
                        <div class="title text-center">
<!--                            <h1>Company <br> Registraion</h1>-->
                            <h1>تسجيل <br> كشركة</h1>
                        </div>
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleCompanyName">اسم الشركة</label>
                        <input type="name" class="form-control" id="exampleCompanyName" placeholder="اسم الشركة">
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleCompanyRegName">اسم الشركة المسجل</label>
                        <input type="name" class="form-control" id="exampleCompanyRegName" placeholder="اسم الشركة المسجل">
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleFormControlTextarea1">وصف الشركة</label>
                        <textarea style="resize:none" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>

                    <div class="col-12 pb-4 mt-5">
                        <h4>معلومات التواصل</h4>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="exampleInputEmail1">البريد الاكترونى</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الاكترونى">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="CRnumber">رقم السجل التجارى</label>
                            <input type="text" class="form-control" id="CRnumber" placeholder="رقم السجل التجارى" required>
                            <div class="invalid-tooltip">
                                من فضلك اكتب رقم صحيح.
                            </div>
                        </div>

                        <div class="form-group col-md-6 custom-file wow  fadeInUp" data-wow-duration="1s" style="height: 90px;"> رفع رقم السجل التجارى
                            <input type="file" class="custom-file-input" id="customFile">
                            <label style="margin-left: 15px;width: 90%;top:32px; text-align:center" class="custom-file-label " for="customFile">اختار الملف</label>
                        </div>

                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="Phone">رقم الهاتف</label>
                            <input type="text" class="form-control" id="Phone" placeholder="رقم الهاتف" required>
                        </div>

                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="city">المدينة</label>
                            <input type="text" id="city" class="form-control" placeholder="المدينة">
                        </div>
                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="zipCode">الرقم البريدى</label>
                            <input type="text" id="zipCode" class="form-control" placeholder="الرقم البريدى">
                        </div>
                        <div class="form-group col-md-6 wow fadeInUp" data-wow-duration="1s">
                            <label for="Phone">عدد العملاء</label>
                            <input type="text" class="form-control" placeholder="عدد العملاء">
                        </div>

                        <div class="form-group col-md-6 custom-file wow fadeInUp" data-wow-duration="1s" style="height: 90px;"> ارفع اللوجو
                            <input type="file" class="custom-file-input" id="CRlogo">
                            <label style="margin-left: 15px;width: 90%;top:32px;text-align:center" class="custom-file-label" for="CRlogo">اختار الملف</label>
                        </div>

                    </div>

                    <div class="custom-control custom-checkbox my-3 was-validated wow fadeInUp" data-wow-duration="1s" style="height: 47px;">
                        <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                        <label class="custom-control-label" for="customControlValidation1">لقد قرأت <a href="terms.php" class="text-primary">الشروط والاحكام </a></label>
                        <div class="invalid-feedback">يجب عليك قرأت الشروط والاحكام قبل التسجيل</div>
                    </div>
                    <input class="btn btn-primary form-control mt-3 wow fadeInUp" data-wow-duration="1s" type="submit" value="تسجيل كشركة">
                </form>

            </div>
        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="images/footer.jpg" alt="">
</section>
<?php include 'footer-ar.php'; ?>
