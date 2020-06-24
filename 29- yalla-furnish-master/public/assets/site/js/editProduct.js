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
                swal.fire("Oops!", "you can upload maximum 5 images", "error");
            }

            for (var i = 0; i < this.files.length; i++) {
                filesToUpload.push({ file: event.target.files[i], file_id: i });

                $('.images-preview').append('<div id="' + i + '" class="m-1 d-inline-block"><label style="cursor:pointer" class="uploadimg"><div class="close-overlay"><span data-id="' + i + '" class="btn btn-danger fas fa-trash-alt remove-img"></span></div>' +
                    '<img src="' + URL.createObjectURL(event.target.files[i]) + '" alt="">' + '</label></div>');
            }

            deleteImage();
        }
    });

    $(function () {
        $("input[type = 'submit']").click(function (e) {
            $('.loader').show();
            e.preventDefault();

            if (filesToUpload.length > 5) {
                e.preventDefault();
                alert("You are only allowed to upload a maximum of 5 files");
                return;
            }

            let categories = $("#categories").val();
            let style = $('#style').val();
            let price = $('#price').val();
            let color = $('#color').val();
            let material = $('#material').val();
            let upholstery = $('#upholstery').val();
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
            let discount = $('#discount').val();
            let valid_date = $('#datepicker').val();

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
            formData.append('branches', branches);
            formData.append('price', price);
            formData.append('others', others);
            formData.append('discount', discount);
            formData.append('valid_date', valid_date);

            if ($('#has_offer').is(":checked")) {
                formData.append('has_offer', 'has_offer');
            }

            if ($('#hidden_price').is(":checked")) {
                formData.append('hidden_price', 'hidden_price');
            }

            formData.append('branches', branches);
            branches.forEach(function (branch, index) {
                formData.append('branches[' + index + ']', branch);
            });

            formData.append('height', height);
            formData.append('width', width);
            formData.append('depth', depth);

            categories.forEach(function (category, index) {
                formData.append('categories[' + index + ']', category);
            });

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
            let url = $('#edit-product').attr('action');
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    let message = response.message;
                    error_holder.hide();
                    error_holder.html('');
                    success_holder.html(message);
                    success_holder.show();
                    $('.loader').hide();
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                }, error: function (error) {
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
        });
    });

});