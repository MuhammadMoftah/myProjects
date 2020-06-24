function readURL(input) {
    $('.old-imgs').html('');
    // console.log(input.files.length);
    // return;
    var files = input.files;
    if (files.length > 0) {
        Array.prototype.forEach.call(files, function (file) {
            if (input.files && file) {
                let img = document.createElement('img');
                img.height = 200;
                img.width = 200;
                img.id = file.name;

                let reader = new FileReader();
                reader.onload = function () {
                    $('.old-imgs').append('<div class="overlay">' +
                        '<img src="' + reader.result + '" alt="">' + '</div>');
                }

                reader.readAsDataURL(file);
            }
        });
    }
}

$("#ad_images").change(function () {
    readURL(this);
});