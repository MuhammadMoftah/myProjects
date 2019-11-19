<?php include "gold-header.php"; ?>

<!-- Masthead -->
<header class="masthead cover" style="background: linear-gradient(to bottom, rgba(92, 77, 66, .8) 0, rgba(92, 77, 66, .8) 100%), url(./images/family8.jpg);background-position: 40% 30% !important">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-white font-weight-bold text-shadow">
                    My Books
                </h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>


<!--==== Books ===-->
<!--==== Books ===-->
<section class="page-section books">
    <div class="container">
        <h2 class=" mt-0 text-center"> My Books</h2>
        <hr class="divider my-4" />
        <div class="row justify-content-center">
            <a class="col-lg-4 col-md-6 text-center" data-toggle="modal" data-target="#BookModal">
                <div class="my-3">
                    <img src="images/book1.png" alt="">
                    <h3 class="h4 mb-2">Book Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>

            <a class="col-lg-4 col-md-6 text-center" data-toggle="modal" data-target="#BookModal">
                <div class="my-3">
                    <img src="images/book2.png" alt="">
                    <h3 class="h4 mb-2">Book Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>

            <a class="col-lg-4 col-md-6 text-center" data-toggle="modal" data-target="#BookModal">
                <div class="my-3">
                    <img src="images/book1.png" alt="">
                    <h3 class="h4 mb-2">Book Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>

            <a class="col-lg-4 col-md-6 text-center" data-toggle="modal" data-target="#BookModal">
                <div class="my-3">
                    <img src="images/book2.png" alt="">
                    <h3 class="h4 mb-2">Book Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>

            <a class="col-lg-4 col-md-6 text-center" data-toggle="modal" data-target="#BookModal">
                <div class="my-3">
                    <img src="images/book1.png" alt="">
                    <h3 class="h4 mb-2">Book Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>

            <a class="col-lg-4 col-md-6 text-center" data-toggle="modal" data-target="#BookModal">
                <div class="my-3">
                    <img src="images/book2.png" alt="">
                    <h3 class="h4 mb-2">Book Name</h3>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut iusto fugit sapiente praesentium aliquam.</p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Book Modal -->
<div class="modal fade bookmodal" id="BookModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Book Name</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <img src="images/book1.png" class="w-100" alt="">
                <p class="text-muted py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis delectus mollitia explicabo maxime numquam animi tempore, architecto, eligendi iusto porro nulla pariatur, quibusdam laudantium doloribus eaque dicta, aspernatur recusandae beatae.</p>
                
                <p class="text-muted py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis delectus mollitia explicabo maxime numquam animi tempore, architecto, eligendi iusto porro nulla pariatur, quibusdam laudantium doloribus eaque dicta, aspernatur recusandae beatae.</p>
                
                <p class="text-muted py-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis delectus mollitia explicabo maxime numquam animi tempore, architecto, eligendi iusto porro nulla pariatur, quibusdam laudantium doloribus eaque dicta, aspernatur recusandae beatae.</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a href="" class="btn btn-success">Download Book</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!--    ==== Contact Us ====-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Let's Get In Touch!</h2>
                <hr class="divider my-4">
                <p class="text-muted mb-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos laboriosam voluptas exercitationem, suscipit eaque odio unde autem dolor. Ex ducimus iste earum beatae eos harum aliquam quo velit sapiente!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                <div>+1 (202) 555-0149</div>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                <a class="d-block" href="mailto:email@email.com">email@email.com</a>
            </div>
        </div>
    </div>
</section>


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
