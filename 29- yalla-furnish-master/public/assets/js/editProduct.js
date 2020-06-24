$("#uploadimgs").on('change', function () {
    $('.images-preview').html('');

    if (this.files && this.files[0]) {
        for (var i = 0; i < this.files.length; i++) {
            $('.images-preview').append('<div class="m-1 d-inline-block"><label style="cursor:pointer">' +
                '<img height="150px" width="150px" style="margin:5px;" src="' + URL.createObjectURL(event.target.files[i]) + '" alt="">' + '</label></div>');
        }
    }
});

$(function () {
    $("input[type = 'submit']").click(function (e) {
        var $fileUpload = $("#uploadimgs");
        if (parseInt($fileUpload.get(0).files.length) > 5) {
            e.preventDefault();
            alert("You are only allowed to upload a maximum of 5 files");
        }
    })
});