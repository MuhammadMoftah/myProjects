//  this file will be relate to Comment Action
$(document).ready(function () {
    console.log('fsfsd');
    // setup ajax request 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // more comments button - load 10 commets each time 
    $('body').on('click', '.more_comment', function (e) {
        e.preventDefault();
        let show_div = $(this).attr('data-show');
        $(this).hide();
        $('.' + show_div).show();
    });
    // reset form after submit 
    function resetForm() {
        $("input[type=text]").val("");
        $('.imagetoshow').hide();
    }
    // store form 
    $('body').on('submit', '.mycomment', function (e) {
        e.preventDefault();
        console.log('ffsdf');
        let url = $(this).attr('action');
        let id = $.trim($(this).attr('data-targetId'));
        let body = $.trim($("#comment-" + id).val());
        let type = $.trim($("#comment-type-" + id).val());
        if (body === "") {
            $('.loader').hide();
            return;
        }
        let formData = new FormData();
        formData.append('body', body);
        formData.append('comentableId', id);
        formData.append('type', type);
        var fileSelect = $("#upload-comment-image-" + id);
        if (fileSelect[0].files && fileSelect[0].files.length == 1) {
            var image = fileSelect[0].files[0];
            formData.append('image', image);
        }
        let error_holder = $('.errors-' + id);


        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                error_holder.hide();
                error_holder.html('');
                resetForm();
                let container = $("#comments-container-" + id)
                container.prepend(response);

                $('.loader').hide();
            }, error: function (response) {
                let errors = response.responseJSON.errors;
                let error_message = errors[Object.keys(errors)[0]];
                error_holder.html('<strong>' + error_message[0] + '</strong>');
                error_holder.show();
                $('.loader').hide();
                // $('html, body').animate({ scrollTop: 0 }, 'slow');
            }
        });
    });

});
// this will be live event due live-creating comments 
$('body').on('click', '.comment-delete-action', function (e) {
    e.preventDefault();
    let commentId = $(this).attr('data-comment');
    // let commentParentKey =  $(this).attr('data-key');
    let actionData = { 'id': commentId }
    let actionUrl = $(this).attr('data-route')
    Swal.fire({
        title: 'Are you sure , Delete Comment?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: actionData,
                success: function (data) {
                    Swal.fire(
                        'Done!',
                        'success'
                    )
                    $('#comment-container-' + commentId).hide();
                    // $(this).closest('div[class^="comment"]').hide();
                },
                error: function (data) {
                    console.log(data.errors);
                }
            });
        }
    });

});
// edit comment 
$('body').on('click', '.comment-edit-action', function (e) {
    e.preventDefault();
    let commentId = $(this).attr('data-comment');
    let commentContentElement = $('#comment-content-' + commentId);
    let commentContentElementText = $.trim(commentContentElement.text());
    let actionUrl = $(this).attr('data-route')
    Swal.fire({
        input: 'textarea',
        inputValue: commentContentElementText,
        inputAttributes: {
            'aria-label': 'Type your message here'
        },
        showCancelButton: true,
        showCancelButton: true,
        cancelButtonColor: '#898b8e'
    }).then((data) => {
        if (!data.dismiss) {
            let commentNewContent = data.value;
            let actionData = {
                'body': commentNewContent,
                'id': commentId
            }

            $.ajax({
                url: actionUrl,
                type: "POST",
                data: actionData,
                success: function (response) {
                    commentContentElement.html(commentNewContent);
                }
                // , 
                // error: function (error) {
                // // console.log(error.responseText);
                // }
            });
        }

    })

});
$('body').on('change', '.upload-comment-image', function (e) {
    e.preventDefault();
    let commentableID = $(this).attr('data-targetId')
    console.log($(this)[0].files[0])
    console.log(window.URL.createObjectURL($(this)[0].files[0]))
    $('#comment-upload-image-display-' + commentableID).attr('src', window.URL.createObjectURL($(this)[0].files[0]))
    $('#comment-upload-image-display-container-' + commentableID).show();
});

