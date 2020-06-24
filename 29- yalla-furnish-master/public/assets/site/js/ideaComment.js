$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function resetForm() {
        $("input[type=text]").val("");
        $('.imagetoshow').hide();
    }
    
    $('.idea-comment-input').summernote({ 
        toolbar: false,
        popover: {
            image: [],
            link: [],
            air: []
        },
        placeholder: 'Write Comment ..',
    }); 

    $('.idea-comment-reply-input').summernote({ 
        toolbar: false,
        popover: {
            image: [],
            link: [],
            air: []
        },
        placeholder: 'Write reply ..',
    }); 

    $('#comment-edit-body').summernote({ 
        toolbar: false,
        popover: {
            image: [],
            link: [],
            air: []
        }  
    }); 

    $('#reply-edit-body').summernote({ 
        toolbar: false,
        popover: {
            image: [],
            link: [],
            air: []
        }  
    }); 
    

    function EditorstoreComment(form , commentElement) { 
        let url = $(form).attr('action'); 
        let commentText = $.trim( commentElement.text() );  
        let commentHtml = commentElement.html(); 
        var fileSelect = $("#uploadimg");   
      
        if (commentText === "" && !fileSelect[0].files[0]) {
            $('.loader').hide();
            return;
        }  
        let formData = new FormData();
        formData.append('comment', commentHtml);
        if (fileSelect[0].files && fileSelect[0].files.length == 1) {
            var file = fileSelect[0].files[0];
            formData.append('image', file);
        } 
        let error_holder = $('.errors');  
        $.ajax({
            url: url,
            type: "POST",
            data: formData, 
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false, 
            processData: false, 
            success: function (response) {
               
                var comment_data = response.comment;
                var comments_count = response.comment_counts;
                $("#imagetoshow").hide()
                var has_image = response.comment['has_image'];
                error_holder.hide();
                error_holder.html('');
                resetForm();
               
                if (has_image) { 
                  
                    var comment_image = '<a href="#" data-image="' + comment_data['image_url'] + '" role="button" class="d-block show-comment-image" data-toggle="modal">' +
                        '<img src="' + comment_data['image_url'] + '" style="width:auto;height:auto;max-width:70%;max-height:400px" class="mt-3 rounded" alt="" />' +
                        '</a>';
                } else {
                    var comment_image = '';
                }

                var comment = comment_data['comment'] != null ? comment_data['comment'] : '';

                let comment_div = '<div class="card comment my-3" id="comment-display-'+comment_data['id'] +'">' +
                    '<div class="card-header p-1 border-0">' +
                    '<figure style="background-image:url(' + comment_data['user_image'] + ')" class="img d-inline-block mr-2"></figure>' +
                    '<p class="font-weight-bold d-inline-block user-name">' + comment_data['user_name'] + '</p>' +
                      `    
                      <div class="text-muted float-right m-3">
                            ${comment_data['date']}
                            <div class="dropdown text-muted    m-2">
                                <button class="btn btn-outline-secondary py-0 px-1" type="button" data-toggle="dropdown">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu" >

                                    <a class="dropdown-item  fas fa-edit comment-edit-button" 
                                        data-type="edit" 
                                        data-id='${comment_data['id']}'  
                                        data-route="/idea/comment/${comment_data['id']}/edit"
                                        > Edit
                                    </a>

                                    <a class="dropdown-item  trash-link fas fa-trash-alt   comment-delete-action" 
                                        style="font-size:17px;" 
                                        title="Delete Comment" 
                                        data-type="delete" 
                                        data-comment='${comment_data['id']}'  
                                        data-route="/idea/comment/${comment_data['id']}/delete" 
                                        > Delete 
                                    </a>

                                </div>  
                            </div>
                        </div>
                    `    + 

                    '</div>' +
                    '<div class="card-header border-0 pl-5 py-3 bg-transparent">' +
                    '<div class="card-text comment-content-'+comment_data['id']+'">' + comment + '</div>' +
                    comment_image +
                    '</div>' +
                    '<div class="card reply my-2" style="border:none;" id="comment-replies-' + comment_data['id'] + '">' +
                    '</div>' +
                    '<div class="card-footer pl-5 border-0 text-muted p-2">' +
                    '<form class="myreply" action="' + comment_data['reply_url'] + '" method="POST" id="comment-reply-' + comment_data['id'] + '">' +
                    '<input id="reply-' + comment_data['id'] + '" tabindex="-1" type="text" class="form-control my-2 idea-comment-reply-input" placeholder="Add Reply ...">' +
                    '</form>' +
                    '<button data-href="' + comment_data['url'] + '" class="btn p-1 mr-2 comment-like-button" style="color: #939393;"><i class="fas fa-thumbs-up"></i> Like</button>' +
                    '<button class="btn p-1 mr-2 reply-btn" style="color: #939393;"><i class="fas fa-reply"></i> Reply</button>' +
                    '<p class="text-info float-right p-2 comment-replies-likes-' + comment_data['id'] + '">0 Likes | 0 Replies</p>' +
                    '</div>' +
                    '</div>';
                    comment_div
                $(".comments").append(comment_div);
                $('.idea-comment-reply-input').summernote({ 
                    toolbar: false,
                    popover: {
                        image: [],
                        link: [],
                        air: []
                    },
                    placeholder: 'Write reply ..',
                }); 
                $('.myreply .note-editable').keyup(function (e) { 
                    if(event.keyCode == 13 && !event.shiftKey) {   
                        e.preventDefault(); 
                        var form = $(this).parents('form:first'); 
                        EditorstoreReply(form, $(this)); 
                        this.innerHTML = " "; 
                    }
                });
                $('.comments_count').html('<i class="far fa-comment-dots"></i> Comment |' + comments_count);
                
                $('.loader').hide();
            }, error: function (error) {
                let errors = error.responseJSON.errors;
                let error_message = errors[Object.keys(errors)[0]];
                error_holder.html('<strong>' + error_message[0] + '</strong>');
                error_holder.show();
                $('.loader').hide();
                // $('html, body').animate({ scrollTop: 0 }, 'slow');
            }
        });
    }


     //  comment element 
    $('.mycomment .note-editable').keyup(function (e) {  
        if(event.keyCode == 13 && !event.shiftKey) {   
            e.preventDefault(); 
            var form = $(this).parents('form:first'); 
            EditorstoreComment(form, $(this)); 
            this.innerHTML = " "; 
        } 
    }); 


    // store reply
    function EditorstoreReply(reply_dev , replyElement) {
        $('.loader').show();
        let comment_number = reply_dev[0].id.match(/\d+/);
        let url = $(reply_dev[0]).attr('action');
        let id = comment_number[0];
        let replyText = replyElement.text();
        let replyHtml = replyElement.html()
        if (replyText === "") {
            $('.loader').hide();
            return;
        }
        let formData = new FormData();
        formData.append('reply', replyHtml);
        let error_holder = $('.errors');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                let reply_data = response.reply;
                let replies_count = response.replies_count;
                let likes_count = response.likes_count;
                error_holder.hide();
                error_holder.html('');
                resetForm();
                let reply_div = ' <div class="my-2"  id="reply-display-'+reply_data['id']+'"> <div class="card-header p-1 border-0" id="reply-display-'+reply_data['id']+'">' +
                    '<img style="height:50px;" src="' + reply_data['user_image'] + '" alt="" class="d-inline-block mr-2">' +
                    '<p class="font-weight-bold d-inline-block user-name">' + reply_data['user_name'] + '</p>' +
                    
                      `<div class="text-muted float-right m-3">
                                ${reply_data['date'] }
                                <div class="dropdown text-muted   m-2">
                                        <button class="btn btn-outline-secondary py-0 px-1" type="button" data-toggle="dropdown">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu" >

                                            <a  class="dropdown-item fas fa-edit reply-edit-action main-link" 
                                                data-route="/idea/reply/${reply_data['id']}/edit"
                                                data-type="edit" 
                                                data-id='${reply_data['id']}'>
                                                Edit
                                            </a>

                                            <a  class="dropdown-item fas fa-trash-alt reply-delete-action" 
                                                    tyle="font-size:17px;" 
                                                data-route="/idea/reply/${reply_data['id']}/delete"
                                                title="Delete reply" 
                                                data-type="delete" 
                                                data-reply='${reply_data['id']}' 
                                                data-id='${reply_data['id']}' >  
                                                Delete
                                            </a>

                    

                                        </div>  
                                </div>
                       </div>
                    ` +   '</div>' +
                    '<div class="card-header border-0 pl-5 py-3">' +
                    '<div class="card-text reply-content-' + reply_data['id'] +'">' + reply_data['reply'] + '</div>' +
                    '</div>' +
                    '<div class="card-footer pl-5 border-0 text-muted p-2">' +
                    '<button class="btn p-1 mr-2 reply-like-button" style="color: #939393;" data-href="' + reply_data['url'] + '"><i class="fas fa-thumbs-up"></i> Like</button>' +
                    '<p class="text-info float-right p-2" id="reply-likes-count-' + reply_data['id'] + '">0 Likes</p>' +
                    '</div> </div>';
                $("#comment-replies-" + comment_number[0] + "").append(reply_div);
                $('.comment-replies-likes-' + comment_number[0] + '').html(likes_count + ' Likes | ' + replies_count + ' Replies');
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
    }
 

    $('.myreply .note-editable').keyup(function (e) { 
        if(event.keyCode == 13 && !event.shiftKey) {   
            e.preventDefault(); 
            var form = $(this).parents('form:first'); 
            EditorstoreReply(form, $(this)); 
            this.innerHTML = " "; 
        }
    });

   
 
    // like comment
    $('body').on('click', '.comment-like-button', function (e) {
        button_dev = $(this);
        likeComment($(this));
    });

    function likeComment(button_dev) {
        let url = button_dev.attr('data-href');
        $('.loader').show();
        $.ajax({
            url: url,
            type: "GET",
            success: function (response) {
                let status = response.comment_like;
                let replies_count = response.replies_count;
                let likes_count = response.likes_count;
                let comment_id = response.comment_id;
                if (status != null) {
                    button_dev.html('<i class="fas fa-thumbs-up"></i> Like');
                } else {
                    button_dev.html('<i class="fas fa-thumbs-up"></i> Liked');
                }

                $('.comment-replies-likes-' + comment_id + '').html(likes_count + ' Likes | ' + replies_count + ' Replies');
                $('.loader').hide();
            }, error: function (error) {
                $('.loader').hide();
            }
        });
    }

    $(document).on('click', '.comment-edit-button', function (e) { 
        e.preventDefault()
        $(".comment-edit-modal .note-editable").html('')
        let href = $(this).attr('data-route'); 
        let id = $(this).attr('data-id');  
        let comment = $('.comment-content-' + id ).html();
        $(".comment-edit-modal .note-editable").html(comment)
        $("#comment-edit-modal form").attr('action', href)  
        $("#comment-edit-id").attr('value', id)  
        $("#comment-edit-modal").modal() 
    });


    $("#comment-edit-submit").click(function(e) { 
        e.preventDefault() 
        let id = $("#comment-edit-id").val() 
        let commentEditELement =  $(".comment-edit-modal .note-editable")
        let commentEditText = commentEditELement.text(); 
        let commentEditHtml = commentEditELement.html(); 
        let href = $("#comment-edit-form").attr('action'); 
        if($.trim(commentEditText)  === '') {
            if (  $(".comment-edit-alert").length ) {  return;     } 
            $("#comment-edit-form").append('<span class=" ml-2 alert-danger comment-edit-alert">"Please Fill The Comment Field"</span>')
            return;
        }   
        let actionData = { 
            commentId : id ,  
            comment : commentEditHtml
        }  
        $.ajax({
            url: href,
            type: "POST",
            data: actionData, 
            success: function (response) {   
                if ( !jQuery.isEmptyObject(response.data.comment) ) {
                    let commentElement = $('.comment-content-' + id )
                    commentElement.html(commentEditHtml)     
                    $("#comment-edit-modal").modal('toggle')
                } 

                if( !jQuery.isEmptyObject(response.errMessage) ) { 
                    if (  $(".comment-edit-alert").length ) {   $(".comment-edit-alert").remove()     } 
                    $("#comment-edit-form").append('<span class=" ml-2 alert-danger comment-edit-alert ">' +response.errMessage +'</span>')
                } else if (!jQuery.isEmptyObject(response.message)) {
                    $("#comment-edit-modal").modal('toggle')
                } 
               
            }, error: function (error) { 
                if (  $(".comment-edit-alert").length ) {   $(".comment-edit-alert").remove()     } 
                $("#comment-edit-form").append('<span class=" ml-2 alert-danger comment-edit-alert">"Edit Comment Failed"</span>')
            }
        });
        
    })

 

    $('body').on('click', '.reply-like-button', function (e) {
        button_dev = $(this);
        likeReply($(this));
    });

    function likeReply(button_dev) {
        let url = button_dev.attr('data-href');
        $('.loader').show();
        $.ajax({
            url: url,
            type: "GET",
            success: function (response) {
                let likes_counter = $("#reply-likes-count-" + response.reply + "");
                replies_count = response.likes_count;
                likes_counter.html('' + replies_count + ' Likes');
                let status = response.reply_like;
                if (status != null) {
                    button_dev.html('<i class="fas fa-thumbs-up"></i> Like');
                } else {
                    button_dev.html('<i class="fas fa-thumbs-up"></i> Liked');
                }
                $('.loader').hide();
            }, error: function (error) {
                 $('.loader').hide();
            }
        });
    }

    // more comments button - load 10 commets each time 
    $('.more_comment').click(function (e) {
        e.preventDefault();
        let show_div = $(this).attr('data-show');
        let key_show = $(this).attr('key-show');
        $(this).hide();
        $('.' + show_div).show();
        $('#' + key_show).show();
    });

    // more reply button - load 10 replies each time 
    $('.more_reply').click(function (e) {
        e.preventDefault();
        let show_div = $(this).attr('data-show');
        let key_show = $(this).attr('key-show');
        $(this).hide();
        $('.' + show_div).show();
        $('#' + key_show).show();
    });

    $('body').on('click', '.reply-btn', function (e) {
        $(this).parent().find('.myreply').fadeIn();
    });

    $('body').on('click', '.show-comment-image', function (e) {
        e.preventDefault();
         var image_src = $(this).attr('data-image');
        $('.comment-image').attr('src', image_src);
        $('.comment-image-modal').modal('show');
    });
});

