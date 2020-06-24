<!-- compare product -->
<script>
    $('.compare_btn').click(function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        compareProduct(url);
    });

    function compareProduct(url) {
        $('.loader').show();
        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                let message = data.message;
                Swal.fire({
                    position: 'center',
                    type: 'info',
                    title: message,
                    timer: 3000,
                    confirmButtonText: 'done',
                    showLoaderOnConfirm: true,
                    confirmButtonColor: '#21d5de'
                });
                $('.loader').hide();
            },
            error: function(err) {

            }
        });
    }
</script>

<!-- share product-->
<script>
    $('.shareButton').click(function(e) {
        e.preventDefault();

        let twitterLink = $(this).attr('data-twitter');
        let facebookLink = $(this).attr('data-facebook');
        let linkedInLink = $(this).attr('data-linkedin');
        let EmailLink = $(this).attr('data-email');

        $('#facebook_share').attr('href', facebookLink);
        $('#twitter_share').attr('href', twitterLink);
        $('#linkedIn_share').attr('href', linkedInLink);
        $('#email_share').attr('href', EmailLink);

        $('#ShareModal').modal('show');
    })
</script>

<!-- message showroom -->

<script>
    $("#profileImg").on('change', function() {
        if (this.files && this.files[0]) {
            if (this.files.length > 5) {
                swal.fire("Oops!", "you can upload maximum 5 images", "error");
                // alert("you can upload maximum 5 images"); 
            }
            $('#profileImage').remove();

            for (var i = 0; i < this.files.length; i++) {

                let image = '<label style="margin:5px;" for="profileImg" class="uploadimg"><div class="close-overlay"><span class="btn btn-danger fas fa-trash-alt"></span></div><img src="' + URL.createObjectURL(event.target.files[i]) + '" style="width:100px; height: 100px; border-radius:5%;" alt=""></label>';

                $('#image_preview').html(image);
            }
        }
    });

    $('.messageButton').click(function(e) {
        e.preventDefault();
        let showroomId = $(this).attr('data-showroom');
        $('#showroomId').val(showroomId);
        $('#msgModal').modal('show');
    });

    $('#sendShowroomMessageBtn').click(function(e) {
        $('.loader').show();
        let url = $('#showroomMessageForm').attr('action');
        let showroomId = $('#showroomId').val();
        let message = $('#showroomMessageText').val();
        let image = $('#profileImg')[0].files[0];
        var formData = new FormData();

        if (image) {
            formData.append('image', image);
        }

        formData.append('body', message);
        formData.append('showroom_id', showroomId);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#msgModal').modal('hide');
                let message = response.message;
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: message,
                    timer: 3000,
                    confirmButtonText: 'done',
                    showLoaderOnConfirm: true,
                    confirmButtonColor: '#21d5de'
                });
                $('.loader').hide();
            },
            error: function(error) {
                let errors = error.responseJSON.errors;
                let error_messages = [];
                $.each(errors, function(index, err) {
                    $.each(err, function(i, e) {
                        error_messages.push(e);
                    })
                });
                Swal.fire({
                    position: 'center',
                    type: 'error',
                    title: error_messages[0],
                    timer: 3000,
                    confirmButtonText: 'done',
                    showLoaderOnConfirm: true,
                    confirmButtonColor: '#21d5de'
                });
                $('.loader').hide();
            }
        });
    });
