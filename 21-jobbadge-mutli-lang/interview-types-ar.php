<?php include 'header-ar.php';?>

<!--===== Interview Type =====-->
<!--===== Interview Type =====-->
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title"> Choose <span>Interview</span> Type</h2>
        </div>
    </div>

    <section class="interview-type py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6 text-center">
                    <button class="btn btn-danger part rounded-circle" data-toggle="modal" data-target=".live-modal">
                        <i class="fas fa-user-friends pb-3"></i>
                        <h3>Live Interview</h3>
                    </button>
                </div>

                <div class="col-md-6 text-center">
                    <button class="btn btn-info part rounded-circle" data-toggle="modal" data-target=".record-modal">
                        <i class="fas fa-headset pb-3"></i>
                        <h3>Record Interview</h3>
                    </button>
                </div>
            </div>
        </div>
        
          <!-- Record Interview Modal-->
    <div class="modal fade record-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Record Interview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="form-row">
                        <div class="form-group col-md-6">
                            <label>Start From</label>
                            <input type='text' class='form-control datepicker-here' data-language='en' />
                        </div>

                        <div class="form-group col-md-6">
                            <label>End Date</label>
                            <input type='text' class='form-control datepicker-here' data-language='en' />
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Q1</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Q2</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Q3</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>

            </div>
        </div>
    </div> <!-- End Modal -->

    <!-- Live Interview Modal-->
    <div class="modal fade live-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Live Interview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="form-row">
                        <div class="form-group col-md-6">
                            <label>Start From</label>
                            <input type='text' class='form-control datepicker-here' data-language='en' />
                        </div>

                        <div class="form-group col-md-6">
                            <label>End Date</label>
                            <input type='text' class='form-control datepicker-here' data-language='en' />
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>

            </div>
        </div>
    </div> <!-- End Modal -->
    </section>
</div>


<?php include 'footer-ar.php';?>
