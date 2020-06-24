@extends('site.master')
@section('body')
<section class="about inbox">
    <div class="container">
        <div class="row">
            <div class="title2 col-sm-12 py-3 rounded mb-5">
                <h1 class="text-center text-white font-weight-bold m-0">{{trans('lang.messaging')}}</h1>
            </div>

            <div class="col-md-12 border-bottom">
                <div class="control">
                    {{--<a class="btn btn-success text-white" title="Select All">
                        Select All
                    </a>
                    <a class="btn btn-danger text-white" title="Delete">
                        <i class="far fa-trash-alt"></i>
                    </a>--}}
                    <a id="refresh" class="btn btn-info text-white" title="Refresh">
                        <i class="fas fa-sync-alt"></i>
                    </a>
                    <div class="float-right" style="display:inline-block;">
                        {{ $rooms->appends(getRequestBetweenPages())->render("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>

            <div class="col-md-12 py-5 bg-white">
                @if(count($rooms)>0)
                @foreach($rooms as $room)
                <a href="{{route('user.chatroom',['id'=>$room->id,'lang'=>app()->getLocale()])}}" class="one-message py-2">
                    <div class="custom-control custom-checkbox" style="position:absolute; top:-10px;left:30px;">
                        {{--<input type="checkbox" class="custom-control-input" id="message-select">
                        <label class="custom-control-label" for="message-select"></label>--}}
                    </div>
                    <h6 class="d-inline text-primary m-0" style="white-space:nowrap;overflow: hidden; width: 200px;">{{$room->title_name}}</h6>
                    <b>{{$room->getLastMessageAttribute()?$room->getLastMessageAttribute()->message:'No Message'}}</b>
                    <small>{{$room->getLastMessageAttribute()->created_at->diffForHumans()}}</small>
                </a>
                @endforeach
                @else
                <p>{{trans('lang.no_messages')}}</p>
                @endif
            </div>

        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection
@section('scripts')
<script src="{{url('site')}}/js/inbox.js"></script>
@endsection