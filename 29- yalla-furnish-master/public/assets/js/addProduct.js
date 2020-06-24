$(document).ready(function () {

    let filesToUpload = [];

    function deleteImage() {
        $('.remove-img').click(function () {
            let imageId = $(this).attr('data-id');

            for (var i = 0; i < filesToUpload.length; ++i) {
                if (filesToUpload[i]['file_id'] == imageId) {
                    console.log(filesToUpload);
                    filesToUpload.splice(i, 1);
                    $("#" + imageId + "").remove();
                    console.log(filesToUpload);
                }
            }
        });
    }

    function resetForm() {
        $("input[type=text], textarea").val("");
        $("input[type=text]").val("");
        $("select").each(function () { this.selectedIndex = 0 });

        filesToUpload = [];
        $('.images-preview').html('');
    }

    $("#uploadimgs").on('change', function () {

        $('.images-preview').html('');

        if (this.files && this.files[0]) {

            if (this.files.length > 5) {
                alert('you can upload up to 5 images');
            }

            for (var i = 0; i < this.files.length; i++) {
                filesToUpload.push({ file: event.target.files[i], file_id: i });

                $('.images-preview').append('<div id="' + i + '" class="m-1 d-inline-block"><label style="cursor:pointer" class="uploadimg"><div class="close-overlay"><span class="btn delete_alert bg-red btn-circle waves-effect waves-circle waves-float remove-img" data-id="' + i + '"><i class="material-icons">delete</i></span></div>' +
                    '<img style="margin:20px;" height="100px" width="100px" src="' + URL.createObjectURL(event.target.files[i]) + '" alt="">' + '</label></div>');
            }

            deleteImage();
        }
    });

    $(".add-product").submit(function (e) {
        e.preventDefault();
        if (filesToUpload.length > 5) {
            alert("You are only allowed to upload a maximum of 5 files");
            e.preventDefault();
        } else {
            $('#create-product').prop("disabled", true);
            let categories = $("#categories").val();
            let style = $('#style').val();
            let price = $('#price').val();
            let color = $('#color').val();
            let material = $('#material').val();
            let upholstery = $('#upholstery').val();
            let showroom = $('#showroom').val();
            let arabic_name = $('#arabic_name').val();
            let english_name = $('#english_name').val();
            let arabic_description = $('#arabic_description').val();
            let english_description = $('#english_description').val();
            let others = $('#others').val();
            let branches = $('#branches').val();
            let guarantee = $('#guarantee').val();
            let height = $('#height').val();
            let width = $('#width').val();
            let depth = $('#depth').val();
            let country = $('#country').val();

            let images = [];

            filesToUpload.forEach((image) => {
                images.push(image.file);
            });

            var formData = new FormData();
            formData.append('name_en', english_name);
            formData.append('name_ar', arabic_name);
            formData.append('description_en', english_description);
            formData.append('description_ar', arabic_description);
            formData.append('country_id', country);
            formData.append('style_id', style);
            formData.append('material_id', material);
            formData.append('upholstery_id', upholstery);
            formData.append('price', price);
            formData.append('others', others);
            formData.append('price', price);
            formData.append('others', others);
            formData.append('showroom_id', showroom);

            if (branches) {
                branches.forEach(function (branch, index) {
                    formData.append('branches[' + index + ']', branch);
                });
            }

            formData.append('height', height);
            formData.append('width', width);
            formData.append('depth', depth);

            if (categories) {
                categories.forEach(function (category, index) {
                    formData.append('categories[' + index + ']', category);
                });
            }

            formData.append('color_id', color);
            formData.append('guarantee', guarantee);
            images.forEach(function (image, index) {
                formData.append('images[' + index + ']', image);
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let error_holder = $('.errors');
            let success_holder = $('.alert-success');
            let url = $(this).attr('action');

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#create-product').removeAttr("disabled");
                    let message = response.message;
                    let code = response.code;
                    if (code == 200) {
                        error_holder.hide();
                        error_holder.html('');
                        success_holder.html(message);
                        success_holder.show();
                        resetForm();
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                    } else {
                        let error_message = message;
                        success_holder.hide();
                        success_holder.html('');
                        error_holder.html('<strong>' + error_message + '</strong>');
                        error_holder.show();
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                    }
                }, error: function (error) {
                    $('#create-product').removeAttr("disabled");
                    let errors = error.responseJSON.errors;
                    var error_message;
                    success_holder.hide();
                    success_holder.html('');
                    if (errors != undefined && errors != null) {
                        error_message = errors[Object.keys(errors)[0]];
                        error_holder.html('<strong>' + error_message[0] + '</strong>');
                        error_holder.show();
                    } else {
                        error_message = "Something went wrong in uploading image";
                        error_holder.html('<strong>' + error_message + '</strong>');
                        error_holder.show();
                    }
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                }
            });
        }
    });
});