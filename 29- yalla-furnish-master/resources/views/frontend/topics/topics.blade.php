@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('assets/site/css/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/site/css/addProduct.css?rand=1234')}}">
<script src="{{asset('assets/site/js/jquery.fancybox.min.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('assets/site/css/topics.css?rand=1234')}}">
@endsection
@section('body')

 <!-- ==== Fixed Side Menu ==== -->
 <!-- ==== Fixed Side Menu ==== -->
 <section class="fixed-side-nav d-lg-none d-block">
    <button class="btn btn-info sidemenu-button"><i class="fas fa-file-signature"></i></button>

    <div class="nav-container">
        <!-- Links -->
        <ul class="navbar-nav p-3 rounded bg-white">
            <li class="nav-item">
                <a class="nav-link category-link" href="{{route('user.get.topics')}}" data-id="">All Topics <span class="sr-only">(current)</span></a>
            </li>
            @foreach($categories as $category)
            <li class="nav-item">
                <a class="nav-link category-link" href="{{route('user.get.topics')}}" data-id="{{$category->id}}">{{$category->name_en}}</a>
            </li>
            @endforeach
        </ul>
    </div>

    <script>
        $('.fixed-side-nav .sidemenu-button').on('click', function(){
            $('.fixed-side-nav').toggleClass('swipe-menu')
        })
    </script>
</section>


<div class="showrooms topics">
    <section class="trending">
        <div class="container">
            <div class="row p-2">
                <div class="col-lg-2 px-0 d-lg-block d-none">
                    <nav class="showrooms-filter">
                        <!-- Links -->
                        <ul class="navbar-nav p-3 rounded bg-white">
                            <li class="nav-item">
                                <a class="nav-link category-link" href="{{route('user.get.topics')}}" data-id="">All Topics <span class="sr-only">(current)</span></a>
                            </li>
                            @foreach($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link category-link" href="{{route('user.get.topics')}}" data-id="{{$category->id}}">{{$category->name_en}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                    @if(auth()->guard('user')->check())
                    <nav class="showrooms-filter">
                        <!-- Links -->
                        <ul class="navbar-nav mt-3  p-3 rounded bg-white">
                            <li class="nav-item">
                                <a class="nav-link follow-link" href="{{route('user.get.topics')}}" data-id="">All People <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link follow-link" href="{{route('user.get.topics')}}" data-id="1">People You Follow</a>
                            </li>
                        </ul>
                    </nav>
                    @endif
                </div>

                <!--==== Topics ====-->
                <!--==== Topics ====-->
                <div class="col-lg-6">
                    @include('frontend.layouts.messages')
                    @if(!auth()->guard('user')->check())
                    <!--Guest Box-->
                    <section class="guest-box text-center bg-white rounded py-4 border">
                        <h1 class="h3"> Join Our Community</h1>
                        <p class="h5 py-3">
                            Share your experience & take advantage of others.
                            <br>
                            Get advices from architects & interior desingers.
                        </p>
                        <a href="{{ route('user.login.get') }}" class=" btn main-btn">Login</a>
                        <p class="d-inline mx-3">or</p>
                        <a href="{{route('user.register.get')}}" class=" btn main-btn">Sign-up</a>
                        <p class="h5 pt-3">and start discussions</p>
                    </section>
                    <!--End Guest Box-->
                    @else
                    <div class="post d-flex justify-content-between align-items-center p-1">
                        <figure class="img mr-2" style="background-image:url('@if(auth()->guard('user')->check()) {{auth()->guard('user')->user()->image}} @else {{$yallaImage}} @endif')">
                        </figure>
                        <h6 class="mx-1">
                            @if(auth()->guard('user')->check())
                            {{auth()->guard('user')->user()->first_name}}
                            @else Yalla-Furnish @endif
                        </h6>
                        <input style="" class="form-control " type="text" placeholder="Write Something, Start Discussion" data-toggle="modal" data-target="#postModal">

                        <!-- Post Modal -->
                        <div class="modal post-details p-0" id="postModal" role="dialog" tabindex="-1">
                            <form method="POST" action="{{route('user.topic.create.post')}}" enctype="multipart/form-data" style="display:contents;">
                                <input type="hidden" value="create-topic" name="type" />
                                {{ csrf_field() }}
                                <div class="card col-lg-6 col-md-8 p-2 mx-auto">
                                    <div class="card-header d-flex align-items-center p-2 bg-white border-0">
                                        <img src="@if(auth()->guard('user')->check()){{auth()->guard('user')->user()->image}}@endif" alt="">
                                        <h6 class="mx-2">@if(auth()->guard('user')->check()) {{auth()->guard('user')->user()->fullname}} @else Yalla-Furnish @endif </h6>
                                    </div>
                                    <div class="card-body">

                                        <textarea id="topicBody" value="{{old('body')}}" name="body" class="form-control " rows="3" placeholder="Write Something, Start a discussion and keep your question short and to the point">{{old('body')}}</textarea>

                                        {!! $errors->first('body', '<div class="text-danger small">:message</div>') !!}
                                        <div class="d-flex align-items-center border my-2 rounded">
                                            <p class="border-right px-1 {{ $errors->has('categories') || $errors->has('categories.*') ? 'text-danger' : ''}}"> <i class="bg-secondary py-1 px-2 mx-1 text-center text-white rounded-circle"> # </i> Choose up to 3 categories</p>
                                            <select class="selectpicker mx-2" name="categories[]" id="" class="selectpicker" multiple data-hide-disabled="true" data-size="5">
                                                @foreach($categories as $category)
                                                <option @if(old('categories')!==null) {{in_array($category->id,old('categories'))?'selected':''}} @endif value="{{$category->id}}">{{$category->name_en}}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('categories', '<div class="text-danger small">:message</div>') !!}
                                            {!! $errors->first('categories.*', '<div class="text-danger small">:message</div>') !!}
                                        </div>

                                        <div class="d-flex align-items-center border my-2 rounded">
                                            <p class="border-right px-1 {{ $errors->has('link') ? 'text-danger' : ''}}"> <i class="bg-secondary small p-2 mx-1 text-center text-white rounded-circle fas fa-link"> </i>Attach Link</p>
                                            <input style="width:60%;" class="border-0 ml-2 form-control" value="{{old('link')}}" type="text" name="link" placeholder="Add Link here">
                                            {!! $errors->first('link', '<div class="text-danger small">:message</div>') !!}
                                        </div>
                                    </div>

                                    <div class="card-footer d-flex justify-content-between bg-white border-0 pt-0 px-1">
                                        <div>
                                            <label for="uploadImg"> <i class="far fa-images"></i> Upload Photos (atleast one photo)</label>
                                            <input type="file" name="images[]" multiple="multiple" class="d-none" id="uploadImg" placeholder="images">
                                            {!! $errors->first('images', '<div class="text-danger small">:message</div>') !!}
                                            {!! $errors->first('images.*', '<div class="text-danger small">:message</div>') !!}
                                        </div>
                                        <button class="btn">Post</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    <div class="modal fade bd-example-modal-lg show comment-image-modal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center" id="dynamic-content">
                                    <img style="width:auto;height:auto;" class="img-fluid comment-image" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="topics_data">
                        @include('frontend.topics.topics_data')
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>  
 <script src="{{asset('assets/site/js/topicComment.js')}}"></script>
 <script src="{{asset('assets/site/js/likeItem.js')}}"></script>

