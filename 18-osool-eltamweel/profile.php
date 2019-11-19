<?php include "header.php" ?>

    <section class="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidenav">
                        <div class="profile_pic">
                            <img src="images/84e91fd311c93e7261ff8edc75d2f9b5.png">
                        </div>
                        <h4 class="username">اسم المستخدم</h4>
                        <ul class="links list-unstyled">
                            <a href="profile.php">
                                <li class="active"><i class="fas fa-user icon"></i> <span>الملف الشخصى</span> <i class="fas fa-angle-left angle"></i></li>
                            </a>
                            <a href="old_orders.php">
                                <li><i class="fas fa-tasks icon"></i> <span>الطلبات السابقة</span> <i class="fas fa-angle-left angle"></i></li>
                            </a>
                            <a href="orders.php">
                                <li> <i class="fas fa-clipboard-list icon"></i> <span>الطلبات المقدمة</span> <i class="fas fa-angle-left angle"></i></li>
                            </a>
                            <a class="dropdown-btn">
                                <li style="border: 0;"> <i class="fas fa-folder-open icon"></i> <span>الاقساط </span>
                                    <i class="fas fa-angle-left angle"></i></li>
                            </a>
                            <div class="dropdown-container">
                                <a class="active" href="paid_premiums.php">الاقساط المدفوعة <i class="fas fa-angle-left angle"></i></a>
                                <a href="remaining_premiums.php">الاقساط المتبقية <i class="fas fa-angle-left angle"></i></a>
                                <a href="next_premium.php">مواعيد القسط القادم <i class="fas fa-angle-left angle"></i></a>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true"><i class="fas fa-user icon"></i> الملف الشخصى</a>
                                <a class="nav-item nav-link" id="nav-edit-tab" data-toggle="tab" href="#nav-edit" role="tab" aria-controls="nav-edit" aria-selected="false"><i class="fas fa-pencil-alt"></i> تعديل البيانات</a>
                                <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false"><i class="fas fa-pencil-alt"></i> تغيير كلمة المرور</a>

                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="sec">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span>اسم المستخدم</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>جون دو</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sec">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span>البريد الالكترونى</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>john.doe@gmail.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sec">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span>رقم الهاتف</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>+20 0282989289</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sec">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span>العنوان</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>القاهرة</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="sec" style="border: 0;">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span>تاريخ الميلاد</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>15/5/1993</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="profile_pic">
                                            <img src="images/84e91fd311c93e7261ff8edc75d2f9b5.png">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-edit" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form>

                                    <div class="row">
                                        <div class="col-md-7">
                                            <label>اسم المستخدم</label>
                                            <input type="text" placeholder="" class="form-control" value="جون دو">
                                            <label>البريد الالكترونى</label>
                                            <input type="email" placeholder="" class="form-control" value="john.doe@gmail.com">
                                            <label>رقم الهاتف</label>
                                            <input type="tel" placeholder="" class="form-control" value="+20 0282989289">
                                            <label>العنوان</label>
                                            <input type="text" placeholder="" class="form-control" value="القاهرة">
                                            <label>تاريخ الميلاد</label>
                                            <div class="input">
                                                <input id="datepicker" class="form-control" placeholder="ادخل تاريخ الميلاد">

                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="profile_pic">
                                                <img src="images/84e91fd311c93e7261ff8edc75d2f9b5.png" style="border-bottom-left-radius: 0;border-bottom-right-radius: 0">
                                            </div>
                                            <div class="file_input">
                                                <input id='fileid' type='file' hidden/>
                                                <input id='buttonid' type='submit' value='تغيير الصورة' />
                                            </div>
                                            <input type="submit" value="حفظ التغييرات">
                                            <input type="submit" value="الغاء" class="cancel">

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form>
                                    <label>كلمة المرور القديمة</label>
                                    <input type="password" placeholder="*****" class="form-control">
                                    <label>كلمة المرور الجديدة</label>
                                    <input type="password" placeholder="*****" class="form-control">
                                    <label>تأكيد كلمة المرور الجديدة</label>
                                    <input type="password" placeholder="*****" class="form-control">
                                    <input type="submit" value="حفظ التغييرات">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php" ?>
