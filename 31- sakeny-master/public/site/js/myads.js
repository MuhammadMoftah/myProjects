$('button').click(function () {
    var link = $(this).attr('data-href');
    $(this).prop('disabled', true);
    window.location.replace(link);
});

$('input[type="checkbox"]').change(function () {
    var link = $(this).attr('data-href');
    $(this).prop('disabled', true);
    window.location.replace(link);
});