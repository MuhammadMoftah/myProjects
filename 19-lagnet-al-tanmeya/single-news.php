<?php include 'header.php' ?>

<!-- ===== Start The News Content Page ===== -->
<section class="NewsContent">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
          <div class="NewsContentHead py-5">
            <img src="images/slide-2.png" class="mx-auto d-block" alt="" title="الروابي تبرم اتفاقية مع خبراء المسؤولية الاجتماعية">
            <div class="NewFoot text-center">
              <h5>الروابي تبرم اتفاقية مع خبراء المسؤولية الاجتماعية</h5>
              <span>Posted By: <a href="#">Ruabi</a> </span>
              <span>16 Jun</span>
            </div>
          </div>
        </div>
    </div>
    <div class="NewsContentParag text-center">
      <h5> <strong>عقد الشراكة </strong></h5>
      <p>بين لجنة التنمية الاجتماعية الأهلية بحي الروابي ووزارة التعليم ممثلة في جامعة الإمام محمد بن سعود الاسلامية
        وذلك لتنظيم وتنفيذ حملة توعوية تثقيفية للتوعية بمخاطر العنف الأسري تحت شعار (كن لطيفًا) وذلك ضمن إطار مشاريع مبادرة تعزيز المسؤولية الاجتماعية للجامعات السعودية التي تشرف عليها وزارة التعليم.
      </p>
      <p>
        وقد وقع اختيار الفريق المكلف من جامعة الإمام محمد بن سعود الإسلامية على مركز التنمية الاجتماعية الأهلية بحي الروابي كأحد الأحياء المستهدفة لتنفيذ البرنامج؛ لما يتميز به المركز من نشاط وفعالية مما يسهم في بناء شراكة فاعلة تحقق أهداف المشروع.
      </p>
      <h5><strong>تاريخ التنفيذ</strong></h5>
      <p>الفصل الدراسي الثاني من العام الجامعي 1435 – 1436 هـ</p>
    </div>
  </div>
  <div class="PicsShow">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <a href="images/NewsContent1.jpg" data-fancybox="gallery" data-caption="ضع عنوان هنا">
            <img src="images/NewsContent1.jpg" class="mx-auto d-block" alt="">
          </a>
        </div>
        <div class="col-md-4 col-sm-6">
          <a href="images/NewsContent1.jpg" data-fancybox="gallery" data-caption="ضع عنوان هنا">
            <img src="images/NewsContent1.jpg" class="mx-auto d-block" alt="">
          </a>
        </div>
        <div class="col-md-4 col-sm-6">
          <a href="images/NewsContent1.jpg" data-fancybox="gallery" data-caption="ضع عنوان هنا">
            <img src="images/NewsContent1.jpg" class="mx-auto d-block" alt="">
          </a>
        </div>
        <div class="col-md-4 col-sm-6">
          <a href="images/NewsContent1.jpg" data-fancybox="gallery" data-caption="ضع عنوان هنا">
            <img src="images/NewsContent1.jpg" class="mx-auto d-block" alt="">
          </a>
        </div>
        <div class="col-md-4 col-sm-6">
          <a href="images/NewsContent1.jpg" data-fancybox="gallery" data-caption="ضع عنوان هنا">
            <img src="images/NewsContent1.jpg" class="mx-auto d-block" alt="">
          </a>
        </div>
        <div class="col-md-4 col-sm-6">
          <a href="images/NewsContent1.jpg" data-fancybox="gallery" data-caption="ضع عنوان هنا">
            <img src="images/NewsContent1.jpg" class="mx-auto d-block" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
      <div class="contact-page py-5 my-5">

          <div class="title">
              <h3 style=" text-align:right">
                  إترك لنا تعليق
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
                                        <label for="form_email">البريد الاكترونى</label>
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="من فضلك البريد الالكترونى" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="form_name"> الإسم</label>
                                          <input id="form_name" type="text" name="name" class="form-control" placeholder="من فضلك الاسم الاول " required="required" data-error="Firstname is required.">
                                          <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="form_message">التعليق</label>
                                          <textarea id="form_message" name="message" class="form-control" placeholder="اكتب التعليق هنا" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                          <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <input type="submit" class="btn btn-success btn-send" value="إرسال التعليق">
                                  </div>
                              </div>

                          </div>

                      </form>

                  </div>
              </div>
          </div>

      </div>
  </div>
</section>
<!-- ===== End The News Content Page ===== -->



<?php include 'footer.php' ?>
