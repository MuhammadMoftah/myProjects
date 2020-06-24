$(document).ready(function () {

    function truncate_text() {
        //    === Make div square ===
        $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
        $(window).on('resize', function () {
            $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
        })
    }

    let keyword = '';
    let type = '';
    let url = '';

    $(document).on('keyup', '#search', function (e) {
        keyword = $.trim($('#search').val());
        type = $.trim(type);
        url = $.trim($('.filter-link').attr('data-href'));
        fetch_data();
    });

    $(document).on('click', '.filter-link', function (e) {
        e.preventDefault();
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        keyword = $.trim(keyword);
        type = $.trim($(this).attr('data-type'));
        url = $.trim($(this).attr('data-href'));
        fetch_data();
    });

    function fetch_data() {
        url = url + '?keyword=' + keyword + '&type=' + type;
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                $('.board_items').html(data);
                truncate_text();
            }
        });
    }

    truncate_text();
});