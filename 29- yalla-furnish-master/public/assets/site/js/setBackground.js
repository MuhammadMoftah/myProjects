$('#uploadImgs').on('change', function () {
    $('.loader').show();
    image = this.files[0];
    url = $(this).attr('upload-href');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let error_holder = $('.errors');

    var formData = new FormData();
    formData.append('image', image);

    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            window.location.href = response;
            $('.loader').hide();
            console.log(response);
        },
        error: function (error) {
            console.log(error);
            let errors = error.responseJSON.errors;
            let error_message = errors[Object.keys(errors)[0]];
            success_holder.hide();
            success_holder.html('');
            error_holder.html('<strong>' + error_message[0] + '</strong>');
            error_holder.show();
            $('.loader').hide();
            $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
    });

});