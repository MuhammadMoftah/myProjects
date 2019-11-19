<?php include 'header.php' ?>

<!-- ===== Contact===== -->
<!-- ===== Contact===== -->
<div id="somecomponent" style="width: 100%; height: 600px;"></div>

<div class="container">
    <div class="contact-page py-5 my-5">

        <div class="title">
            <h3 style=" text-align:right">
                اترك لنا رسالة
            </h3>
        </div>


        <div class="contact-inner text-right">
            <div class="row">
                <div class="col-lg-12 ">

                    <form id="contact-form" method="post" action="contact.php" role="form">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">الاسم الاول</label>
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="من فضلك الاسم الاول " required="required" data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">الاسم الاخير</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="من فضلك الاسم الاخير" required="required" data-error="Lastname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">البريد الاكترونى</label>
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="من فضلك البريد الالكترونى" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">رقم التلفون</label>
                                        <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="من فضلك رقم التلفون">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">الرسالة</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="اكتب الرسالة هنا" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send" value="ارسل الرسالة">
                                </div>
                            </div>
                       
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>


<?php include 'footer.php' ?>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
<script src="js/locationpicker.jquery.js"></script>
<script>
    $('#somecomponent').locationpicker();

</script>