</script>
<!-- save product -->
<script>
    $(document).ready(function() {

        var board_id = $('#board_id :selected').val();
        var product_id = '';
        $('.saveButton').click(function(e) {
            e.preventDefault();
            let saves_count = $(this).attr('data-save-count');
            let comments_count = $(this).attr('data-comment-count');
            let product_background = $(this).attr('data-background');
            let rate = $(this).attr('data-rate');
            let price = $(this).attr('data-price');
            let name = $(this).attr('data-name');
            let productId = $(this).attr('data-id');

            $('#productSavesCount').html(saves_count);
            $('#productCommentsCount').html(comments_count);
            $('#productPrice').html(price);
            $('#productName').html(name);
            $('#productBackground').css({
                'background-image': "url('" + product_background + "')",
            });
            product_id = productId;
            $('#SaveModal').modal('show');
        });

        $("body").on('change', "#board_id", function() {
            board_id = $('#board_id :selected').val();
            if (board_id === "create") {
                $("#append").html('<form action="" id="create_save" style="text-align=' + '"center">' +
                    'Board Name <br> <input name="name" id="name" class="form-control " type="text"><br>' +
                    'Board type <br><select name="board_type" id="board_type"' +
                    'data-style="btn-white" class="form-control ">' +
                    '<option value="1">private</option>' +
                    '<option value="0">public</option>' +
                    '</select><br>' +
                    '<input type="submit" value="create and save"' +
                    'class="btn btn-lg btn-success" style="background-color:#3ab1b7;border: thick;margin-left:120px">' +
                    `<img style="background-color:#3ab1b7;border: thick;margin-left:120px;display:none" src='{{asset("images/loading.gif")}}' id="loading-create"   width='50px' height='50px'>` +
                    '</form>');
                $("#save-button").hide()
            } else {
                $("#append").html("");
                $("#save-button").show()
            }

            $("body").on("submit", "#create_save", function(e) {
                $('.loader').show();
                e.preventDefault();
                let _elm = $(this).find("input[type=submit]");
                _elm.attr('disabled', 'disabled');
                let name = $(this).find("input[name=name]");
                if (name.val().length == 0) {
                    $('.loader').hide();
                    Swal.fire({
                        position: 'center',
                        type: 'error',
                        title: 'name is required',
                        timer: 1500,
                        confirmButtonText: 'done',
                        showLoaderOnConfirm: true,
                        confirmButtonColor: '#21d5de'
                    });
                    return;
                }
                let load = $("#loading-create")
                _elm.hide();
                load.show()
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: "{{ route('create.save.board') }}",
                    data: {
                        board_type: $('#board_type :selected').val(),
                        board_name: $('#name').val(),
                        type: 'product',
                        product_id: parseInt(product_id),
                    },
                    success: function(data) {
                        $('#SaveModal').modal('toggle');

                        if (data == "ok") {
                            $('.loader').hide();
                            Swal.fire({
                                position: 'center',
                                type: 'success',
                                title: 'Your product saved ',
                                timer: 1500,
                                confirmButtonText: 'done',
                                showLoaderOnConfirm: true,
                                confirmButtonColor: '#21d5de'
                            });
                            load.hide()
                            _elm.show();
                        } else {
                            $('.loader').hide();
                            Swal.fire({
                                position: 'center',
                                type: 'error',
                                title: 'The product already exist ',
                                timer: 1500,
                                confirmButtonText: 'done',
                                showLoaderOnConfirm: true,
                                confirmButtonColor: '#21d5de'
                            });
                            load.hide()
                            _elm.show();
                        }

                    },
                    error: function(err) {
                        load.hide()
                        _elm.show();
                    }
                });
            });
        });

        $("#SaveModal").on("hidden.bs.modal", function() {
            $("input[type=text]").val("");
            $("#board_id").val('select')
            $("#board_id").change()
            $("#append").html("");
            $("#save-button").show()
        });

        $(".save").on('click', function() {
            $('.loader').show();
            let data = {
                board_id: parseInt(board_id),
                product_id: parseInt(product_id),
                type: 'product'
            };
            if (!data.board_id) {
                $('.loader').hide();
                Swal.fire({
                    position: 'center',
                    type: 'error',
                    title: 'Must Select Board ',
                    timer: 1500,
                    confirmButtonText: 'done',
                    showLoaderOnConfirm: true,
                    confirmButtonColor: '#21d5de'
                });
            }

            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: "{{ route('save.product') }}",
                data,
                success: function(data) {
                    $('#SaveModal').modal('toggle');
                    if (data == "ok") {
                        $('.loader').hide();
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            title: 'Your product saved ',
                            timer: 1500,
                            confirmButtonText: 'done',
                            showLoaderOnConfirm: true,
                            confirmButtonColor: '#21d5de'
                        });
                    } else {
                        $('.loader').hide();
                        Swal.fire({
                            position: 'center',
                            type: 'error',
                            title: 'The product already exist ',
                            timer: 1500,
                            confirmButtonText: 'done',
                            showLoaderOnConfirm: true,
                            confirmButtonColor: '#21d5de'
                        });
                    }
                }
            });

        });
    });
</script>

<script>
    $(function () {
        
        var modeRequestPrice = $("#request_price");
        $("body").on("click", ".ask-price", function(e){
            event.preventDefault();
            var _elm = $(this)
            modeRequestPrice.find("input[name='product_id']").val(  _elm.data('id')    )
            modeRequestPrice.modal("show")

            // alert(_elm.data('id'))
        })
        @if(Session::has('successSafwat'))
            Swal.fire({
                type: 'success',
                title: "{{session()->get('successSafwat')}}",
                timer: 1500,
                confirmButtonText: 'done',
                showLoaderOnConfirm: true,
                confirmButtonColor: '#21d5de'
            });
            // setTimeout(location.reload.bind(location), 2000)

    
       @endif
    })
</script>