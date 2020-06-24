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
        $("#add_form")[0].reset();
        $('input:checkbox').prop("checked", false);

        filesToUpload = [];
        $('.old-imgs').html('');
    }

    $("#ad_images").on('change', function () {

        $('.old-imgs').html('');

        if (this.files && this.files[0]) {

            for (var i = 0; i < this.files.length; i++) {
                filesToUpload.push({ file: event.target.files[i], file_id: i });
                $('.old-imgs').append('<div id="' + i + '" class="m-1 d-inline-block"><label style="cursor:pointer" class="uploadimg"><div class="close-overlay"><span data-id="' + i + '" class="btn btn-danger fas fa-trash-alt remove-img"></span></div>' +
                    '<img style="width: 150px;height: 150px;margin-top: 5px;border-radius: 5px;position: static;" src="' + URL.createObjectURL(event.target.files[i]) + '" alt="">' + '</label></div>');
            }

            deleteImage();
        }
    });

    $(function () {
        $('#add_form').submit(function (e) {
            e.preventDefault();

            $('#preloader').show();

            let url = $(this).attr('action');
            let title = $('#title').val();
            let offer_type_id = $('#status').val();
            let property_type = $('#PropertyType').val();
            let agent = $('#agent').val();
            let city = $('#City').val();
            let district = $('#District').val();
            let finishing_level = $('#finishingLevel').val();
            let price = $('#unitPrice').val();
            let description = $('#unitDescribe').val();
            let building_year = $('#Buildingyear').val();
            let size = $('#CSize').val();
            let bedrooms_number = $('#BedroomsNo').val();
            let bathrooms_number = $('#bathroomsNo').val();
            let view_unit = $('#ViewUnit').val();
            let lat = $('#lat').val();
            let lng = $('#lng').val();
            let type = $('#type').val();
            let amenities = [];

            $("input:checkbox[name=amenities]:checked").each(function () {
                amenities.push($(this).val());
            });

            let images = [];

            filesToUpload.forEach((image) => {
                images.push(image.file);
            });

            var formData = new FormData();

            var form_data = $(this).serializeArray();
            form_data.forEach((e) => {
                if (e.name == 'latitude') {
                    formData.append('lat', e.value);
                } else if (e.name == 'longitude') {
                    formData.append('lng', e.value);
                }
            });

            formData.append('title', title);
            formData.append('offer_type_id', offer_type_id);
            formData.append('latitude', lat);
            formData.append('longitude', lng);
            formData.append('property_type_id', property_type);
            formData.append('agent', agent);
            formData.append('city_id', city);
            formData.append('district_id', district);
            formData.append('price', price);
            formData.append('level_of_finished_id', finishing_level);
            formData.append('description', description);
            formData.append('building_year', building_year);
            formData.append('size', size);
            formData.append('bedrooms_num', bedrooms_number);
            formData.append('bathrooms_num', bathrooms_number);
            formData.append('unit_view_id', view_unit);
            formData.append('amenities', amenities);
            formData.append('type', type);

            if ($('#negotiable').is(":checked")) {
                formData.append('price_negotiable', 'negotiable');
            } else {
                formData.append('price_negotiable', 'final');
            }

            if ($('#able_email').is(":checked")) {
                formData.append('able_email', 'true');
            }

            if ($('#able_call').is(":checked")) {
                formData.append('able_call', 'true');
            }

            if ($('#able_chat').is(":checked")) {
                formData.append('able_chat', 'true');
            }

            images.forEach(function (image, index) {
                formData.append('images[' + index + ']', image);
            });

            amenities.forEach(function (amenitie, index) {
                formData.append('amenities[' + index + ']', amenitie);
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let error_holder = $('.errors');
            let success_holder = $('.alert-success');

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    let code = response.code;
                    let message = response.message;
                    if (code == 200) {
                        error_holder.hide();
                        error_holder.html('');
                        success_holder.html(message);
                        success_holder.show();
                        resetForm();
                        $('#preloader').hide();
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                    } else {
                        success_holder.hide();
                        success_holder.html('');
                        error_holder.html(message);
                        error_holder.show();
                        $('#preloader').hide();
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                    }
                }, error: function (error) {
                    let errors = error.responseJSON;
                    let error_message = errors[Object.keys(errors)[0]];
                    success_holder.hide();
                    success_holder.html('');
                    error_holder.html('<strong>' + error_message[0] + '</strong>');
                    error_holder.show();
                    $('#preloader').hide();
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                }
            });
        });
    });

});