<script>

    function summerNoteEditor(){
        $('.topic-comment-input').summernote({ 
            toolbar: false,
            popover: {
                image: [],
                link: [],
                air: []
            },
            placeholder: 'Write Comment ..',
        }); 

        $('.topic-comment-reply-input').summernote({ 
            toolbar: false,
            popover: {
                image: [],
                link: [],
                air: []
            },
            placeholder: 'Write  Reply ..',
        }); 

        $('#comment-edit-body').summernote({ 
            toolbar: false,
            popover: {
                image: [],
                link: [],
                air: []
            }  
        }); 
        $('#reply-edit-body').summernote({ 
            toolbar: false,
            popover: {
                image: [],
                link: [],
                air: []
            }  
        });

        $('#topicBody').summernote({
            height: 100,
            toolbar: false,
            popover: {
                image: [],
                link: [],
                air: []
            }
        });
    }

    summerNoteEditor();

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
</script>

<!-- alert for topic created success -->
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
<script type="text/javascript">
    $(document).ready(function() {
        var dialog_type = "{{old('type')?old('type'):''}}";
        if (dialog_type == "create-topic") {
            $('#postModal').modal('show');
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var keyword = '';
        var category = '';
        var by_following = '';

        function seeMoreTopics() {
            $(".topic-body").elimore({
                moreText: "See More",
                lessText: "See Less",
                maxLength: 138
            });
        }

        $(document).on('keyup', '#search', function(e) {
            keyword = $.trim($('#search').val());
            category = $.trim(category);
            by_following = $.trim(by_following);
            fetch_data(1);
        });

        $(document).on('click', '.category-link', function(e) {
            e.preventDefault();
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            keyword = $.trim(keyword);
            category = $.trim($(this).attr('data-id'));
            by_following = $.trim(by_following);
            fetch_data(1);
        });

        $(document).on('click', '.follow-link', function(e) {
            e.preventDefault();
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            keyword = $.trim(keyword);
            category = $.trim(category);
            by_following = $.trim($(this).attr('data-id'));
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            var url = "{{route('user.get.topics')}}";
            var url = url + '?keyword=' + keyword + '&category=' + category + '&by_following=' + by_following + '&page=' + page;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.topics_data').html(data);
                    seeMoreTopics();
                    summerNoteEditor();
                },
                cache: false
            });
        }

        $('body').on('click','.deleteTopic',function(e){
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

        seeMoreTopics();
    });
</script>
<script>
    $(document).ready(function() {
        var topic_id = '';
        var board_id = '';
        $(".board_id").on('change', function() {
            topic_id = $(this).attr('data-topic_id');
            board_id = $(this).val();
            if (board_id === "create") {
                $("#append-" + topic_id).html('<h1>or create new board</h1><form action="" id="create_save">' +
                    'Board Name <br> <input name="name" id="name" class="form-control " type="text"><br>' +
                    'Board type <br><select name="board_type" id="board_type"' +
                    'data-style="btn-white" class="form-control ">' +
                    '<option value="1">private</option>' +
                    '<option value="0">public</option>' +
                    '</select><br>' +
                    '<input type="submit" value="create and save"' +
                    'class="btn btn-lg btn-success" style="background-color:#3ab1b7;border: thick;margin-left:120px">' + '</form>');
            } else {
                $("#append-" + topic_id).html(" ");
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
@endsection