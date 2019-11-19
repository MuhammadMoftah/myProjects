<?php include "header-en.php" ?>
<div class="background" id="background2">
    <div class="overlay">
        <header class="header2 valign bg-img text-center" data-scroll-index="0" data-overlay-dark="5" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <div class="full-width text-center caption mt-30">
                        <h1 class="cd-headline clip">
                            <span class="blc">WE HAVE A TEAM SPECIALIZING IN</span>
                            <span class="cd-words-wrapper">
                              <b class="is-visible">THE DIGITAL QUALITY INDUSTRY

</b>
                              <b>Websites</b>
                              <b>Mobile Applications</b>
                            </span>
                        </h1>
                        <div class="row" style="margin-bottom: 30px;">
                            <div class="col-md-12">
                                <a href="" data-toggle="modal" data-target="#videomodal" class="butn butn-bord text-center">
                            <span><i class="fas fa-play-circle"></i> Company Video</span>
                        </a>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 40px;">
                            <div class="col-md-12">
                                <a href="https://play.google.com/store/apps/details?id=com.dtag.dtag" class="text-center" target="_blank">
                            <img src="../images/icon-google-play.png" >
                        </a>
                                <a href="" class="text-center" target="_blank">
                            <img src="../images/IHG_apple_batch.png" >
                        </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </header>
    </div>
</div>

<div class="modal fade" id="videomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/53xi0JQHQlI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe> </div>

        </div>
    </div>
</div>





<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.js"></script>

<script src="../js/bootstrap.min.js"></script>
<script src="../js/animated.headline.js"></script>
<script src="../js/jquery.stellar.min.js"></script>
<script src="../js/index.js"></script>
<script>
    var PageName = location.pathname.split('/').slice(-1)[0];
    console.log(PageName);
    $('a[href*=' + PageName + ']').parent().addClass('active');

</script>
</body>

</html>
