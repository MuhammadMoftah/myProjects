@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<div class="showrooms user-profile">
    <div class="container head">

        <div class="row p-0 bg-white border-bottom">
            <div class="col-md-12  p-0">
                <section class="cover" style="background-image:url({{ $user->cover }});"></section>
            </div>
            <div class="col-lg-2 col-12 text-center">
                <div class="img" style="background-image:url({{ $user->image }});"></div>
            </div>
            <div class="col-lg-10 col-12 comp-contact" style="padding: 0px 31px 0 24px;">
                <h5 class="mb-1 d-inline-block mt-2">{{$user->fullname}}</h5>
                <div class="d-inline-block float-lg-right">
                    <div class="stars d-inline-block mx-3 mt-1">
                        <p class="text-muted d-inline-block">{{ $user->followers->count() }} Followers</p>
                        .
                        <p class="text-muted d-inline-block">{{ $user->followings->count() }} Followings</p>
                    </div>
                    <a href="/MyProfile?open=edit-profile" class="btn btn-info w-auto py-0 text-white" id="edit-profile">Edit Profile</a>

                </div>
            </div>
        </div>
    </div>

    <section class="trending">
        <div class="container">
            <div class="row bg-white mb-3 px-4">
                <div class="col-lg-2">
                    <div class="showroom-nav my-4">
                        <a href="/MyProfile?open=boards" class="main-link d-block" id="boards">Boards</a>
                        <a href="{{route('user.background.set')}}" class="main-link d-block" id="design">Design Your Home</a>
                        <a href="/MyProfile?open=compare" class="main-link d-block" id="comparison">Comparison Table</a>
                        <a href="/MyProfile?open=updates" class="main-link d-block" id="updates">Updates</a>
                        <a href="/MyProfile?open=ideas" class="main-link d-block" id="ideas">Ideas</a>
                        <a href="/MyProfile?open=topics" class="main-link d-block" id="topics">Topics</a>
                        <a href="/MyProfile?open=activites" class="main-link d-block" id="activity">Activity</a>
                        <a href="/MyProfile?open=showrooms" class="main-link d-block" id="showrooms">Showrooms</a>
                    </div>

                    <div class="py-5" style="line-height: 16px;">
                        <a href="{{route('user.get.topics')}}" class="d-block main-link2 my-3">Ask the community</a>
                        <a href="{{route('user.create.showroom')}}" class="d-block main-link2 my-3">Create a profile for your business</a>
                    </div>
                </div>

                <div class="col-lg-10" id="product-content">
                    @include('frontend.layouts.messages')
                    <div class="row" id="boards-content">
                        <div class="row one-board-section" id="ShowBoard">
                            <div class="col-lg-12 d-flex justify-content-between mt-3 px-2">
                                <div class="d-flex align-items-baseline">
                                    <h4 class="d-inline-block mr-5">{{ $board->name }} </h4>
                                    @if(auth()->guard('user')->check() && auth()->guard('user')->user()->id == $board->user->id)
                                    <a href="#" data-toggle="modal" data-target="#edit-board-{{ $board->id }}" class="btn btn-info">Edit Board</a><br>
                                    <button class="btn btn-danger mx-2" id="delete-board-btn">Delete</button>
                                    <form method="POST" action="{{route('user.board.delete',['id' => $board->id])}}" class="delete-form">@csrf</form>
                                    @endif
                                </div>
                                <h4>{{$board->items->count()}} Items</h4>
                                <div class="form-group has-search">

                                </div>
                            </div>

                            <nav class="col-lg-12 mt-3 mb-5 px-0">
                                <b>Show</b>
                                <a class="filter-link" data-href="{{route('user.board',$board->id)}}" data-type="">All</a>
                                <a class="filter-link" data-href="{{route('user.board',$board->id)}}" data-type="1">Products</a>
                                <a class="filter-link" data-href="{{route('user.board',$board->id)}}" data-type="2">Ideas</a>
                                <a class="filter-link" data-href="{{route('user.board',$board->id)}}" data-type="3">Topics</a>
                                <a class="filter-link" data-href="{{route('user.board',$board->id)}}" data-type="4">Offers</a>
                            </nav>
                            <div class="board_items" style="display:contents;">
                                @include('frontend.includes.items_data')
                            </div>
                        </div>

                    </div>


                </div>
            </div>
    </section>
    @if(auth()->guard('user')->check() && auth()->guard('user')->user()->id == $board->user->id)
    @include('frontend.includes.edit_board')
    @endif
</div>
<!--End Showrooms-->
@endsection
@section('scripts')
<script src="{{asset('assets/site/js/filterItems.js?rand=123')}}"></script>
<script type="text/javascript">
    $('#delete-board-btn').click(function(e) {
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
                    $('.delete-form').submit();
                }, 100);
            }
        });
    });

    $('.delete-board-item').click(function(e) {
        var delete_form = $(this).siblings('form');

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
                    delete_form.submit();
                }, 100);
            }
        });
    });
</script>
@endsection