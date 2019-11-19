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
                                <li><i class="fas fa-user icon"></i> <span>الملف الشخصى</span> <i class="fas fa-angle-left angle"></i></li>
                            </a>
                            <a href="old_orders.php">
                                <li class="active"><i class="fas fa-tasks icon"></i> <span>الطلبات السابقة</span> <i class="fas fa-angle-left angle"></i></li>
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
                                <a href="next_premium.php">مواعيد القسط   القادم <i class="fas fa-angle-left angle"></i></a>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content">
                        <h6 style='text-align:center;color:#0D5680;font-weight:bold;margin:20px 0'>طلب تقسيط 5000 ريال سعودى</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col"><i class="fas fa-clipboard-check"></i>رقم القسط </th>
                                        <th scope="col"><i class="fas fa-exclamation-circle"></i> قيمة القسط </th>
                                        <th scope="col"><i class="fas fa-calendar-check"></i> تاريخ الدفع</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">قسط واحد</th>
                                        <td>1500 ريال سعودى</td>
                                        <td>15/6/2018</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">قسط  اثنين</th>
                                        <td>1500 ريال سعودى</td>
                                        <td>15/6/2018</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">قسط  ثلاث</th>
                                        <td>1500 ريال سعودى</td>
                                        <td>15/6/2018</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">قسط  اربع</th>
                                        <td>1500 ريال سعودى</td>
                                        <td>15/6/2018</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">قسط  خمسة</th>
                                        <td>1500 ريال سعودى</td>
                                        <td>15/6/2018</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">قسط  ستة</th>
                                        <td>1500 ريال سعودى</td>
                                        <td>15/6/2018</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">قسط  سبعة</th>
                                        <td>1500 ريال سعودى</td>
                                        <td>15/6/2018</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">قسط  سبعة</th>
                                        <td>1500 ريال سعودى</td>
                                        <td>15/6/2018</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php" ?>
