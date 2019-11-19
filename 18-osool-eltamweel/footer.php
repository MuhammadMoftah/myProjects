<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="header">
                        <div class="logo">
                            <img src="images/index-logo.png" alt="">
                        </div>
                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ </p>

                    </div>
                    <div class="title d-flex">
                        <h3>تسجيل الدخول</h3>
                        <span class="line"></span>
                    </div>
                    <form>
                        <label>اسم المستخدم او البريد الالكترونى</label>
                        <input type="email" placeholder="Required Field" class="form-control">
                        <label>رمز المرور</label>
                        <div class="input">
                            <input type="password" placeholder="******" class="form-control input-psswd" psswd-shown="false">
                            <i class="fas fa-eye"></i>
                        </div>
                        <input type="checkbox" class="myinput large"> <label style="font-size: 13px;font-weight: 600;">تذكرنى</label>
                        <div class="d-flex">
                            <input type="submit" value="تسجيل دخول">
                            <a href="" data-toggle="modal" data-target="#forgetpasswordModal" data-dismiss="modal" class="forget_password">هل نسيت كلمة السر؟</a>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>ليس لديك حساب جديد؟ <a href="" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">تسجيل حساب جديد</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="title d-flex">
                        <h3>حساب جديد</h3>
                        <span class="line"></span>
                    </div>
                    <form>
                        <label>اسم المستخدم </label>
                        <input type="text" placeholder="Required Field" class="form-control">
                        <label>البريد الالكترونى </label>
                        <input type="email" placeholder="Required Field" class="form-control">
                        <label>رمز المرور</label>
                        <div class="input">
                            <input type="password" placeholder="******" class="form-control input-psswd" psswd-shown="false">
                            <i class="fas fa-eye"></i>
                        </div>
                        <label>تأكيد رمز المرور</label>
                        <div class="input">
                            <input type="password" placeholder="******" class="form-control input-psswd" psswd-shown="false">
                            <i class="fas fa-eye"></i>
                        </div>
                        <label>رقم الهاتف </label>
                        <input type="tel" placeholder="Required Field" class="form-control">
                        <label>العنوان </label>
                        <input type="text" placeholder="Required Field" class="form-control">
                        <input type="checkbox" class="myinput large"> <label style="font-size: 13px;font-weight: 600;">اوافق على <a href="" data-toggle="modal" data-target="#termsModal" data-dismiss="modal">الشروط و الاحكام</a></label>

                        <div class="d-flex">
                            <input type="submit" value="حساب جديد">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p> لديك حساب ؟ <a href="" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">تسجيل دخول</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="padding-bottom:20px; ">

                <div class="modal-header" style="border: 0;padding-bottom: 0;">
                    <div class="title d-flex">
                        <h3>الشروط و الاحكام</h3>
                        <span class="line"></span>
                    </div>
                </div>

                <div class="modal-body">
                    <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص</p>
                    <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص</p>
                </div>


            </div>
        </div>
    </div>

    <div class="modal fade" id="forgetpasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="title d-flex">
                        <h3>نسيت كلمة السر</h3>
                        <span class="line"></span>
                    </div>
                    <form>

                        <label>البريد الالكترونى </label>
                        <input type="email" placeholder="Required Field" class="form-control">

                        <div class="d-flex">
                            <input type="submit" value="ارسل">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <script src="js/index.js"></script>

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");

                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }

    </script>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            weekStart: 1,
            daysOfWeekHighlighted: "6,0",
            autoclose: true,
            todayHighlight: true,
        });
        $('#datepicker').datepicker("setDate", new Date());

    </script>
</body>

</html>
