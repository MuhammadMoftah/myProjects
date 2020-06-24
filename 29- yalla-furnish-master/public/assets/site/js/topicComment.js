$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function resetForm() {
        $("input[type=text]").val("");
    } 

    // save the comment via editor
    function EditorstoreComment(form , commentElement) { 
        $('.loader').show();
        let topic_number = form[0]['id'].match(/\d+/); 
        let url = $(form).attr('action');
        let id = topic_number[0];
        let commentText = $.trim( commentElement.text() );  
        let commentHtml = commentElement.html(); 
         
    
        var fileSelect = $("#image-" + id + "");  
       
        if (commentText === "" && !fileSelect[0].files[0]) {
            $('.loader').hide();
            return;
        }  
        let formData = new FormData();
        formData.append('comment', commentHtml);
        if (fileSelect[0].files && fileSelect[0].files.length == 1) {  
            formData.append('image',  fileSelect[0].files[0]);
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
                var comments_count = response.comments_count;
 
                var has_image = response.comment['has_image'];
                error_holder.hide();
                error_holder.html('');
                resetForm();
                $("#imagetoshow-" + id + "").hide();  
                if (has_image) {
                    var comment_image = '<a href="#" data-image="' + comment_data['image_url'] + '" role="button" class="d-block show-comment-image" data-toggle="modal">' +
                        '<img src="' + comment_data['image_url'] + '" style="width:auto;height:auto;max-width:70%;max-height:400px" class="mt-3 rounded" alt="" />' +
                        '</a>';
                } else {
                    var comment_image = '';
                }

                var comment = comment_data['comment'] != null ? comment_data['comment'] : '';

                let comment_div = '<div class="card comment my-3" id="comment-container-'+ comment_data['id'] +'">' +
                    '<div class="card-header p-1 border-0 bg-transparent">' +
                    '<figure style="background-image:url(' + comment_data['user_image'] + ')" class="img d-inline-block mr-2"></figure>' +
                    '<p class="font-weight-bold d-inline-block">' + comment_data['user_name'] + '</p>' +
                        ' <div class="text-muted float-right ">'+
                                comment_data['date'] + 
                            '<div class="dropdown text-muted   m-2">' +
                                '<button class="btn btn-outline-secondary py-0 px-1" type="button" data-toggle="dropdown">' + 
                                '<i class="fas fa-ellipsis-h"></i> </button>' +     
                                '<div class="dropdown-menu" >' + 
                                    '<a class="dropdown-item edit-comment-button"' +
                                    'data-href="/topic-comment-edit" data-id="'+ comment_data['id'] +'"  data-comment="'+ comment_data['comment'] +'" > ' + 
                                    ' <i class="fas fa-edit"></i> Edit  </a>' + 
                                    `
                                    <a class="dropdown-item delete-comment-button" 
                                    data-href="/topic-comment-delete" 
                                        data-id="${comment_data['id']}" 
                                        >
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                    
                                    ` 
                                +'</div>'+ 
                            '</div> </div>' + 
                    '</div>' +
                    '<div class="card-header border-0 pl-5 py-3 bg-transparent">' +
                    '<div class="card-text " id="topic-comment-body-'+ comment_data['id'] +'">' + comment + '</div>' +
                    comment_image +
                    '</div >' +
                    '<div id="comment-replies-' + comment_data['id'] + '">' +
                    '</div>' +
                    '<div class="card-footer pl-5 border-0 text-muted p-2 ">' +
                    '<form class="myreply" action="' + comment_data['reply_url'] + '" method="POST" id="comment-reply-' + comment_data['id'] + '">' +
                    '<input id="reply-' + comment_data['id'] + '" tabindex="-1" maxlength="180" type="text" class="form-control my-2 topic-comment-reply-input" placeholder="Add Reply ...">' +
                    '</form>' +
                    '<button class="btn p-1 mr-2 comment-like-button" style="color: #939393;" data-href="' + comment_data['url'] + '"><i class="fas fa-thumbs-up"></i> Like</button>' +
                    '<button class="btn p-1 mr-2 reply-btn" style="color: #939393;"><i class="fas fa-reply"></i> Reply</button>' +
                    '<p class="text-info float-right p-2 comment-replies-likes-' + comment_data['id'] + '">0 Likes | 0 Replies</p>' +
                    '</div>' +
                    '</div >';
                $("#topic-" + topic_number + "").append(comment_div);
                $('.topic-comment-reply-input').summernote({ 
                    toolbar: false,
                    popover: {
                        image: [],
                        link: [],
                        air: []
                    },
                    placeholder: 'Write Reply ..',
                }); 
                $('#topic-comments-count-' + topic_number + '').html(comments_count + ' Comments');
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
    // $('.mycomment .note-editable').keyup(function (e)
    //  comment element 
    $(document).on('keyup',  '.mycomment .note-editable' ,function (e) {  
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
                let reply_div = '<div class="card reply my-2" id="reply-container-'+ reply_data['id'] +'">'  +
                    '<div class="card-header p-1 border-0">' +

                        '<figure style="background-image:url(' + reply_data['user_image'] + ')" class="img d-inline-block mr-2"></figure>' +

                        '<p class="font-weight-bold d-inline-block">' + reply_data['user_name'] + '</p>' + 
                        ' <div class="text-muted float-right ">'+ 
                        reply_data['date'] +
                        '<div class="dropdown text-muted   m-2">' +
                            '<button class="btn btn-outline-secondary py-0 px-1" type="button" data-toggle="dropdown">' + 
                            '<i class="fas fa-ellipsis-h"></i> </button>' +     
                            '<div class="dropdown-menu" >' + 
                                '<a class="dropdown-item edit-reply-button"' +
                                '   data-href="/topic-comment-reply-edit"     data-id="'+ reply_data['id'] +'"  data-reply="'+reply_data['reply'] +'" > ' + 
                                ' <i class="fas fa-edit"></i> Edit  </a>' +

                                  `
                                  <a class="dropdown-item delete-reply-button" 
                                    data-href="topic-comment-reply-delete" 
                                    data-id="${reply_data['id']}" 
                                    >
                                    <i class="fas fa-trash"></i> Delete
                                    </a> 
                                  `  

                                +
                            '</div>'+
                        '</div> </div>'+ 
                    '</div>' +
                    '<div class="card-header border-0 pl-5 py-3">' +
                    '<div class="card-text" id="topic-reply-body-'+ reply_data['id'] +'">' + reply_data['reply'] + '</div>' +
                    '</div>' +
                    '<div class="card-footer pl-5 border-0 text-muted p-2 ">' +
                    '<button class="btn p-1 mr-2 reply-like-button" data-href="' + reply_data['url'] + '"><i class="fas fa-thumbs-up"></i> Like</button>' +
                    '<p class="text-muted float-right p-2" id="reply-likes-count-' + reply_data['id'] + '">0 Likes</p>' +
                    '</div>' +
                    '</div>';
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
    //  comment element 
    $(document).on('keyup',  '.myreply .note-editable' ,function (e) { 
        if(event.keyCode == 13 && !event.shiftKey) {   
            e.preventDefault(); 
            var form = $(this).parents('form:first'); 
            EditorstoreReply(form, $(this)); 
            this.innerHTML = " "; 
        }
    });
     

    $(document).on('click', '.edit-comment-button' , function (e) { 
        e.preventDefault()
        let href = $(this).attr('data-href');
        let id = $(this).attr('data-id');
        let comment = $('#topic-comment-body-' + id).html(); 
        if (  $(".comment-edit-alert").length ) { $(".comment-edit-alert").remove() }  
        $(".comment-edit-modal .note-editable").html(comment)
        $("#comment-edit-modal form").attr('action', href)  
        $("#comment-edit-id").attr('value', id)  
        $("#comment-edit-modal").modal()
    }) 

    $(document).on('click', '.delete-comment-button' , function (e) { 
        e.preventDefault()
        let href = $(this).attr('data-href');
        let id = $(this).attr('data-id'); 
        let actionData = { 
            id : id , 
        }
      

        Swal.fire({ 
            title: 'Are you sure , Delete Comment?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            console.log('pl')
            if (result.value) { 
                $.ajax({
                    type: "POST",
                    url: href,
                    data: actionData,
                    success: function(response) { 
                        if ( !jQuery.isEmptyObject(response.message) ) { 
                            Swal.fire(
                                'Done!', 
                                'success'
                            )
                            $('#comment-container-' + id).hide(); 
                        } 
        
                        if( !jQuery.isEmptyObject(response.errMessage) ) { 
                            Swal.fire(
                                'Error!', 
                                response.errMessage
                            )
                        }      
                    },
                    error: function(data) {
                        Swal.fire(
                            'Error!', 
                            'Deleting Failed'
                        )
                    }
                });
            } 
        });


        
    }) 
    

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
            id : id ,  
            comment : commentEditHtml
        }  
        $.ajax({
            url: href,
            type: "POST",
            data: actionData, 
            success: function (response) {   
                if ( !jQuery.isEmptyObject(response.comment) ) {
                    let commentElement = $('#topic-comment-body-' + id )
                    commentElement.html(commentEditHtml)     
                    
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

    $("#comment-edit-close").click(function(e) { 
        if (  $(".comment-edit-alert").length ) {  $(".comment-edit-alert").remove()  }    
    }) 
 
    $(document).on('click', '.edit-reply-button', function (e) { 
        e.preventDefault()
        let href = $(this).attr('data-href');
        let id = $(this).attr('data-id');
        let reply = $("#topic-reply-body-" + id).html()
        // let reply = $(this).attr('data-reply');  
        $(".reply-edit-modal .note-editable").html(reply)
        $("#reply-edit-modal form").attr('action', href)  
        $("#reply-edit-id").attr('value', id)  
        $("#reply-edit-modal").modal()
    }) 

    $(document).on('click', '.delete-reply-button' , function (e) { 
        e.preventDefault()
        let href = $(this).attr('data-href');
        let id = $(this).attr('data-id'); 
        let actionData = { 
            id : id , 
        } 
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
                    url: href,
                    data: actionData,
                    success: function(response) { 
                        if ( !jQuery.isEmptyObject(response.message) ) { 
                            Swal.fire(
                                'Done!', 
                                'success'
                            )
                            $('#reply-container-' + id).hide(); 
                        } 
        
                        if( !jQuery.isEmptyObject(response.errMessage) ) { 
                            Swal.fire(
                                'Error!', 
                                response.errMessage
                            )
                        }      
                    },
                    error: function(data) {
                        Swal.fire(
                            'Error!', 
                            'Deleting Failed'
                        )
                    }
                });
            } 
        });


        
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
            id : id ,  
            reply : replyEditHtml
        }  
       

        $.ajax({
            url: href,
            type: "POST",
            data: actionData, 
            success: function (response) {   
                if ( !jQuery.isEmptyObject(response.reply) ) {
                    let replyElement = $('#topic-reply-body-' + id )
                    replyElement.html(replyEditHtml) 
                    replyEditELement.html('')
                } 

                if( !jQuery.isEmptyObject(response.errMessage) ) { 
                    if (  $(".reply-edit-alert").length ) {   $(".reply-edit-alert").remove()     } 
                    $("#reply-edit-form").append('<span class=" ml-2 alert-danger reply-edit-alert ">' + response.errMessage +'</span>')
                } else if (!jQuery.isEmptyObject(response.message)) {
                    $("#reply-edit-modal").modal('toggle')
                } 
                
            }, error: function (error) { 
                if ( $(".reply-edit-alert").length ) { $(".reply-edit-alert").remove() } 
                $("#reply-edit-form").append('<span class=" ml-2 alert-danger reply-edit-alert">"Edit Reply Failed"</span>')
            }
        });
        
    });

    $("#reply-edit-close").click(function(e) { 
        if (  $(".reply-edit-alert").length ) {  $(".reply-edit-alert").remove()  }    
    })

    // like comment
    $('body').on('click', '.comment-like-button', function (e) {
        $('.loader').show();
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
                    button_dev.addClass('main-link2');
                    button_dev.html('<i class="fas fa-thumbs-up"></i> Liked');
                }

                $('.comment-replies-likes-' + comment_id + '').html(likes_count + ' Likes | ' + replies_count + ' Replies');
                $('.loader').hide();
            }, error: function (error) {
                console.log(error);
                $('.loader').hide();
            }
        });
    } 

    // like reply
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
                    button_dev.html('<i class="fas fa-thumbs-up" style="color:var(--clr1)"></i> Liked');
                }
                $('.loader').hide();
            }, error: function (error) {
                console.log(error);
                $('.loader').hide();
            }
        });
    }

    function moreComments(link) {
        let show_div = $(link).attr('data-show');
        let key_show = $(link).attr('key-show');
        $(link).hide();
        $('.' + show_div).show();
        $('#' + key_show).show();
    }

    function moreReplies(link) {
        let show_div = $(link).attr('data-show');
        let key_show = $(link).attr('key-show');
        $(link).hide();
        $('.' + show_div).show();
        $('#' + key_show).show();
    }

    $('body').on('click', '.more_comment', function (e) {
        e.preventDefault();
        moreComments($(this));
    });

    $('body').on('click', '.more_reply', function (e) {
        e.preventDefault();
        moreReplies($(this));
    });

    $('body').on('click', '.reply-btn', function (e) {
        $(this).parent().find('.myreply').fadeIn();
    });

    $('body').on('click', '.show-comment-image', function (e) {
        var image_src = $(this).attr('data-image');
        $('.comment-image').attr('src', image_src);
        $('.comment-image-modal').modal('show');
    });

});