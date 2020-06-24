$(function () {
    $('.sweetalert').on('click', function () {
        var type = $(this).data('type');
        if (type === 'prompt') {
            showPromptMessage();
        }
    });
});