$(document).ready(function () {

    let logo = '';

    let cover = '';
    $("#deleteImage").on('click', function () {
        $('#logo-preview').css('background-image', 'url()');
        logo = '';

    })
    $("#deleteCover").on('click', function () {
        $('#cover-preview').css('background-image', 'url()');
        cover = '';
    })
    function resetForm() {
        $("input[type=text], textarea").val("");
        $("input[type=text]").val("");
        $("select").each(function () { this.selectedIndex = 0 });

        $('.logo-preview').html('');
        $('.cover-preview').html('');
    }
    $('#uploadlogo').on('change', function () {
        $('#logo-preview').css('background-image', 'url(' + URL.createObjectURL(event.target.files[0]) + ')');
        logo = this.files[0];
    });
    $('#uploadcover').on('change', function () {
        $('#cover-preview').css('background-image', 'url(' + URL.createObjectURL(event.target.files[0]) + ')');
        cover = this.files[0];
    });


    $('#add_new_branch').click(function (e) {
        e.preventDefault();
        $('.loader').show();

        let title = $('#titleCreated').val();
        let address_en = $('#new_address_en').val();
        let address_ar = $('#new_address_ar').val();
        let mob1 = $('#new_mob1').val();
        let mob2 = $('#new_mob2').val();
        let branch_city = $('#branch_city').val();
        let branch_district = $('#branch_districts #district').val();
        let lat = $('#new_lat').val();
        let lng = $('#new_lng').val();

        var formData = new FormData();
        formData.append('title', title);
        formData.append('address_en', address_en);
        formData.append('address_ar', address_ar);
        formData.append('mob1', mob1);
        formData.append('mob2', mob2);
        formData.append('lat', lat);
        formData.append('lang', lng);
        formData.append('branch_city', branch_city);
        formData.append('branch_district', branch_district);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let error_holder = $('.errors');
        let success_holder = $('.alert-success');
        let url = $(this).parents('form:first').attr('action');

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
        // console.log(formData.title + formData.address_en + formData.address_ar ) 

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                let message = response.message;
                error_holder.hide();
                error_holder.html('');
                success_holder.html(message);
                success_holder.show();
                $('.loader').hide();
                $('html, body').animate({ scrollTop: 0 }, 'slow');
                setTimeout(function () {
                    location.reload();
                }, 1500);
            },
            error: function (error) {
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

    $('.update-branch').click(function (e) {
        $('.loader').show();
        e.preventDefault();
        let url = $(this).attr('data-href');

        var branch = url.match(/\d+$/);

        let title = $('#title_' + branch[0] + '').val();
        let address_en = $('#address_en_' + branch[0] + '').val();
        let address_ar = $('#address_ar_' + branch[0] + '').val();
        let mob1 = $('#mob1_' + branch[0] + '').val();
        let mob2 = $('#mob2_' + branch[0] + '').val();
        let lat = $('#lat_' + branch[0] + '').val();
        let lng = $('#lng_' + branch[0] + '').val();
        let branch_city = $('#branch_city_' + branch[0] + '').val();
        let branch_district = $('#branch_districts_' + branch[0] + ' #district').val()

        var formData = new FormData();
        formData.append('title', title);
        formData.append('address_en', address_en);
        formData.append('address_ar', address_ar);
        formData.append('mob1', mob1);
        formData.append('mob2', mob2);
        formData.append('lat', lat);
        formData.append('lang', lng);
        formData.append('branch_city', branch_city);
        formData.append('branch_district', branch_district);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let error_holder = $('.errors');
        let success_holder = $('.alert-success');

        if ($('#sunday_' + branch[0] + '').is(":checked")) {
            formData.append('sunday', 'sunday');
            let working_from = $('#working_from_sunday_' + branch[0] + '').val();
            let working_to = $('#working_to_sunday_' + branch[0] + '').val();
            formData.append('working_from_sunday', working_from);
            formData.append('working_to_sunday', working_to);
        }

        if ($('#monday_' + branch[0] + '').is(":checked")) {
            formData.append('monday', 'monday');
            let working_from = $('#working_from_monday_' + branch[0] + '').val();
            let working_to = $('#working_to_monday_' + branch[0] + '').val();
            formData.append('working_from_monday', working_from);
            formData.append('working_to_monday', working_to);
        }

        if ($('#tuesday_' + branch[0] + '').is(":checked")) {
            formData.append('tuesday', 'tuesday');
            let working_from = $('#working_from_tuesday_' + branch[0] + '').val();
            let working_to = $('#working_to_tuesday_' + branch[0] + '').val();
            formData.append('working_from_tuesday', working_from);
            formData.append('working_to_tuesday', working_to);
        }

        if ($('#wednesday_' + branch[0] + '').is(":checked")) {
            formData.append('wednesday', 'wednesday');
            let working_from = $('#working_from_wednesday_' + branch[0] + '').val();
            let working_to = $('#working_to_wednesday_' + branch[0] + '').val();
            formData.append('working_from_wednesday', working_from);
            formData.append('working_to_wednesday', working_to);
        }

        if ($('#thursday_' + branch[0] + '').is(":checked")) {
            formData.append('thursday', 'thursday');
            let working_from = $('#working_from_thursday_' + branch[0] + '').val();
            let working_to = $('#working_to_thursday_' + branch[0] + '').val();
            formData.append('working_from_thursday', working_from);
            formData.append('working_to_thursday', working_to);
        }

        if ($('#saturday_' + branch[0] + '').is(":checked")) {
            formData.append('saturday', 'saturday');
            let working_from = $('#working_from_saturday_' + branch[0] + '').val();
            let working_to = $('#working_to_saturday_' + branch[0] + '').val();
            formData.append('working_from_saturday', working_from);
            formData.append('working_to_saturday', working_to);
        }

        if ($('#friday_' + branch[0] + '').is(":checked")) {
            formData.append('friday', 'friday');
            let working_from = $('#working_from_friday_' + branch[0] + '').val();
            let working_to = $('#working_to_friday_' + branch[0] + '').val();
            formData.append('working_from_friday', working_from);
            formData.append('working_to_friday', working_to);
        }

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('.loader').hide();
                let message = response.message;
                error_holder.hide();
                error_holder.html('');
                success_holder.html(message);
                success_holder.show();
                // resetForm();
                $('.loader').hide();
                $('html, body').animate({ scrollTop: 0 }, 'slow');
            },
            error: function (error) {
                $('.loader').hide();
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
    })
});