

// create reply
$('body').on('submit', '.submit-reply', function (e) {
    e.preventDefault();
    let url = $(this).attr('action');
    let repliableId = $.trim($(this).attr('data-targetId')); // comment id 
    let body = $.trim($("#reply-" + repliableId).val());// reply body 
    let type = $.trim($("#reply-type-" + repliableId).val());  // reply type 

    if (body === "") {
        $('.loader').hide();
        return;
    }
    $('.loader').show();
    console.log(repliableId)
    let formData = new FormData();
    formData.append('body', body);
    formData.append('repliableId', repliableId);
    formData.append('type', type);
    let error_holder = $('.errors');
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // console.log(response) 
            let container = $("#comment-replies-" + repliableId)
            $("#reply-" + repliableId).val('')
            container.prepend(response);
            $('.loader').hide();
        }, error: function (error) {
            let errors = error.responseJSON.errors;
            let error_message = errors[Object.keys(errors)[0]];
            error_holder.html('<strong>' + error_message[0] + '</strong>');
            error_holder.show();
            $('.loader').hide();
            $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
    });
});
// delete reply 
$('body').on('click', '.reply-delete-action', function (e) {
    e.preventDefault();
    let replytId = $(this).attr('data-reply');
    let actionData = { 'id': replytId }
    let actionUrl = $(this).attr('data-route')
    Swal.fire({
        title: 'Are you sure , Delete Reply?',
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
                    $('#reply-container-' + replytId).hide();
                    // $(this).closest('div[class^="comment"]').hide();
                },
                error: function (data) {
                    console.log(data.errors);
                }
            });
        }
    });

});
// edit reply 
$('body').on('click', '.reply-edit-action', function (e) {
    e.preventDefault();
    let replytId = $(this).attr('data-reply');
    let replyContentElement = $('#reply-content-' + replytId);
    let replyContentElementText = $.trim(replyContentElement.text());
    let actionUrl = $(this).attr('data-route')
    Swal.fire({
        input: 'textarea',
        inputValue: replyContentElementText,
        inputAttributes: {
            'aria-label': 'Type your message here'
        },
        showCancelButton: true,
        showCancelButton: true,
        cancelButtonColor: '#898b8e'
    }).then((data) => {
        if (!data.dismiss) {
            let replyNewContent = data.value;
            let actionData = {
                'body': replyNewContent,
                'id': replytId
            }
            $.ajax({
                url: actionUrl,
                type: "POST",
                data: actionData,
                success: function (response) {
                    // console.log()
                    replyContentElement.html(replyNewContent);
                }
                // , 
                // error: function (error) {
                // // console.log(error.responseText);
                // }
            });
        }

    })

});
// load more reply
$('body').on('click', '.more_reply', function (e) {
    e.preventDefault();
    let show_div = $(this).attr('data-show');
    $(this).hide();
    $('.' + show_div).show();
});
//  show reply text 
$('body').on('click', '.reply-btn', function (e) {
    $(this).parent().find('.myreply').fadeIn();
});

