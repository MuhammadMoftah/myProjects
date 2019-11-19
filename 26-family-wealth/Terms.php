<?php include "gold-header.php"; ?>

<!-- Masthead -->
<header class="masthead cover" style="background: linear-gradient(to bottom, rgba(92, 77, 66, .8) 0, rgba(92, 77, 66, .8) 100%), url(./images/terms.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-white font-weight-bold text-shadow">
                    Terms & Conditions
                </h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>


<div class="container">
    <section class="faq">
        <div class="terms">
            <p class="my-3 p-3 text-muted border shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas perspiciatis, minima, voluptatem incidunt hic vitae fugit illo voluptatibus. Quibusdam quos molestias ea eum necessitatibus perferendis fugit rem soluta assumenda. Possimus.
            </p>
            
            <p class="my-3 p-3 text-muted border shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas perspiciatis, minima, voluptatem incidunt hic vitae fugit illo voluptatibus. Quibusdam quos molestias ea eum necessitatibus perferendis fugit rem soluta assumenda. Possimus.
            </p>
            
            <p class="my-3 p-3 text-muted border shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas perspiciatis, minima, voluptatem incidunt hic vitae fugit illo voluptatibus. Quibusdam quos molestias ea eum necessitatibus perferendis fugit rem soluta assumenda. Possimus.
            </p>
            
            <p class="my-3 p-3 text-muted border shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas perspiciatis, minima, voluptatem incidunt hic vitae fugit illo voluptatibus. Quibusdam quos molestias ea eum necessitatibus perferendis fugit rem soluta assumenda. Possimus.
            </p>

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
