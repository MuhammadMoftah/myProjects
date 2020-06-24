@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('assets/site/css/jquery.fancybox.min.css')}}">
<script src="{{asset('assets/site/js/jquery.fancybox.min.js')}}"></script>
@endsection
@section('body')
<div class="showrooms user-profile">
    <div class="container head">
        <div class="row p-0 bg-white border-bottom">
            <div class="col-md-12  p-0">
                <section class="cover" style="background-image:url({{ $user->cover }});"></section>
            </div>
            <div class="col-lg-2 col-12 text-center">
                <div class="img" style="background-image:url({{$user->image}});"></div>
            </div>
            <div class="col-lg-10 col-12 comp-contact" style="padding: 0px 31px 0 24px;">
                        <h5 class="mb-1 d-inline-block mt-2 font-weight-bold h4 pb-1">{{$user->fullname}}
                            @if ($user->content_creator == 1)
                                (content creator)
                            @endif
                        </h5>

                <div class="d-inline-block float-lg-right">
                    <div class="stars d-inline-block mx-3 mt-1">
                        <p class="text-muted d-inline-block">{{ $user->followings->count() }} Followings</p>
                        <p class="text-muted d-inline-block">{{ $user->followers->count() }} Followers</p>
                    </div>
                    @if (auth()->guard('user')->check() && auth()->guard('user')->user()->id != $user->id)
                    @if ($user->check_following($user->id , auth()->guard('user')->user()->id))
                    <button class=" btn btn-info follow" data-count="" data-id="{{ $user->id }}" data-follow="unfollow">Following</button>
                    @else
                    <button class="btn btn-info follow" data-count="" data-id="{{ $user->id }}" data-follow="follow">Follow</button>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>


    <section class="trending">
        <div class="container">
            <div class="row bg-white mb-3 px-4">
                <div class="col-lg-2">
                    <div class="showroom-nav my-4">
                        <p class="main-link @if(request()->open != 'activites' && request()->open != 'ideas' && request()->open != 'topics') active @endif" id="boards">Boards</p>

                        <p class="main-link @if(request()->open == 'activites') active @endif" id="activity">Activity</p>
                        <p class="main-link @if(request()->open == 'ideas') active @endif" id="idea">Ideas</p>
                        <p class="main-link @if(request()->open == 'topics') active @endif" id="topic">Topics</p>
                    </div>

                    <div class="py-5">
                        <a href="{{route('user.get.topics')}}" class="d-block main-link2 my-2">Ask the community</a>
                    </div>
                </div>

                <div class="col-lg-10" id="product-content">

                    <div class="row" id="boards-content" style="@if(request()->open != 'activites' && request()->open != 'ideas' && request()->open != 'topics' && request()->open != 'edit-profile') @else display:none; @endif">
                        <div class="col-lg-12 d-flex justify-content-between mt-3 px-2">
                            <div>
                                <h4 class="d-inline-block mr-5 h5">{{ $boards->count() }} Boards</h4>
                            </div>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" id="boards-search" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        <div class="boards" style="display: contents;">
                            @include('frontend.includes.boards_data')
                        </div>
                    </div>

                    <div id="activity-content" class="row" style="@if(request()->open != 'activites') display:none @endif">
                        @include('frontend.includes.activities_data')
                    </div>
                    <div class="row articles" id="idea-content" style="@if(request()->open != 'ideas') display:none @endif">
                        @include('frontend.includes.ideas_data')
                    </div>

                    <div class="row topics py-3 px-1" id="topic-content" style="@if(request()->open != 'topics') display:none @endif">
                        @include('frontend.includes.topics_data')
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
<!--End Showrooms-->
@endsection
@section('scripts')
<!-- load more library -->
<script src="{{asset('assets/site/js/jquery.elimore.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        function truncate_text() {
            //    === Make div square ===
            $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
            $(window).on('resize', function() {
                $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
            })
        }

        var keyword = '';

        // search boards
        $(document).on('keyup', '#boards-search', function(e) {
            keyword = $.trim($('#boards-search').val());
            fetch_boards();
        });

        function fetch_boards() {
            $('.loader').show();
            var url = "{{route('user.view.profile',$user->id)}}";
            var url = url + '?keyword=' + keyword + '&type=boards';
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.boards').html(data);
                    truncate_text();
                    $('.loader').hide();
                }
            });
        }
    });
</script>
<script>
    //    === Make div square ===
    $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
    $(window).on('resize', function() {
        $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {


        $(document).on('click', '#idea-content .pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            $('.loader').show();
            var url = "{{route('user.view.profile',$user->id)}}";
            var url = url + '?page=' + page + '&type=ideas';
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.articles').html(data);
                    $('.loader').hide();
                }
            });
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {


        $(document).on('click', '#activity-content .pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            $('.loader').show();
            var url = "{{route('user.view.profile',$user->id)}}";
            var url = url + '?page=' + page + '&type=activities';
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('#activity-content').html(data);
                    $('.loader').hide();
                }
            });
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        function seeMoreTopics() {
            $(".topic-body").elimore({
                moreText: "See More",
                lessText: "See Less",
                maxLength: 138
            });
        }

        $(document).on('click', '#topic-content .pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            $('.loader').show();
            var url = "{{route('user.view.profile',$user->id)}}";
            var url = url + '?page=' + page + '&type=topics';
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.topics').html(data);
                    seeMoreTopics();
                    $('.loader').hide();
                }
            });
        }

        seeMoreTopics();
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
            } else if ($(this).html() == 'Following') {
                $(this).html("Follow");
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

@endsection