// delete comment action 
// this will be live event due live-creating comments 
$(document).on('click', '.comment-delete-action', function (e) {
    e.preventDefault();
    let commentId = $(this).attr('data-comment');
    let commentParentKey = $(this).attr('data-key');
    let actionData = { 'commentId': commentId }
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
                     $('#comment-display-' + commentId).hide();
                },
                error: function (data) {
                 }
            });
        }
    });

});
// delete reply action 
// this will be live event due live-creating replies 
$(document).on('click', '.reply-delete-action', function (e) {
    e.preventDefault();
    let replytId = $(this).attr('data-reply');
    let replyParentKey = $(this).attr('data-key');
    let actionData = { 'replytId': replytId }
    let actionUrl = $(this).attr('data-route')
    Swal.fire({
        title: 'Are you sure , Delete reply?',
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
                    
                    $('#reply-display-' + replytId).hide();
                },
                error: function (data) {
               
                }
            });
        }
    });

});
 

// edit reply 
$(document).on('click', '.reply-edit-action', function (e) {
    e.preventDefault()
    let href = $(this).attr('data-route');
    let id = $(this).attr('data-id');
    // let reply = $(this).attr('data-reply');  
    let reply = $('.reply-content-' + id ).html()
    if (  $(".reply-edit-alert").length ) {   $(".reply-edit-alert").remove()     } 
    $(".reply-edit-modal .note-editable").html(reply)
    $("#reply-edit-modal form").attr('action', href)  
    $("#reply-edit-id").attr('value', id)  
    $("#reply-edit-modal").modal()


    // let replyId = $(this).attr('data-id');
    // let replyKey = $(this).attr('data-key');
    // let replyContentElement = $('.reply-content-' + replyId);
    // let actionUrl = $(this).attr('data-route');
 
    // Swal.fire({
    //     input: 'textarea',
    //     inputValue: replyContentElement.text(),
    //     inputAttributes: {
    //         'aria-label': 'Type your message here'
    //     },
    //     showCancelButton: true,
    //     showCancelButton: true,
    //     cancelButtonColor: '#898b8e'
    // }).then((data) => {
    //     if (!data.dismiss) {
    //         let replyNewContent = data.value;
    //         let actionData = {
    //             'reply': replyNewContent,
    //             'replyId': replyId
    //         }
    //         $.ajax({
    //             url: actionUrl,
    //             type: "POST",
    //             data: actionData,
    //             success: function (response) {
    //                 replyContentElement.html(replyNewContent);
    //             },
    //             error: function (error) {
    //                 console.log(error.responseText);
    //             }
    //         });
    //     }

    // })

});


