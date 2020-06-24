$(document).ready(function () {
    var rate = '';
    var url = '';

    $("#one-star").on('click', function () {
        if (rate != '') {
            return;
        }
        $("#two-star , #three-star , #four-star , #five-star").removeClass('fas');
        $("#two-star , #three-star , #four-star , #five-star").addClass('far');
        $("#one-star").addClass('fas');
        url = $(this).parent().attr('data-href');
        rate = 1;
        ProductReview();
        hideRate();
    });

    $("#two-star").on('click', function () {
        if (rate != '') {
            return;
        }
        $("#three-star , #four-star , #five-star").removeClass('fas');
        $("#three-star , #four-star , #five-star").addClass('far');
        $("#one-star,#two-star").addClass('fas');
        rate = 2;
        url = $(this).parent().attr('data-href');
        ProductReview();
        hideRate();
    });

    $("#three-star").on('click', function () {
        if (rate != '') {
            return;
        }
        $("#four-star , #five-star").removeClass('fas');
        $("#four-star , #five-star").addClass('far');
        $("#one-star,#three-star,#two-star").addClass('fas');
        rate = 3;
        url = $(this).parent().attr('data-href');
        ProductReview();
        hideRate();
    });

    $("#four-star").on('click', function () {
        if (rate != '') {
            return;
        }
        $("#five-star").removeClass('fas');
        $("#five-star").addClass('far');
        $("#one-star,#three-star,#two-star,#four-star").addClass('fas');
        rate = 4;
        url = $(this).parent().attr('data-href');
        ProductReview();
        hideRate();
    });

    $("#five-star").on('click', function () {
        if (rate != '') {
            return;
        }
        $("#one-star,#three-star,#two-star,#four-star,#five-star").addClass('fas');
        rate = 5;
        url = $(this).parent().attr('data-href');
        ProductReview();
        hideRate();
    });

    function hideRate() {
        $("#five-star").removeAttr('id');
        $("#four-star").removeAttr('id');
        $("#three-star").removeAttr('id');
        $("#two-star").removeAttr('id');
        $("#one-star").removeAttr('id');
    }

    function ProductReview() {
        $('.loader').show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: "POST",
            data: { rate: rate },
            success: function (response) {
                let message = response.message;
                $('.loader').hide();
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: message,
                    timer: 1500,
                    confirmButtonText: 'Done',
                    showLoaderOnConfirm: true,
                    confirmButtonColor: '#21d5de'
                });
            }, error: function (error) {
                $('.loader').hide();
                Swal.fire({
                    position: 'center',
                    type: 'warning',
                    title: 'SomeThing Went Wrong',
                    timer: 1500,
                    confirmButtonText: 'Close',
                    showLoaderOnConfirm: true,
                    confirmButtonColor: '#21d5de'
                });
            }
        });
    }


});