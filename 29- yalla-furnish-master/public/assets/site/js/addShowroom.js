$(document).ready(function () {

    let logo = '';

    let cover = '';

    function deleteImage() {
        $('.remove-logo').click(function () {
            $('.logo-preview').html("");
            logo = '';
        });
    }
    function deleteCover() {
        $('.remove-cover').click(function () {
            $('.cover-preview').html("");
            cover = '';
        });
    }

    function resetForm() {
        $("input[type=text], textarea").val("");
        $("input[type=text]").val("");
        $("select").each(function () { this.selectedIndex = 0 });

        $('.logo-preview').html('');
        $('.cover-preview').html('');
    }

    $('#uploadlogo').on('change', function () {
        $('.logo-preview').append('<div class="m-1 d-inline-block"><label style="cursor:pointer" class="uploadimg"><div class="close-overlay"><span class="btn btn-danger fas fa-trash-alt remove-logo"></span></div>' +
            '<img src="' + URL.createObjectURL(event.target.files[0]) + '" alt="">' + '</label></div>');
        logo = this.files[0];
        deleteImage();
    });

    $('#uploadcover').on('change', function () {
        $('.cover-preview').append('<div class="m-1 d-inline-block"><label style="cursor:pointer" class="uploadimg"><div class="close-overlay"><span class="btn btn-danger fas fa-trash-alt remove-cover"></span></div>' +
            '<img src="' + URL.createObjectURL(event.target.files[0]) + '" alt="">' + '</label></div>');
        cover = this.files[0];
        deleteCover();
    });

    $(function () {
        $("#create-showroom-btn").click(function (e) {
            e.preventDefault();

            $('.loader').show();
            let showroom_id = '';
            let url = $('#create-showroom').attr('action');
            let arabic_name = $('#name_ar').val();
            let slug = $('#slug').val();
            let english_name = $('#name_en').val();

            let contact_email = $('#contact_email').val();
            let phone = $('#phone').val();
            let contact_name = $('#contact_name').val();

            let about = $('#about').val();
            let title = $('#branch_title').val();
            let city = $('#city').val();
            let district = $('#district').val();
            let facebook = $('#facebook').val();
            let twitter = $('#twitter').val();
            let youtube = $('#youtube').val();
            let instgram = $('#instgram').val();
            let website = $('#website').val();
            let address_en = $('#new_address_en').val();
            let address_ar = $('#new_address_ar').val();
            let mob1 = $('#new_mob1').val();
            let mob2 = $('#new_mob2').val();
            let lat = $('#lat').val();
            let lng = $('#lng').val();
            let branch_city = $('#branch_city').val();
            let branch_district = $('#branch_districts #district').val();

            var formData = new FormData();

            if ($('#new_sunday').is(":checked")) {
                formData.append('sunday', 'sunday');
                let working_from = $('#working_from_sunday').val();
                let working_to = $('#working_to_sunday').val();
                formData.append('working_from_sunday', working_from);
                formData.append('working_to_sunday', working_to);
            }

            if ($('#new_monday').is(":checked")) {
                formData.append('monday', 'monday');
                let working_from = $('#working_from_monday').val();
                let working_to = $('#working_to_monday').val();
                formData.append('working_from_monday', working_from);
                formData.append('working_to_monday', working_to);
            }

            if ($('#new_tuesday').is(":checked")) {
                formData.append('tuesday', 'tuesday');
                let working_from = $('#working_from_tuesday').val();
                let working_to = $('#working_to_tuesday').val();
                formData.append('working_from_tuesday', working_from);
                formData.append('working_to_tuesday', working_to);
            }

            if ($('#new_wednesday').is(":checked")) {
                formData.append('wednesday', 'wednesday');
                let working_from = $('#working_from_wednesday').val();
                let working_to = $('#working_to_wednesday').val();
                formData.append('working_from_wednesday', working_from);
                formData.append('working_to_wednesday', working_to);
            }

            if ($('#new_thursday').is(":checked")) {
                formData.append('thursday', 'thursday');
                let working_from = $('#working_from_thursday').val();
                let working_to = $('#working_to_thursday').val();
                formData.append('working_from_thursday', working_from);
                formData.append('working_to_thursday', working_to);
            }

            if ($('#new_saturday').is(":checked")) {
                formData.append('saturday', 'saturday');
                let working_from = $('#working_from_saturday').val();
                let working_to = $('#working_to_saturday').val();
                formData.append('working_from_saturday', working_from);
                formData.append('working_to_saturday', working_to);
            }

            if ($('#new_friday').is(":checked")) {
                formData.append('friday', 'friday');
                let working_from = $('#working_from_friday').val();
                let working_to = $('#working_to_friday').val();
                formData.append('working_from_friday', working_from);
                formData.append('working_to_friday', working_to);
            }

            formData.append('name_en', english_name);
            formData.append('name_ar', arabic_name);
            formData.append('slug', slug);
            formData.append('about', about);
            formData.append('title', title);
            formData.append('district_id', district);
            formData.append('city_id', city);
            formData.append('showroom_image', logo);
            formData.append('background_image', cover);
            formData.append('twitter', twitter);
            formData.append('facebook', facebook);
            formData.append('youtube', youtube);
            formData.append('website', website);
            formData.append('instgram', instgram);
            formData.append('address_en', address_en);
            formData.append('address_ar', address_ar);
            formData.append('mob1', mob1);
            formData.append('mob2', mob2);
            formData.append('lat', lat);
            formData.append('lang', lng);
            formData.append('branch_city', branch_city);
            formData.append('branch_district', branch_district);

            formData.append('contact_email', contact_email);
            formData.append('contact_name', contact_name);
            formData.append('phone', phone);

            $('.style-checkbox:checkbox:checked').each(function (index, style) {
                var style = $(this).attr('data-id');
                formData.append('styles[' + index + ']', style);
            });

            $('.category-checkbox:checkbox:checked').each(function (index, category) {
                var category = $(this).attr('data-id');
                formData.append('categories[' + index + ']', category);
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
                    console.log(response)
                    resetFormErro();
                    let message = response.message;
                    showroom_id = response.showroom_id;
                    $("#showroom_id").val(showroom_id);
                    error_holder.hide();
                    error_holder.html('');
                    success_holder.html(message);
                    success_holder.show();
                    resetForm();
                    $('.loader').hide();
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                    $('#showroomModal').modal('toggle');
                    $('#showroomModal').modal('show');
                },
                error: function (error) {
                    console.log(error)
                    resetFormErro();
                    handleError(error.responseJSON.errors)
                    let errors = error.responseJSON.errors;
                    let error_message = errors[Object.keys(errors)[0]];
                    error_holder.show();
                    error_holder.html('<strong>' + error_message[0] + '</strong>');
                    $('.loader').hide();
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                }
            });
        });
    });
    $("#create-showroom-info input[type = 'submit']").click(function (e) {
        e.preventDefault();
        let phone = $('#phone').val();
        let email = $('#email').val();
        if (phone != null && email != null) {
            let showroom_id = $('#showroom_id').val();

            var formData1 = new FormData();
            formData1.append('phone', phone);
            formData1.append('email', email);
            formData1.append('showroom_id', showroom_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/add/info",
                type: "POST",
                data: formData1,
                processData: false,
                contentType: false,
                success: function (response) {
                    window.location.replace("/");
                }

            });
        }

    })

    $("#create-showroom-info-skip").click(function (e) {
        window.location.replace("/");
    });

    // safwat code
    function handleError(error) {
        let pertent = ["styles", "categories"]
        for (let name_filed of Object.keys(error)) {
            let cacheField = $(`input[name="${name_filed}"] , select[name="${name_filed}"] `);
            if (pertent.includes(name_filed)) {
                if (name_filed == "categories") {
                    cacheField = $("#categories")
                }
                cacheField.siblings("button").addClass("custm-error")
                continue;
            }
            cacheField.addClass("error-valid");;
        }
    }
    function resetFormErro() {
        $(".error-valid").removeClass("error-valid").removeClass("custm-error")
    }
});