@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('assets/site/css/jquery.fancybox.min.css')}}">
<script src="{{asset('assets/site/js/jquery.fancybox.min.js')}}"></script>
@endsection

@if (Session::has('regiser_success'))
@section('fb_pixel_events')
fbq('track', 'CompleteRegistration');
@endsection
@endif

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
                <h5 class="mb-1 d-inline-block mt-2 font-weight-bold">{{$user->fullname}}</h5>

                <div class="d-inline-block float-lg-right">
                    <div class="stars d-inline-block mx-3 mt-1">
                        <a href="" data-toggle="modal" data-target="#myModalFollowings">
                            <p class="text-muted d-inline-block"> @if($my_followings)
                                {{ count($my_followings) + count($following_showrooms) }} Followings @else 0 Followings
                                @endif </p>
                        </a>
                        <a href="" data-toggle="modal" data-target="#myModalFollowers">
                            <p class="text-muted d-inline-block">{{ count($my_followers) }} Followers</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="trending">
        <div class="container">
            <div class="row bg-white mb-3 px-4">
                <div class="col-lg-2">
                    <div class="showroom-nav my-4">
                        <p class="main-link @if(request()->open != 'activites' && request()->open != 'ideas' 
                        && request()->open != 'topics'  && request()->open != 'compare' 
                        && request()->open != 'showrooms' 
                        && request()->open != 'edit-profile' && !session('active') 
                        && !session('open')
                        && old('type')!='service_tab'
                        ) active @endif" id="boards">Boards</p>
                        <p class="main-link @if(request()->open == 'activites' || session('open') == 'activity') active @endif" id="activity">Activity
                        </p>
                        @if (auth()->guard('user')->user()->content_creator == 1)
                        <p class="main-link @if(request()->open == 'ideas' || session('active') == 'idea') active @endif" id="idea">Ideas</p>
                        @endif
                        <p class="main-link @if(request()->open == 'topics') active @endif" id="topic">Topics</p>
                        @php
                        $consultantsCount=count(auth('user')->user()->consultants);
                        @endphp
                        @if($consultantsCount == 0)
                        <p class="main-link @if(old('type') == 'service_tab') active @endif" id="consultancy">Consultancy Services</p>
                        @endif
                        <a href="{{route('user.background.set')}}" class="main-link">Design Your Home</a>
                        <p class="main-link @if(request()->open == 'compare' || session('open') == 'compare') active @endif" id="comparison">Comparison
                            Table</p>
                        <p class="main-link @if(request()->open == 'updates') active @endif" id="updates">Updates</p>
                        <p class="main-link @if(request()->open == 'edit' || session('open') == 'edit') active @endif" id="edit-profile">Edit Profile</p>
                        @if(count($user_showrooms) > 0)
                        <p class="main-link @if(request()->open == 'showrooms' || session('open') == 'showrooms') active @endif" id="showroom">Showrooms</p>
                        @endif
                    </div>

                    <div class="py-5" style="line-height: 16px">
                        <a href="{{ route('user.get.topics') }}" class="d-block main-link2 my-3">Ask the community</a>
                        <a href="{{ route('user.create.showroom')}}" class="d-block main-link2 my-3">Create a profile
                            for your
                            business</a>
                    </div>
                </div>

                <div class="col-lg-10" id="product-content">
                    @if(old('type')!='service_modal' && old('type')!='edit-board' && old('type')!='add-board')
                    @include('frontend.layouts.errors')
                    @endif
                    @if(!Session::has('service'))
                    @include('frontend.layouts.messages')
                    @endif
                    @if($consultantsCount == 0)
                    <div class="row px-2 py-5" id="consultancy-content" style="@if(old('type') != 'service_tab') display:none @endif">
                        <div class="col-lg-6">
                            <form enctype="multipart/form-data" action="{{route('user.consultant.store')}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="type" value="service_tab" />
                                <div class="form-group">
                                    <label for="Servicesubject">Subject</label>
                                    <input value="{{old('subject')}}" class="form-control mt-2" id="Servicesubject" name="subject" placeholder="Subject" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="Servicemessage">Your message</label>
                                    <textarea id="Servicemessage" value="{{old('message')}}" class="form-control mt-2" name="message" id="" rows="5">{{old('message')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Upload Image (max. 5 images)</label>
                                    <input class="form-control mt-2" name="images[]" multiple placeholder="Images" type="file">
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn main-btn ml-2" type="submit">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif

                    <div class="row" id="boards-content" style="@if(request()->open != 'activites' && request()->open != 'compare'  && request()->open != 'ideas' && request()->open != 'topics' && request()->open != 'showrooms' && request()->open != 'edit-profile' && !session('active') && !session('open') && old('type')!='service_tab') @else display:none; @endif">
                        <div class="col-lg-12 d-flex justify-content-between mt-3 px-2">
                            <div>
                                <h4 class="d-inline-block mr-5">{{ $boards->count() }} Boards</h4>
                                <a href="" class="btn main-btn2 " data-toggle="modal" data-target="#add-board">Create
                                    New Board</a>

                            </div>

                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" id="boards-search" placeholder="Search">
                            </div>
                        </div>
                        <div class="boards" style="display:contents;">
                            @include('frontend.includes.boards_data')
                        </div>
                        <div class="col-xl-4 col-md-6 px-2">
                            <button class="btn main-btn2 part w-100" data-toggle="modal" data-target="#add-board">
                                <h1 class="m-0"> + </h1>
                                Create New Board
                            </button>

                            <!-- The Modal -->
                            <div class="modal fade" id="add-board">
                                <form class="modal-dialog" method="POST" action="{{route('user.board.store')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="type" value="add-board" />
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Board</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="exampleName1" class="my-2">Board Name</label>
                                                <input type="text" name="name" class="form-control {{ $errors->has('name') && old('type')=='add-board' ? 'is-invalid' : ''}}" id="exampleName1" aria-describedby="emailHelp" placeholder="Board Name">
                                                @if(old('type')=='add-board')
                                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>
                                                ') !!}
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="my-2" for="exampleFormControlSelect1">Board Status</label>
                                                <select name="status" class="form-control {{ $errors->has('private') && old('type')=='add-board' ? 'is-invalid' : ''}}" id="exampleFormControlSelect1">
                                                    <option value="0">Public</option>
                                                    <option value="1">Private</option>
                                                </select>
                                                {!! $errors->first('private', '<div class="invalid-feedback">:message
                                                </div>') !!}
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn main-btn">Submit</button>

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>

                    <div id="activity-content" class="row" style="@if(request()->open != 'activites' && session('open') != 'activity') display:none @endif">
                        @include('frontend.includes.activities_data')
                    </div>

                    <div class="row articles" id="idea-content" style="@if(request()->open == 'ideas' || session('active') == 'idea') @else display:none @endif">
                        @include('frontend.includes.ideas_data')
                    </div>
                    <div class="row" id="design-content" style="display:none">
                        design-content
                    </div>
                    @if (count($user->products) == 0 )
                    <div class="row" id="comparison-content" style="margin: auto; @if(request()->open != 'compare' && session('open') != 'compare') display:none @endif">
                        <div class="col-12 text-danger py-4">
                            <h4 class=" text-center "> No Products To Compare</h4>
                        </div>
                    </div>
                    @else
                    <div class="row" id="comparison-content" style="@if(request()->open != 'compare' && session('open') != 'compare') display:none @endif">
                        <table class="compare-table table table-bordered table-striped col-12 mt-4 ">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <td scope="col"> <img src="{{ isset($user->products[0]->images[0]) ? $user->products[0]->images[0]->image : '' }}" alt="">
                                    </td>
                                    <td scope="col"> <img src="{{ isset($user->products[1]->images[0]) ? $user->products[1]->images[0]->image : '' }}" alt="">
                                    </td>
                                    <td scope="col"> <img src="{{ isset($user->products[2]->images[0]) ? $user->products[2]->images[0]->image : '' }}" alt="">
                                    </td>
                                    <td scope="col"> <img src="{{ isset($user->products[3]->images[0]) ? $user->products[3]->images[0]->image : '' }}" alt="">
                                    </td>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th scope="row">Name</th>
                                    @if (isset($user->products[0]))


                                    <td><a href="{{ route('user.product.get',$user->products[0]->id) }}">{{ isset($user->products[0]) ? $user->products[0]->name_en : '' }}</a>
                                    </td>
                                    @endif
                                    @if (isset($user->products[1]))

                                    <td><a href="{{ route('user.product.get',$user->products[1]->id) }}">{{ isset($user->products[1]) ? $user->products[1]->name_en : '' }}</a>
                                    </td>
                                    @endif
                                    @if (isset($user->products[2]))
                                    <td><a href="{{ route('user.product.get',$user->products[2]->id) }}">{{ isset($user->products[2]) ? $user->products[2]->name_en : '' }}</a>
                                    </td>
                                    @endif
                                    @if (isset($user->products[3]))
                                    <td><a href="{{ route('user.product.get',$user->products[3]->id) }}">{{ isset($user->products[3]) ? $user->products[3]->name_en : '' }}</a>
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th scope="row">Size</th>
                                    <td>{{ isset($user->products[0]) ? 'W /' . $user->products[0]->width . ' H /'. $user->products[0]->height .' D '.$user->products[0]->depth .' cm' : '' }}
                                    </td>
                                    <td>{{ isset($user->products[1]) ? 'W /' . $user->products[1]->width . ' H /'. $user->products[1]->height .' D '.$user->products[1]->depth .' cm' : '' }}
                                    </td>
                                    <td>{{ isset($user->products[2]) ? 'W /' . $user->products[2]->width . ' H /'. $user->products[2]->height .' D '.$user->products[2]->depth .' cm' : '' }}
                                    </td>
                                    <td>{{ isset($user->products[3]) ? 'W /' . $user->products[3]->width . ' H /'. $user->products[3]->height .' D '.$user->products[3]->depth .' cm' : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Material</th>
                                    <td>{{ isset($user->products[0]) ? $user->products[0]->material->name_en : '' }}
                                    </td>
                                    <td>{{ isset($user->products[1]) ? $user->products[1]->material->name_en : '' }}
                                    </td>
                                    <td>{{ isset($user->products[2]) ? $user->products[2]->material->name_en : '' }}
                                    </td>
                                    <td>{{ isset($user->products[3]) ? $user->products[3]->material->name_en : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="rw">Color</th>
                                    <td>{{ isset($user->products[0]) ? $user->products[0]->color->name_en : '' }}</td>
                                    <td>{{ isset($user->products[1]) ? $user->products[1]->color->name_en : '' }}</td>
                                    <td>{{ isset($user->products[2]) ? $user->products[2]->color->name_en : '' }}</td>
                                    <td>{{ isset($user->products[3]) ? $user->products[3]->color->name_en : '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Price</th>
                                    <td>{{ isset($user->products[0]) ? $user->products[0]->price .' EGP' : '' }} </td>
                                    <td>{{ isset($user->products[1]) ? $user->products[1]->price .' EGP' : '' }} </td>
                                    <td>{{ isset($user->products[2]) ? $user->products[2]->price .' EGP' : '' }} </td>
                                    <td>{{ isset($user->products[3]) ? $user->products[3]->price .' EGP' : '' }} </td>
                                </tr>
                                <tr>
                                    <th scope="row">Category</th>
                                    <td><a class="main-link2">{{ isset($user->products[0]) ? $user->products[0]->categories[0]->name_en: '' }}</a>
                                    </td>
                                    <td><a class="main-link2">{{ isset($user->products[1]) ? $user->products[1]->categories[0]->name_en: '' }}</a>
                                    </td>
                                    <td><a class="main-link2">{{ isset($user->products[2]) ? $user->products[2]->categories[0]->name_en: '' }}</a>
                                    </td>
                                    <td><a class="main-link2">{{ isset($user->products[3]) ? $user->products[3]->categories[0]->name_en: '' }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Vendor</th>
                                    <td>
                                        @if (isset($user->products[0]))

                                        <a href="{{ route('user.get.singleShowroom',[ 'slug' => $user->products[0]->showroom->slug  ]) }}" class="main-link2">
                                            {{ isset($user->products[0]) ? substr($user->products[0]->showroom->name_en,0,25): '' }}
                                        </a>
                                        @endif
                                        @if (isset($user->products[0]) && isset($user->products[0]->showroom->rate))
                                        <div class="stars mt-1 d-inline-block mx-3">
                                            @for ($i = 0; $i < $user->products[0]->showroom->rate; $i++)
                                                <i class="fas fa-star text-warning"></i>
                                                @endfor
                                                @for ($i = 5; $i > $user->products[0]->showroom->rate; $i--)
                                                <i class="far fa-star text-warning"></i>
                                                @endfor
                                        </div>
                                        @endif

                                    </td>
                                    <td>
                                        @if (isset($user->products[1]))
                                        <a href="{{ route('user.get.singleShowroom',['slug' => $user->products[1]->showroom->slug  ]) }}" class="main-link2">
                                            {{ isset($user->products[1]) ? $user->products[1]->showroom->name_en: '' }}
                                        </a>
                                        @endif
                                        @if (isset($user->products[1]) && isset($user->products[1]->showroom->rate))
                                        <div class="stars mt-1 d-inline-block mx-3">
                                            @for ($i = 0; $i < $user->products[1]->showroom->rate; $i++)
                                                <i class="fas fa-star text-warning"></i>
                                                @endfor
                                                @for ($i = 5; $i > $user->products[1]->showroom->rate; $i--)
                                                <i class="far fa-star text-warning"></i>
                                                @endfor
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($user->products[2]))
                                        <a href="{{ route('user.get.singleShowroom',['slug' => $user->products[2]->showroom->slug ]) }}" class="main-link2">
                                            {{ isset($user->products[2]) ? $user->products[2]->showroom->name_en: '' }}
                                        </a>
                                        @endif
                                        @if (isset($user->products[2]) && isset($user->products[2]->showroom->rate))
                                        <div class="stars mt-1 d-inline-block mx-3">
                                            @for ($i = 0; $i < $user->products[2]->showroom->rate; $i++)
                                                <i class="fas fa-star text-warning"></i>
                                                @endfor
                                                @for ($i = 5; $i > $user->products[2]->showroom->rate; $i--)
                                                <i class="far fa-star text-warning"></i>
                                                @endfor
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($user->products[3]))
                                        <a href="{{ route('user.get.singleShowroom',['slug' => $user->products[3]->showroom->slug  ]) }}" class="main-link2">
                                            {{ isset($user->products[3]) ? $user->products[3]->showroom->name_en: '' }}
                                        </a>
                                        @endif
                                        @if (isset($user->products[3]) && isset($user->products[3]->showroom->rate))
                                        <div class="stars mt-1 d-inline-block mx-3">
                                            @for ($i = 0; $i < $user->products[3]->showroom->rate; $i++)
                                                <i class="fas fa-star text-warning"></i>
                                                @endfor
                                                @for ($i = 5; $i > $user->products[3]->showroom->rate; $i--)
                                                <i class="far fa-star text-warning"></i>
                                                @endfor
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">location</th>
                                    <td> {{ isset($user->products[0]->branches[0]) ? $user->products[0]->branches[0]->address_en: '' }}
                                    </td>
                                    <td> {{ isset($user->products[1]->branches[0]) ? $user->products[1]->branches[0]->address_en: '' }}
                                    </td>
                                    <td> {{ isset($user->products[2]->branches[0]) ? $user->products[2]->branches[0]->address_en: '' }}
                                    </td>
                                    <td> {{ isset($user->products[3]->branches[0]) ? $user->products[3]->branches[0]->address_en: '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Action</th>
                                    <td>
                                        @if (isset($user->products[0]))

                                        <a href="{{ isset($user->products[0]) ? route('delete.comparison_table.product',$user->products[0]->id) : ''}}" class="btn main-btn px-3"> <i class="fas fa-trash-alt"></i> </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($user->products[1]))

                                        <a href="{{ isset($user->products[1]) ? route('delete.comparison_table.product',$user->products[1]->id) : ''}}" class="btn main-btn px-3"> <i class="fas fa-trash-alt"></i> </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($user->products[2]))

                                        <a href="{{ isset($user->products[2]) ? route('delete.comparison_table.product',$user->products[2]->id) : ''}}" class="btn main-btn px-3"> <i class="fas fa-trash-alt"></i> </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($user->products[3]))

                                        <a href="{{ isset($user->products[3]) ? route('delete.comparison_table.product',$user->products[3]->id) : ''}}" class="btn main-btn px-3"> <i class="fas fa-trash-alt"></i> </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                    <div class="row" id="updates-content" style="@if(request()->open != 'updates') display:none @endif">
                        <div class="col-lg-12 d-flex justify-content-between mt-3 px-2">
                            <div>
                                <h4 class="d-inline-block mr-5">Updates from People you follow</h4>
                            </div>
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" id="updates-search" placeholder="Search">
                            </div>
                        </div>
                        <div id="updates_content">
                            @include('frontend.includes.updates_data')
                        </div>
                    </div>
                    <div class="row topics py-3 px-1 " id="topic-content" style="@if(request()->open != 'topics') display:none @endif">
                        @include('frontend.includes.topics_data')
                    </div>
                    <div class="row py-3 px-1 vendors" id="showrooms-content" style="@if(request()->open != 'showrooms') display:none @endif">
                        @if (count($user_showrooms))
                        @foreach ($user_showrooms as $user_showroom)
                        <div class="col-6 col-lg-3 col-md-4 px-2">
                            <div class="part card" id="showroom-{{ $user_showroom->id }}">
                                <figure class="img mb-0" style="background-image: url('{{  $user_showroom->showroom_image }} ');"></figure>
                                <div class="card-footer bg-white">
                                    <h6 class="card-title mb-0"><a href="{{route('user.get.singleShowroom',['slug' => $user_showroom->slug  ])}}">{{ substr($user_showroom->name_en, 0,22) }}</a>
                                    </h6>
                                    <div class="stars d-inline-block">
                                        @for ($i = 0; $i < $user_showroom->rate; $i++)
                                            <i class="fas fa-star text-warning"></i>
                                            @endfor
                                            @for ($i = 5; $i > $user_showroom->rate; $i--)
                                            <i class="far fa-star text-warning"></i>
                                            @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $('.main-link').click(function() {
                                setTimeout(function() {
                                    //To MAke Images Square
                                    $('#showroom-{{ $user_showroom->id }}').css({
                                        'height': $('#showroom-{{ $user_showroom->id }}').width() + 'px'
                                    });
                                    $(window).on('resize', function() {
                                        $('#showroom-{{ $user_showroom->id }} ').css({
                                            'height': $('#showroom-{{ $user_showroom->id }} ').width() + 'px'
                                        });
                                    });
                                }, 150);
                            });
                            //To MAke Images Square
                            $('#showroom-{{ $user_showroom->id }}').css({
                                'height': $('#showroom-{{ $user_showroom->id }}').width() + 'px'
                            });
                            $(window).on('resize', function() {
                                $('#showroom-{{ $user_showroom->id }} ').css({
                                    'height': $('#showroom-{{ $user_showroom->id }} ').width() + 'px'
                                });
                            });
                        </script>
                        @endforeach
                        @else
                        <div class="col-12 text-danger py-4">
                            <h4 class=" text-center "> No Showrooms Created</h4>
                        </div>
                        @endif
                    </div>
                    <div class="row" id="edit-profile-content" style="@if(request()->open != 'edit-profile' && session('open') != 'edit') display:none @endif">
                        <div class="col-12 px-0">

                            <form autocomplete="off" action="{{ route('edit.user.profile') }}" method="POST" enctype="multipart/form-data" class="form-row p-3">
                                @csrf

                                <div class="form-group col-12">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Old Name" value="{{ $user->first_name}}">
                                </div>

                                <div class="form-group col-12">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" id="last_name" value="{{ $user->last_name}}" name="last_name" placeholder="Old Name">
                                </div>
                                <div class="form-group col-12">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" autocomplete="{{$user->email}}" id="email" name="email" placeholder="Old email" value="{{ $user->email}}">
                                </div>
                                <div class="form-group col-12">
                                    Current Country : @if($user->country) {{ $user->country->name_en }} @else N/A @endif<br>
                                    Current City : @if($user->city) {{ $user->city->name_en }} @else N/A @endif<br>
                                    <label for="usr">Country:</label>
                                    <select id="country" name="country_id" class="form-control-sm form-control p-0">
                                        <option disabled selected>Select your country</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{$country->id==$user->country_id?'selected':''}}>{{$country->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12" id="cities-content">
                                    <label for="usr">City:</label>
                                    <select id="city" name="city_id" class="form-control-sm form-control p-0">
                                        <option disabled selected>Select your City</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{$city->id==$user->city_id?'selected':''}}>{{$city->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="usr">Gender:</label><br>
                                    Male <input type="radio" {{ $user->gender =='male'?'checked':'' }} name="gender" value="male">
                                    Female <input type="radio" {{ $user->gender =='female'?'checked':'' }} name="gender" value="female"> </div>

                                <div class="form-group col-12">
                                    <label for="profile_pricture">Upload Profile Picture</label>
                                    <input type="file" name="image" class="form-control-file" id="profile_pricture">
                                </div>

                                <div class="form-group col-12">
                                    <label for="cover_picture">Upload Cover Image</label>
                                    <input type="file" name="cover" class="form-control-file" id="cover_picture">
                                </div>

                                <div class="form-group col-12">
                                    <label>New Password:</label>
                                    <input type="Password" autocomplete="new-password" class="form-control" name="password" placeholder="New Password">
                                </div>

                                <div class="form-group col-12">
                                    <label for="cpass">Confirm New Password:</label>
                                    <input type="Password" name="password_confirmation" class="form-control" id="cpass" placeholder="Confirm New Password">
                                </div>
                                <div class="form-group">
                                    <label for="cpass">Hide Activity</label>
                                    <input {{ $user->hidden == 1 ? 'checked':'' }} style="height: 20px;" type="checkbox" name="hidden" value="1" class="form-control" id="hide">
                                </div>


                                <div class="form-group col-12">
                                    <input type="submit" class="btn main-btn2" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

{{-- Followings Modal --}}
<div class="modal fade followers-modal show" id="myModalFollowings">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header py-2">
                <h4 class="modal-title">Followings</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body pt-1">
                <div class="row ">
                    @if ($my_followings)
                    @foreach ($my_followings as $follower)
                    <div class="col-12 p-1 part border-bottom">
                        <a href="{{ route('user.view.profile',$follower->id) }}" class="d-block">
                            <figure class="img mb-0" style="background-image:url({{ $follower->image }})"></figure>
                            <p class="d-inline-block h6" style="color:black">{{ $follower->full_name }}</p>
                        </a>
                    </div>
                    @endforeach
                    @endif
                    @if ($following_showrooms)
                    @foreach ($following_showrooms as $showroom)
                    <div class="col-12 p-1 part border-bottom">
                        <a href="{{ route('user.get.singleShowroom',['slug' => $showroom->showroom->slug ]) }}" class="d-block">
                            <figure class="img mb-0" style="background-image:url({{ $showroom->showroom->showroom_image }})"></figure>
                            <p class="d-inline-block h6" style="color:black">
                                {{ $showroom->showroom->name_en?$showroom->showroom->name_en:'N/A' }}</p>
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- The Followers Modal -->
<div class="modal fade followers-modal show" id="myModalFollowers">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header py-2">
                <h4 class="modal-title">Followers</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body pt-1">
                <div class="row ">
                    @if ($my_followers)
                    @foreach ($my_followers as $follower)
                    <div class="col-12 p-1 part border-bottom">
                        <a href="{{ route('user.view.profile',$follower->id) }}" class="d-block">
                            <figure class="img mb-0" style="background-image:url({{ $follower->image }})"></figure>
                            <p class="d-inline-block h6" style="color:black">{{ $follower->full_name }}</p>
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.users.consultantServiceModals')
<!--End Showrooms-->
@endsection
@section('scripts')
<!-- load more library -->
<script src="{{asset('assets/site/js/jquery.elimore.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $("#pass").val(" ");
        var keyword = '';
        // handle add board error
        var dialog_type = "{{old('type')?old('type'):''}}";

        if (dialog_type == "add-board") {
            $('#add-board').modal('show');
        } else if (dialog_type == 'edit-board') {
            $("#edit-board-" + "{{ old('modal_id') }}").modal('show');
        }

        function truncate_text() {
            //    === Make div square ===
            $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
            $(window).on('resize', function() {
                $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
            })
        }

        function seeMoreTopics() {
            $(".topic-body").elimore({
                moreText: "See More",
                lessText: "See Less",
                maxLength: 138
            });
        }

        // search boards
        $(document).on('keyup', '#boards-search', function(e) {
            keyword = $.trim($('#boards-search').val());
            fetch_data();
        });

        function fetch_data() {
            $('.loader').show();
            var url = "{{route('user.my.profile')}}";
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

        // end search boards
        truncate_text();
    });
</script>
<script>
    $(document).ready(function() {
        var keyword = '';

        // search updates
        $(document).on('keyup', '#updates-search', function(e) {
            keyword = $.trim($('#updates-search').val());
            fetch_data();
        });

        function fetch_data() {
            $('.loader').show();
            var url = "{{route('user.my.profile')}}";
            var url = url + '?search=' + keyword + '&type=updates';
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('#updates_content').html(data);
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
            var url = "{{route('user.my.profile')}}";
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

        $(document).on('click', '#idea-content .pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            $('.loader').show();
            var url = "{{route('user.my.profile')}}";
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
        function truncate_text() {
            //    === Make div square ===
            $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
            $(window).on('resize', function() {
                $('.trending #product-content .part').outerHeight($('.trending #product-content .part').outerWidth());
            })
        }

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
            var url = "{{route('user.my.profile')}}";
            var url = url + '?page=' + page + '&type=topics';
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.topics').html(data);
                    truncate_text();
                    seeMoreTopics();
                    $('.loader').hide();
                }
            });
        }

        truncate_text();
        seeMoreTopics();
    });
</script>
@if (Session::has('success'))
<script>
    Swal.fire({
        position: 'center',
        type: 'success',
        title: 'the profile updated successfully',
        timer: 10000,
        confirmButtonText: 'done',
        showLoaderOnConfirm: true,
        confirmButtonColor: '#21d5de',
    });
</script>
@endif
@if (Session::has('regiser_success'))
<script>
    // Swal.fire({
    //     position: 'center',
    //     type: 'success',
    //     title: 'You register successfully <br>Create a profile for your business',
    //     timer: 999999,
    //     confirmButtonText: '<a href="{{route("user.create.showroom")}}" style="color:white">Create Showroom Now !</a>',
    //     showLoaderOnConfirm: true,
    //     confirmButtonColor: '#21d5de'
    // });

    $('#filMessageModal').modal('show');
</script>
@endif

<!-- open service modal if there is error -->
@if(old('type')=='service_modal')
<script>
    $('#filMessageModal').modal('show');
</script>
@endif

@if(Session::has('message'))
<script>
    Swal.fire({
        position: 'center',
        type: 'success',
        title: "{{session::get('message')}}",
        showConfirmButton: false,
        showCancelButton: true,
        cancelButtonText: "No",
        cancelButtonColor: "#21d5de",
        cancelButtonText: "Close"
    });
</script>
@endif
<script>
    $(document).ready(function() {
        $("#country").on('change', function() {
            var country_id = $(this).val();
            var url = "{{route('user.get.cities')}}";
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    country_id: country_id
                },
                success: function(data) {
                    $('#cities-content').html(data);
                    $('.loader').hide();
                }
            });
        })
    })
</script>
<script>
    $('body').on('click', '.delete_alert', function(e) {
        e.preventDefault();
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
                window.location.href = $(this).attr('href');
            }
        });
    });

    $('body').on('click', '.deleteTopic', function(e) {
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