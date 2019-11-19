<?php include 'header-ar.php'; ?>

<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <form action="">
                    <div class="form-title">
                        <div class="title" style="right:100px">
                            <h1>التسجـيل</h1>
                        </div>
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleInputName">اسم المستخدم</label>
                        <input type="name" class="form-control" id="exampleInputName" placeholder="اسم المستخدم">
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleInputEmail1">البريد الاكترونى</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الاكترونى">
                    </div>

                    <div class="form-group  wow fadeInUp" data-wow-duration="1s">
                        <label for="exampleInputPassword1">كلمة المرور</label>
                        <input type="password" class="form-control is-valid mb-2" id="exampleInputPassword1" placeholder="كلمة المرور">
                        <div class="valid-feedback mb-3">
                            كلمة مرور قوية
                        </div>
                        <input type="password" class="form-control is-invalid" id="exampleInputPassword2" placeholder="تأكيد كلمة المرور">
                        <div class="invalid-feedback mb-3">
                            باسورد خاطئ
                        </div>
                    </div>

                    <div class="form-group wow fadeInUp" data-wow-duration="1s">
                        <select class="form-control p-0">
                            <option>النوع </option>
                            <option>ذكر</option>
                            <option>انثى</option>
                        </select>
                    </div>


                    <div class="custom-control custom-checkbox mb-3 was-validated wow fadeInUp" data-wow-duration="1s">
                        <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                        <label class="custom-control-label" for="customControlValidation1">لقد قرأت  <a href="terms.php" class="text-primary">الشروط والاحكام</a></label>
                        <div class="invalid-feedback">من قضلك اقرأ الشروط والاحكام</div>
                    </div>


                    <input class="btn btn-primary form-control mt-3 wow fadeInUp" data-wow-duration="1s" type="submit" value="Join us">
                </form>

            </div>
        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="images/footer.jpg" alt="">
</section>
<?php include 'footer-ar.php'; ?>
