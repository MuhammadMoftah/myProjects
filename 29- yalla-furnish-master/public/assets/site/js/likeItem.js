$(document).ready(function () {

    function like(button) {
        $('.loader').show();
        url = $(button).attr('data-href');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let error_holder = $('.errors');
        let that = button;
        $.ajax({
            url: url,
            type: "GET",
            success: function (response) {
                console.log(response);
                $('.loader').hide();
                let like = response.like;
                let type = response.type;

                // set like and liked button
                if (type != 'idea') {
                    if (like[0]) {
                        $(that).html('<i class="fas fa-thumbs-up"></i> Liked');
                    } else {
                        $(that).html('<i class="fas fa-thumbs-up"></i> Like');
                    }
                }

                // set likes counters for idea
                if (type == 'idea') {
                    var likes_count = response.like[1];
                    if (like[0]) {
                        $(that).html('<i class="fas fa-thumbs-up"></i> Liked | ' + likes_count);
                    } else {
                        $(that).html('<i class="fas fa-thumbs-up"></i> Like | ' + likes_count);
                    }
                }

                // set likes counters
                if (type == 'topic') {
                    var topic_id = response.item_id;
                    var likes_count = response.like[1];
                    $('#topic-likes-count-' + topic_id).html(likes_count + ' Likes');
                } else if (type == 'product') {
                    var product_id = response.item_id;
                    var likes_count = response.like[1];
                    $('#product-likes-count-' + product_id).html(likes_count + ' Likes');
                }
            },
            error: function (error) {
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

    }

    // like comment
    $('body').on('click', '.item-like', function (e) {
        e.preventDefault();
        like($(this));
    });
});