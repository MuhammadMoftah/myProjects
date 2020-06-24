  $.ajaxSetup({
    cache: false,
    headers: {
        '_token': $('[name="csrf"]').val()
    },
    data: {
        '_token': $('[name="csrf"]').val()
    },
});


$(document).ready(function() {
    $(document).on('click', '[data-toggle="delete-row"]', function(e){
        e.preventDefault();
        var $this = $(this)
        $href = $this.attr('href');
        $method = $this.data('method');

        $message = $this.data('message');
        $confirm = confirm($message);
        if ($confirm == true) {
            $.ajax({
                url: $href,
                type: $method,
                dataType: 'JSON',
            })
            .done(function() {
                $this.parent().parent().hide(500);
            })
            .fail(function() {
                alert('Please Refresh page');
            })
            .always(function() {
                console.log("complete");
            });
        }
        return false;
    });
});