$("#reply-edit-submit").click(function(e) { 
    e.preventDefault() 
    let id = $("#reply-edit-id").val() 
    let replyEditELement =  $(".reply-edit-modal  .note-editable")
    let replyEditText = replyEditELement.text()
    let replyEditHtml = replyEditELement.html()
    let href = $("#reply-edit-form").attr('action');  

    if($.trim(replyEditText)  === '') { 
        if (  $(".reply-edit-alert").length ) {  return;     } 
        $("#reply-edit-form").append('<span class=" ml-2 alert-danger reply-edit-alert">"Please Fill The Reply Field"</span>')
        return;
    }   
 
    let actionData = { 
        replyId : id ,  
        reply : replyEditHtml
    }  
   

    $.ajax({
        url: href,
        type: "POST",
        data: actionData, 
        success: function (response) {   
            if ( !jQuery.isEmptyObject(response.data.status)  ) {
                if (response.data.status === 'success') {
                    let replyElement = $('.reply-content-' + id ) 
                    replyElement.html(replyEditHtml)
                    $("#reply-edit-modal").modal('toggle')
                } else { 
                    if (  $(".reply-edit-alert").length ) {   $(".reply-edit-alert").remove()     } 
                    $("#reply-edit-form").append('<span class=" ml-2 alert-danger reply-edit-alert ">' + response.data.message +'</span>')
                }
                  
            } 

            if( !jQuery.isEmptyObject(response.data.errMessage) ) { 
                if (  $(".reply-edit-alert").length ) {   $(".reply-edit-alert").remove()     } 
                $("#reply-edit-form").append('<span class=" ml-2 alert-danger reply-edit-alert ">' + response.data.errMessage +'</span>')
            } 
            
        }, error: function (error) { 
            if ( $(".reply-edit-alert").length ) { $(".reply-edit-alert").remove() } 
            $("#reply-edit-form").append('<span class=" ml-2 alert-danger reply-edit-alert">"Edit Reply Failed"</span>')
        }
    });
    
})

$("#reply-edit-close").click(function(e) { 
    if (  $(".reply-edit-alert").length ) {  $(".reply-edit-alert").remove()  }    
})


