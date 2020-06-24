$(document).ready(function () {

    $("#product-comment").click(function () {
        $("#comment").focus();
        $('.product-side-bar').scrollTop($('.product-side-bar')[0].scrollHeight);
    });

    // load more comments
    $('.more_comment').click(function (e) {
        e.preventDefault();
        let show_div = $(this).attr('data-show');
        let key_show = $(this).attr('key-show');
        $(this).hide();
        $('.' + show_div).show();
        $('#' + key_show).show();
    });

    // load more reply
    $('.more_reply').click(function (e) {
        e.preventDefault();
        let show_div = $(this).attr('data-show');
        let key_show = $(this).attr('key-show');
        $(this).hide();
        $('.' + show_div).show();
        $('#' + key_show).show();
    });

    // reset lthe form 
    function resetForm() {
        $("input[type=text]").val("");
    }

    $('.mycomment').submit(function (e) {
        e.preventDefault();
        let url = $(this).attr('action');
        let comment = $.trim($("#comment").val());
        var fileSelect = $("#uploadimg");

        if (comment === "" && !fileSelect[0].files[0]) {
            $('.loader').hide();
            return;
        }

        let formData = new FormData();
        formData.append('comment', comment);

        if (fileSelect[0].files && fileSelect[0].files.length === 1) {
            var file = fileSelect[0].files[0];
            formData.append('image', file);
        }

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
                var comment_data = response.comment;
                var comments_count = response.comments_count;
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

                let comment_div = '<div class="card my-2">' +
                    '<div class="card-header p-1">' +
                    '<img src="' + comment_data['user_image'] + '" alt="" class="d-inline-block"> ' +
                    '<p class="font-weight-bold d-inline-block"> ' + comment_data['user_name'] + '</p>' +
                    '<p class="text-muted float-right m-3">' + comment_data['date'] + '</p>' +
                    '</div>' +
                    '<div class="card-body p-2 py-3">' +
                    '<p class="card-text">' + comment + '</p>' +
                    comment_image +
                    '</div>' +
                    '<div id="comment-replies-' + comment_data['id'] + '">' +
                    '</div>' +
                    '<div class="card-footer text-muted p-2 ">' +
                    '<form data-commentId="' + comment_data['id'] + '" class="myreply" action="' + comment_data['reply_url'] + '" method="POST" id="comment-reply-' + comment_data['id'] + '">' +
                    '<input id="reply-' + comment_data['id'] + '" tabindex="-1" maxlength="180" type="text" class="form-control my-2 reply-input" placeholder="Add Reply ...">' +
                    '</form>' +
                    '<button data-href="' + comment_data['url'] + '" class="btn p-0 mt-2 mr-2 text-muted comment-like-button"><i class="fas fa-thumbs-up"></i> Like</button>' +
                    '<button class="btn p-0 mt-2 mr-2 reply-btn text-muted"><i class="fas fa-reply"></i> Reply</button>' +
                    '<p class="text-muted float-right p-2 comment-replies-likes-' + comment_data['id'] + '">0 Likes | 0 Replies</p>' +
                    '</div>' +
                    '</div>';
                $(".comments").append(comment_div);
                $('.product_comments_count').html(comments_count + ' Comments');
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
                console.log(error);
                $('.loader').hide();
            }
        });
    }

    // submit the comment reply
    $('#store-comment-reply').on('click', function (e) {
        e.preventDefault();
        $('.myreply').submit();
    });

    // store reply
    $('body').on('submit', '.myreply', function (e) {
        e.preventDefault();
        storeReply($(this));
    });

    // to fix add reply live
    $('body').on('keyup', '.reply-input', function (e) {
        var id = $(this).attr('id');
        $('#' + id + '').val($(this).val());
    });

    // store reply
    function storeReply(reply_dev) {
        $('.loader').show();
       
        let CommentID = reply_dev.attr('data-commentId');
        let comment_number = reply_dev[0].id.match(/\d+/);
        let url = $(reply_dev[0]).attr('action');
        let id = comment_number[0];
        let reply = $.trim($("#reply-" + id + "").val());
        if (reply === "") {
            $('.loader').hide();
            return;
        }
        let formData = new FormData();
        formData.append('reply', reply);
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
                let reply_div = '<div class="card reply my-2 ml-5">' +
                    '<div class="card-header p-1">' +
                    '<img src="' + reply_data['user_image'] + '" alt="" class="d-inline-block mr-2">' +
                    '<p class="font-weight-bold d-inline-block">' + reply_data['user_name'] + '</p>' +
                    '<p class="text-muted float-right m-2 pt-1">' + reply_data['date'] +
                    '<a class="fas fa-flag text-secondary" data-toggle="modal"' +
                    'data-target="#reportModal"></a>' +
                    '</p>' +
                    '</div>' +
                    '<div class="card-header border-0 pl-5 py-3">' +
                    '<p class="card-text">' + reply_data['reply'] + '</p>' +
                    '</div>' +
                    '<div class="card-footer pl-5 border-0 text-muted p-2 ">' +
                    '<button class="btn p-1 mr-2 text-muted reply-like-button"' +
                    'data-href="' + reply_data['url'] + '"><i class="fas fa-thumbs-up"></i> Like</button>' +
                    '<p class="text-muted float-right p-2" id="reply-likes-count-' + reply_data['id'] + '">0 Likes</p>' +
                    '</div>' +
                    '</div>'; 
                $("#comment-replies-" + CommentID + " ").append(reply_div);
                $('.comment-replies-likes-' + CommentID + '').html(likes_count + ' Likes | ' + replies_count + ' Replies');
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

    $('body').on('click', '.reply-btn', function (e) {
        $(this).parent().find('.myreply').fadeIn();
    });

    $('body').on('click', '.show-comment-image', function (e) {
        var image_src = $(this).attr('data-image');
        $('.comment-image').attr('src', image_src);
        $('.comment-image-modal').modal('show');
    });
});