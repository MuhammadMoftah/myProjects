<?php include "gold-header.php"; ?>

<!-- Masthead -->
<header class="masthead cover" style="background: linear-gradient(to bottom, rgba(92, 77, 66, .8) 0, rgba(92, 77, 66, .8) 100%), url(./images/wondering2.jpg);background-position: 40% 30% !important">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-white font-weight-bold text-shadow">
                    FAQ
                </h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>


<div class="container">
    <section class="faq">
        <div id="accordion">
            <div class="card">
                <div class="card-header p-0" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            This is a random question?
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-0" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                This is a random question?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-0" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                This is a random question?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>


<?php include "gold-footer.php"; ?>


<script>
    //Move on Click
    $("a ").click(function() {
        let x = $(this).attr('href');
        $("html, body").animate({
                scrollTop: $(x).offset().top - 70
            },
            1000
        );
    });

</script>
