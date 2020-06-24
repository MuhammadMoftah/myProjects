@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('assets/site/css/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/site/css/addProduct.css?rand=1234')}}">
<meta property="og:title" content='topic'>
{{-- <meta property="og:image" content="{{ $topic->images[0]->image  }}"> --}}
<meta propert="og:description" content="{{$topic->body}}">
<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@">
<meta name="twitter:title" content='topic'>
{{-- <meta name="twitter:image" content="{{ $topic->images[0]->image  }}"> --}}
<script src="{{asset('assets/site/js/jquery.fancybox.min.js')}}"></script>

@endsection
@section('body')
<div class="showrooms topics">
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 px-0">
                </div>


                <!--==== Topics ====-->
                <!--==== Topics ====-->
                <div class="col-lg-6">
                    <div class="lunched-post">
                        @include('frontend.topics.topics_data_view')
                    </div>
                    <!--end-comments-->
                </div>
                <div class="col-lg-4">
                </div>
            </div>
        </div>
    </section>
</div>
<!--Report Modal -->
<form class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report This Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select class="form-control p-0" name="" id="">
                    <option value="">One</option>
                    <option value="">One</option>
                    <option value="">One</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info">Submit a report</button>
            </div>
        </div>
    </div>
</form> <!-- End Report Modal -->
@endsection
@section('scripts')
<!-- load more library -->
<script src="{{asset('assets/site/js/jquery.elimore.min.js')}}"></script>
<script src="{{asset('assets/site/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('assets/site/js/likeItem.js')}}"></script>
<!-- alert for topic created success -->
@if(Session::has('message'))
<script>
    Swal.fire({
        position: 'center',
        type: 'success',
        title: 'Your Topic Created Successfully',
        showConfirmButton: false,
        timer: 1500,
        showConfirmButton: false,
        confirmButtonText: 'Done',
        showLoaderOnConfirm: true,
        confirmButtonColor: '#21d5de'
    });
</script>
@endif

<script type="text/javascript">
    $(document).ready(function() {
        var dialog_type = "{{old('type')?old('type'):''}}";

        if (dialog_type == "create-topic") {
            $('#postModal').modal('show');
        }
    });
</script>
<script src="{{asset('assets/site/js/topicComment.js')}}"></script>
@if(Session::has('message'))
<script>
    Swal.fire({
        position: 'center',
        type: 'success',
        title: "{{session::get('message')}}",
        showConfirmButton: false,
        timer: 1500,
        showConfirmButton: false,
        confirmButtonText: 'Done',
        showLoaderOnConfirm: true,
        confirmButtonColor: '#21d5de'
    });
</script>
@endif
<script>
    $(document).ready(function() {
        var topic_id = '';
        var board_id = '';
        $(".board_id").on('change', function() {
            topic_id = $(this).attr('data-topic_id');
            board_id = $(this).val();
            if (board_id === "create") {
                $("#append").html('<h1>or create new board</h1><form action="" id="create_save">' +
                    'Board Name <br> <input name="name" id="name" class="form-control " type="text"><br>' +
                    'Board type <br><select name="board_type" id="board_type"' +
                    'data-style="btn-white" class="form-control ">' +
                    '<option value="1">private</option>' +
                    '<option value="0">public</option>' +
                    '</select><br>' +
                    '<input type="submit" value="create and save"' +
                    'class="btn btn-lg btn-success" style="background-color:#3ab1b7;border: thick;margin-left:120px">' + '</form>');
            }
            $("#create_save").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: "{{ route('create.save.board') }}",
                    data: {
                        board_type: $('#board_type :selected').val(),
                        board_name: $('#name').val(),
                        type: 'topic',
                        topic_id: parseInt(topic_id),

                    },
                    success: function(data) {
                        $('#SaveModal' + topic_id).modal('toggle');

                        // console.log(data);
                        if (data == "ok") {
                            Swal.fire({
                                position: 'center',
                                type: 'success',
                                title: 'Your topic saved ',
                                timer: 1500,
                                confirmButtonText: 'done',
                                showLoaderOnConfirm: true,
                                confirmButtonColor: '#21d5de'
                            });
                            // setTimeout(location.reload.bind(location), 2000)
                        } else {
                            Swal.fire({
                                position: 'center',
                                type: 'error',
                                title: 'The topic already exist ',
                                timer: 1500,
                                confirmButtonText: 'done',
                                showLoaderOnConfirm: true,
                                confirmButtonColor: '#21d5de'
                            });
                            // setTimeout(location.reload.bind(location), 2000)
                        }

                    }
                });
            });

        });

        $(".save").on('click', function() {
            if (!board_id) {
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
            if (topic_id != '') {
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: "{{ route('save.product') }}",
                    data: {
                        board_id: parseInt(board_id),
                        topic_id: parseInt(topic_id),
                        type: 'topic'
                    },
                    success: function(data) {
                        $('#SaveModal' + topic_id).modal('toggle');

                        if (data == "ok") {
                            Swal.fire({
                                position: 'center',
                                type: 'success',
                                title: 'Your topic saved ',
                                timer: 1500,
                                confirmButtonText: 'done',
                                showLoaderOnConfirm: true,
                                confirmButtonColor: '#21d5de'
                            });
                            // setTimeout(location.reload.bind(location), 2000)
                        } else {
                            Swal.fire({
                                position: 'center',
                                type: 'error',
                                title: 'The topic already exist ',
                                timer: 1500,
                                confirmButtonText: 'done',
                                showLoaderOnConfirm: true,
                                confirmButtonColor: '#21d5de'
                            });
                            // setTimeout(location.reload.bind(location), 2000)
                        }
                    }
                });
            }

        });

    });
</script>
<script>
    $(document).ready(function() {

        $(".follow").on('click', function() {
            $('.loader').show();
            var count = $(this).attr('data-count');
            var new_count;

            var user_id = $(this).attr('data-id');
            if ($(this).html() == 'Follow') {
                $(this).html("Following");
            }
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: "{{ route('user.follow.user') }}",
                datatype: 'html',
                data: {
                    user_id: user_id
                }
            });
            $('.loader').hide();
        });
    });
</script>
<script>
    $(document).ready(function() {

        $(".foll").on('click', function(e) {
            var count = $(this).attr('data-count');
            var new_count;

            var user_id = $(this).attr('data-id');
            if ($(this).html() == 'Follow') {
                $(this).html("Following");
            }
            $('.loader').show();
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: "{{ route('user.follow.user') }}",
                datatype: 'html',
                data: {
                    user_id: user_id
                }
            });
            $('.loader').hide();
        });
    });

    $('.deleteTopic').click(function(e) {
        e.preventDefault();
        let topic_id = $(this).attr('data-delete-id');
        let deleteTopicForm = $('.delete-form-' + topic_id + '');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                setTimeout(function() {
                    deleteTopicForm.submit();
                }, 1500);
            }
        });
    });
</script>
@endsection